<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$page = "islamic_endowments_index" ;
if(!isset($_GET['page_number'])) $_GET['page_number'] = 1; // if page_number not set in $_GET
start_page:
if(!isset($_SESSION['endowments_count_all'])){
    $page_endowments_ids = [];
    $_SESSION['endowments_count_all'] = $db->query(
        "select count(*) as count from endowments where state = 'active';"
        )->fetchAll()['0']['count'];
}else{
    $endowments_current_count = $db->query( "select count(*) as count from endowments where state = 'active';")->fetchAll()['0']['count'];
    if($endowments_current_count != $_SESSION['endowments_count_all']){
        if($endowments_current_count > $_SESSION['endowments_count_all']){// changes are adding
            if(count($_SESSION['endowments_pages'][$_GET['page_number']]) < '10'){ // there is an empty place for the added value
                $_SESSION['endowments_pages'][$_GET['page_number']] = [];
            }else{// no empty place for the new item added
                $latest_page = intval($_SESSION['endowments_count_all']/10 + 1);
                $_SESSION['endowments_pages'][$latest_page] = [];
            }
        }else{// changes are deleting
            $_SESSION['endowments_pages'] = [];
        }
        $_SESSION['endowments_count_all'] = $endowments_current_count;
        goto start_page;
    }
}

$pages_count['endowments'] = $_SESSION['endowments_count_all']/10 + 1;

try {
    // Fetch categories for filtering
    $categories = $db->query("SELECT category_id, name FROM categories")->fetchAll();

    // Get search and filter inputs from $_GET
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';
    

    // Base Query
    $query = "SELECT * FROM endowments WHERE state = 'active'";
    if(!empty($search) || ($filter !== 'all') || (isset($_GET['submit']) && $_GET['submit'] == "foryou") ){
        $params = [];

        // 🔎 Add Search Filter
        if (!empty($search)) {
            $query .= " AND MATCH(name, short_description, full_description) AGAINST (:search IN NATURAL LANGUAGE MODE)";
            $params['search'] = $search;
        }

        // 🎯 Add Category Filter (if a valid category is selected)
        if ($filter !== 'all' && is_numeric($filter)) {
            $query .= " AND category_id = :category_id";
            $params['category_id'] = $filter;
        }
        if (isset($_GET['submit']) && $_GET['submit'] == "foryou") {
            $query .= " AND u.user_id = :user_id";
            $params['user_id'] = $_SESSION['user']['id'];
        }
        $islamic_endowments = $db->query($query, $params)->fetchAll();
    }elseif/*ides are stored in session */(isset($_SESSION['endowments_pages']) && isset($_SESSION['endowments_pages'][$_GET['page_number']]) && count($_SESSION['endowments_pages'][$_GET['page_number']]) > 0){
        $query .= " AND endowment_id IN (".implode(separator: ",",array: $_SESSION['endowments_pages'][$_GET['page_number']]).");";
        $islamic_endowments = $db->query($query)->fetchAll();
    }else{// list of items arent stored yet in session
        if(isset($_SESSION['endowments_pages'])){
            $query .= " AND endowment_id NOT IN (-1,-2 ";
            foreach($_SESSION['endowments_pages'] as $key => $value){
                if(isset($value) && count($value) > 0){
                    $query .= ",".implode(",", $value);
                }
            }
            $query .= ")";
        }
        $query.= " ORDER BY RAND() limit 10;";
        $islamic_endowments = $db->query($query)->fetchAll();
        foreach($islamic_endowments as $endowment){
            $page_endowments_ids[] = $endowment['endowment_id'];
        }
        $_SESSION['endowments_pages'][$_GET['page_number']] = $page_endowments_ids;
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء جلب البيانات";
    header("Location: /endowments");
    exit();
}



require "views/pages/islamic_endowments/index_view.php";


?>