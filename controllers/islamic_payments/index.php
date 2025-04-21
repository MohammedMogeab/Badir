<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$page = "islamic_payments_index" ;
if(!isset($_GET['page_number'])) $_GET['page_number'] = 1; // if page_number not set in $_GET
start_page:
if(!isset($_SESSION['islamic_payments_count_all'])){
    $page_islamic_payments_ids = [];
    $_SESSION['islamic_payments_count_all'] = $db->query(
        "select count(*) as count from islamic_payments;"
        )->fetchAll()['0']['count'];
}else{
    $islamic_payments_current_count = $db->query( "select count(*) as count from islamic_payments;")->fetchAll()['0']['count'];
    if($islamic_payments_current_count != $_SESSION['islamic_payments_count_all']){
        if($islamic_payments_current_count > $_SESSION['islamic_payments_count_all']){// changes are adding
            if(count($_SESSION['islamic_payments_pages'][$_GET['page_number']]) < '10'){ // there is an empty place for the added value
                $_SESSION['islamic_payments_pages'][$_GET['page_number']] = [];
            }else{// no empty place for the new item added
                $latest_page = intval($_SESSION['islamic_payments_count_all']/10 + 1);
                $_SESSION['islamic_payments_pages'][$latest_page] = [];
            }
        }else{// changes are deleting
            $_SESSION['islamic_payments_pages'] = [];
        }
        $_SESSION['islamic_payments_count_all'] = $islamic_payments_current_count;
        goto start_page;
    }
}

$pages_count['islamic_payments'] = $_SESSION['islamic_payments_count_all']/10 + 1;

try {
    // Get search and filter inputs from $_GET
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';

    // Base Query
    $query = "SELECT * FROM islamic_payments WHERE 1=1";

    if(!empty($search) || ($filter !== 'all') || (isset($_GET['submit']) && $_GET['submit'] == "foryou") ){
        $params = [];

        // 🔎 Add Search Filter
        if (!empty($search)) {
            $query .= " AND MATCH(name, short_description,type) AGAINST (:search IN NATURAL LANGUAGE MODE)";
            $params['search'] = $search;
        }

        // 🎯 Add Type Filter (if a valid type is selected)
        if ($filter !== 'all') {
            $query .= " AND type = :type";
            $params['type'] = $filter;
        }
        if (isset($_GET['submit']) && $_GET['submit'] == "foryou") {
            $query .= " AND u.user_id = :user_id";
            $params['user_id'] = $_SESSION['user']['id'];
        }
        $islamic_payments = $db->query($query, $params)->fetchAll();
    }elseif/*ides are stored in session */(isset($_SESSION['islamic_payments_pages']) && isset($_SESSION['islamic_payments_pages'][$_GET['page_number']]) && count($_SESSION['islamic_payments_pages'][$_GET['page_number']]) > 0){
        $query .= " AND islamic_payment_id IN (".implode(separator: ",",array: $_SESSION['islamic_payments_pages'][$_GET['page_number']]).");";
        $islamic_payments = $db->query($query)->fetchAll();
    }else{// list of items arent stored yet in session
        if(isset($_SESSION['islamic_payments_pages'])){
            $query .= " AND islamic_payment_id NOT IN (-1,-2 ";
            foreach($_SESSION['islamic_payments_pages'] as $key => $value){
                if(isset($value) && count($value) > 0){
                    $query .= ",".implode(",", $value);
                }
            }
            $query .= ")";
        }
        $query.= " ORDER BY RAND() limit 10;";
        $islamic_payments = $db->query($query)->fetchAll();
        foreach($islamic_payments as $islamic_payment){
            $page_islamic_payments_ids[] = $islamic_payment['islamic_payment_id'];
        }
        $_SESSION['islamic_payments_pages'][$_GET['page_number']] = $page_islamic_payments_ids;
    }

} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}

// $IslamicPayments = $db->query("SELECT * FROM islamic_payments")->fetchAll();

require "views/pages/islamic_payments/index_view.php";


?>