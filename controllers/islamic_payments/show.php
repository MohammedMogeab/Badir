<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);


$userID = 1;



try {
    $categories = $db->query(
        "SELECT * FROM categories"
    )->fetchAll(); // Fetch all rows from the query result 
    $partners = $db->query(
        "SELECT * FROM partners"
    )->fetchAll(); // Fetch all rows from the query result
    $IslamicPayments = $db->query("SELECT * FROM islamic_payments where islamic_payment_id = :islamic_payment_id", [
        'islamic_payment_id' => $_GET['islamic_payment_id']
    ])->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}

// $note = $db->query("SELECT * from islamic_payments where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);



require "views/pages/islamic_payments/show_view.php";
