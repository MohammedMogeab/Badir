<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$page = "charity_campaigns_index" ;


$page_campaigns_ids = [];
$heading = "All My tests";
if(!isset($_GET['page_number'])) $_GET['page_number'] = 1; // if page_number not set in $_GET

if(isset($_SESSION['campaigns_pages']) && isset($_SESSION['campaigns_pages'][$_GET['page_number']])){
    $page_campaigns_ids = $_SESSION['campaigns_pages'][$_GET['page_number']];
}else if(!isset($_SESSION['campaigns_count_all'])){
    $page_campaigns_ids = [];
    $_SESSION['campaigns_count_all'] = $db->query(
        "select count(*) as count from campaigns;"
        )->fetchAll()['0']['count'];
}

$pages_count['campaigns'] = $_SESSION['campaigns_count_all']/10 + 1;
try {
    // Fetch categories for the dropdown
    $categories = $db->query("SELECT category_id, name FROM categories")->fetchAll();

    // Get search and filter inputs
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';
    $query = 
    "SELECT 
            g.campaign_id, 
            g.category_id, 
            g.partner_id, 
            COALESCE(SUM(u.cost), 0) AS collected_money, 
            g.name, 
            g.photo, 
            g.short_description, 
            g.full_description, 
            g.cost, 
            g.state, 
            g.start_at, 
            g.stop_at, 
            g.end_at
        FROM campaigns g  
        LEFT JOIN users_donate_campaigns u ON g.campaign_id = u.campaign_id 
        GROUP BY g.campaign_id
        HAVING g.campaign_id > 0
    ";
    if(!empty($search) || ($filter !== 'all') || (isset($_GET['submit']) && $_GET['submit'] == "foryou") ){
        $params = [];
        if (!empty($search)) {
            $query .= " AND MATCH(g.name, g.short_description, g.full_description) AGAINST (:search IN NATURAL LANGUAGE MODE)";
            $params['search'] = $search;
        }
        // 🎯 Add Category Filter (if a valid category is selected)
        if ($filter !== 'all' && is_numeric($filter)) {
            $query .= " AND g.category_id = :category_id";
            $params['category_id'] = $filter;
        }
        if(isset($_GET['submit']) && $_GET['submit'] == "foryou"){
            $query .= " AND u.user_id = :user_id";
            $params['user_id'] = $_SESSION['user']['id'];
        }
        $campaigns = $db->query($query, $params)->fetchAll();
    }elseif/*ides are stored in session */(isset($_SESSION['campaigns_pages']) && isset($_SESSION['campaigns_pages'][$_GET['page_number']]) && count($_SESSION['campaigns_pages'][$_GET['page_number']]) > 0){
        $query .= " AND g.campaign_id IN (".implode(separator: ",",array: $_SESSION['campaigns_pages'][$_GET['page_number']]).") order by g.campaign_id;";
        $campaigns = $db->query($query)->fetchAll();
    }else{// list of items arent stored yet in session
        if(isset($_SESSION['campaigns_pages'])){
            $query .= " AND g.campaign_id NOT IN (-1,-2 ";
            foreach($_SESSION['campaigns_pages'] as $key => $value){
                    if(isset($value) && count($value) > 0){
                        $query .= ",".implode(",", $value);
                    }
                }
                $query .= ")";
            }
            $query.= " ORDER BY RAND() limit 10;";
        $campaigns = $db->query($query)->fetchAll();
        foreach($campaigns as $campaign){
            $page_campaigns_ids[] = $campaign['campaign_id'];
        }
        $_SESSION['campaigns_pages'][$_GET['page_number']] = $page_campaigns_ids;
    }
    // 👌 Finalize Query

    // Execute the query
    

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء جلب البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}





require "views/pages/charity_campaigns/index_view.php";
