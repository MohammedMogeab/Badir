<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);

$page = "charity_projects_index" ;

try {
    // Fetch categories for the dropdown
    $categories = $db->query("SELECT category_id, name FROM categories")->fetchAll();

    // Get search and filter inputs
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';

    // Base Query
    $query = "
        SELECT 
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
            P.end_at, 
            P.beneficiaries_count,
            P.state, 
            P.directorate
        FROM 
            projects P 
        LEFT JOIN 
            users_donate_projects B ON P.project_id = B.project_id
        WHERE 1=1 
    ";

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

    if ($_GET['submit'] == "foryou") {
        $query .= " AND u.user_id = :user_id";
        $params['user_id'] = $_SESSION['user']['id'];
    }


    // 👌 Finalize Query
    $query .= " GROUP BY P.project_id ORDER BY P.start_at DESC;";

    // Execute the query
    $projects = $db->query($query, $params)->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}



// $charity_projects = $db->query("SELECT * from charity_projects ;")->fetchAll();


require "views/pages/charity_projects/manage_view.php";


?>