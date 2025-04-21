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
    $notification = $db->query(
        "SELECT * FROM notifications WHERE notification_id = :notification_id",
        [
            'notification_id' => $_GET['notification_id']
        ]
    )->findOrFail();
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


require "views/pages/notifications/edit_view.php";
