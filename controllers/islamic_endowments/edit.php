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
    )->fetchAll(); // Fetch all rows from the query result

    $endowment = $db->query(
        "SELECT *
        FROM endowments where endowment_id = :endowment_id
        ",
        [
            'endowment_id' => $_GET['endowment_id']
        ]
    )->findOrFail();
} catch (PDOException $e) {

    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}





require "views/pages/islamic_endowments/edit_view.php";
