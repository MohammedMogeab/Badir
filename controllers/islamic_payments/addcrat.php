<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);

try {
    $db->query(
        "INSERT INTO users_cart_islamic_payments (
            user_id,
            islamic_payment_id
        ) VALUES (
            :user_id,
            :islamic_payment_id
        )",
        [
            'user_id' => filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
            'islamic_payment_id' => htmlspecialchars($_POST['islamic_payment_id'])
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
