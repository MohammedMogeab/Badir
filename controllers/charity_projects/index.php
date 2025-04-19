<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);
//$page_projects_ids = $pages_count = $_SESSION['projects_pages'] = $_SESSION['projects_pages'][$_GET['page_number']] = array(); // [];

$page = "charity_projects_index" ;
if(!isset($_GET['page_number'])) $_GET['page_number'] = 1; // if page_number not set in $_GET
start_page:
// $_SESSION['projects_pages'] = [];

if(isset($_SESSION['projects_pages']) && isset($_SESSION['projects_pages'][$_GET['page_number']])){
    $page_projects_ids = $_SESSION['projects_pages'][$_GET['page_number']];
}


if(!isset($_SESSION['projects_count_all'])){
    $page_projects_ids = [];
    $_SESSION['projects_count_all'] = $db->query(
        "select count(*) as count from projects where state = 'active';"
        )->fetchAll()['0']['count'];
}else{
    $projects_current_count = $db->query( "select count(*) as count from projects where state = 'active';")->fetchAll()['0']['count'];
    if($projects_current_count != $_SESSION['projects_count_all']){
        if($projects_current_count > $_SESSION['projects_count_all']){

            if(count($_SESSION['projects_pages'][$_GET['page_number']]) < 10 ){

                $_SESSION['projects_pages'][$_GET['page_number']] = [];
            }else{// no empty place for the new item added
            $latest_page = intval($_SESSION['projects_count_all']/10 + 1);
            $_SESSION['projects_pages'][$latest_page] = [];
        }
        }else{
            $_SESSION['projects_pages'] = [];
        }
        $_SESSION['projects_count_all'] = $projects_current_count;
        goto start_page;
    }
}

$pages_count['projects'] = $_SESSION['projects_count_all']/10 + 1;
// $page_projects_ids = [];
// $_SESSION['projects_pages'][$_GET['page_number']] = [];
try {
    // Fetch categories for the dropdown
    $categories = $db->query("SELECT category_id, name FROM categories")->fetchAll();

    // Get search and filter inputs
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';

    // Base Query
    $query = 
    "   SELECT 
            P.project_id, 
            P.partner_id, 
            P.category_id, 
            P.level, 
            P.name, 
            P.photo, 
            P.short_description, 
            P.full_description, 
            P.type, 
            P.cost, 
            COALESCE(SUM(B.cost), 0) AS collected_money, 
            P.start_at, 
            P.beneficiaries_count,
            P.end_at, 
            P.state, 
            P.directorate
        FROM 
            projects P 
        LEFT JOIN 
            users_donate_projects B ON P.project_id = B.project_id 
        Group by P.project_id 
        HAVING P.state = 'active'
    ";
    if(!empty($search) || ($filter !== 'all') || (isset($_GET['submit']) && $_GET['submit'] == "foryou") ){
        $params = [];

        // 🔎 Add Search Filter
        if (!empty($search)) {
            $query .= " AND MATCH(p.name, p.short_description, p.full_description) AGAINST (:search IN NATURAL LANGUAGE MODE)";
            $params['search'] = $search;
        }

        // 🎯 Add Category Filter (if a valid category is selected)
        if ($filter !== 'all' && is_numeric($filter)) {
            $query .= " AND P.category_id = :category_id";
            $params['category_id'] = $filter;
        }

        if (isset($_GET['submit']) && $_GET['submit'] == "foryou") {
            $query .= " AND B.user_id = :user_id";
            $params['user_id'] = $_SESSION['user']['id'];
        }
        $projects = $db->query($query, $params)->fetchAll();
    }elseif/*ides are stored in session */(isset($_SESSION['projects_pages']) && isset($_SESSION['projects_pages'][$_GET['page_number']]) && count($_SESSION['projects_pages'][$_GET['page_number']]) > 0){
        $query .= " AND P.project_id IN (".implode(separator: ", ",array: $_SESSION['projects_pages'][$_GET['page_number']]).")";
        // echo "<br><br><br><br><br><br><br><br><br><br><br>  query is : ". $query ."<br>";
        $projects = $db->query($query)->fetchAll();
    }else{// list of items arent stored yet in session
        if(isset($_SESSION['projects_pages'])){
            $query .= " AND P.project_id NOT IN (-1,-2 ";
            foreach($_SESSION['projects_pages'] as $key => $value){
                if(isset($value) && count($value) > 0){
                    $query .= ",".implode(",", $value);
                }
            }
            $query .= ")";
        }
        $query .= " ORDER BY RAND() limit 10;";
        // echo "<br><br><br><br><br><br><br><br><br><br><br>  query is : ". $query ."<br>";
        $projects = $db->query($query)->fetchAll();
        foreach($projects as $project){
            $page_projects_ids[] = $project['project_id'];
        }
        $_SESSION['projects_pages'][$_GET['page_number']] = $page_projects_ids;
    }

    // Execute the query

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء جلب البيانات";
    header("Location: /$page");
    exit();
}



// $charity_projects = $db->query("SELECT * from charity_projects ;")->fetchAll();


require "views/pages/charity_projects/index_view.php";


?>