<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";


// $users = $db->query("SELECT * from users ;")->fetchAll();


try {
    // Get search and filter inputs from $_GET
    $search = $_GET['search'] ?? '';
    $userType = $_GET['type'] ?? 'all'; // Default: show all users
    $sort = $_GET['sort'] ?? 'latest'; // Default: latest users first

    // Base Query
    $query = "SELECT * FROM users WHERE 1=1";
    $params = [];

    // 🔎 Add Search Filter (Full-Text Search)
    if (!empty($search)) {
        $query .= " AND MATCH(username, email) AGAINST (:search IN NATURAL LANGUAGE MODE)";
        $params['search'] = $search;
    }

    if (isset($_GET['submit']) && $_GET['submit'] == "foryou") {
        $query .= " AND u.user_id = :user_id";
        $params['user_id'] = $_SESSION['user']['id'];
    }


    // 📌 Sorting
    if ($sort === 'oldest') {
        $query .= " ORDER BY user_id ASC";
    } else { 
        $query .= " ORDER BY user_id DESC"; // Default: Latest users first
    }

    // Execute the query
    $users = $db->query($query, $params)->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء جلب البيانات";
    header("Location: /users");
    exit();
}


require "views/pages/users/manage_view.php";
?>