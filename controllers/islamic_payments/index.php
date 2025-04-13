<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$page = "islamic_payments_index" ;


try {
    // Get search and filter inputs from $_GET
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';

    // Base Query
    $query = "SELECT * FROM islamic_payments WHERE 1=1";
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
    if ($_GET['submit'] == "foryou") {
        $query .= " AND u.user_id = :user_id";
        $params['user_id'] = $_SESSION['user']['id'];
    }


    // 👌 Finalize Query
    $query .= " ORDER BY payment_date DESC;";

    // Execute the query
    $islamic_payments = $db->query($query, $params)->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء جلب البيانات";
    header("Location: /islamic_payments");
    exit();
}

// $IslamicPayments = $db->query("SELECT * FROM islamic_payments")->fetchAll();

require "views/pages/islamic_payments/index_view.php";


?>