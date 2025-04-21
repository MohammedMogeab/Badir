<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);
$_POST['user_id'] = $_SESSION['user_id'];
try {
    $db->query(
        "INSERT INTO users_cart_campaigns (
            user_id,
            campaign_id
        ) VALUES (
            :user_id,
            :campaign_id
        )",
        [
            'user_id' => filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
            'campaign_id' => $_POST['campaign_id']
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
