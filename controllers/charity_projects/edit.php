<?php
$heading = "Create ";

use core\App;
use core\Database;


$db = App::resolve(Database::class);


try {
    $categories = $db->query(
        "SELECT * FROM categories"
    )->fetchAll(); // Fetch all rows from the query result 
    $partners = $db->query(
        "SELECT * FROM partners"
    )->fetchAll();
    $project = $db->query(
        "    SELECT * from projects where project_id = :project_id
", [
    'project_id' => $_GET['project_id'] ]
    )->findOrFail();
} catch (PDOException $e) {

    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البعانات";
    header("Location: /");
    exit();
}




require "views/pages/charity_projects/edit_view.php";
