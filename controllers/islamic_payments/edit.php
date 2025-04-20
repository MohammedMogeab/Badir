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
    $payment = $db->query("SELECT * FROM islamic_payments where islamic_payment_id = :islamic_payment_id", [
        'islamic_payment_id' => $_GET['islamic_payment_id']
    ])->findOrFail();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}



require "views/pages/islamic_payments/edit_view.php";
