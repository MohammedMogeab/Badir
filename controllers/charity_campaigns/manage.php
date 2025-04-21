<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);


$page = "charity_campaigns_manage" ;

$heading = "All My tests";

try {
    // Fetch categories for the dropdown
    $categories = $db->query("SELECT category_id, name FROM categories")->fetchAll();

    // Get search and filter inputs
    $search = $_GET['search'] ?? '';
    $filter = $_Get['filter'] ?? 'all';

    // Base Query
    $query = "
        SELECT 
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
        WHERE 1=1 
    ";

    $params = [];

    // 🔎 Add Search Filter
    if (!empty($search)) {
        $query .= " AND MATCH(g.name, g.short_description, g.full_description) AGAINST (:search IN NATURAL LANGUAGE MODE)";
        $params['search'] = $search;
    }

    // 🎯 Add Category Filter (if a valid category is selected)
    if ($filter !== 'all' && is_numeric($filter)) {
        $query .= " AND g.category_id = :category_id";
        $params['category_id'] = $filter;
    }
    if ($_GET['submit'] == "foryou") {
        $query .= " AND u.user_id = :user_id";
        $params['user_id'] = $_SESSION['user']['id'];
    }


    // 👌 Finalize Query
    $query .= " GROUP BY g.campaign_id ORDER BY g.start_at;";

    // Execute the query
    $campaigns = $db->query($query, $params)->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}




require "views/pages/charity_campaigns/manage_view.php";
