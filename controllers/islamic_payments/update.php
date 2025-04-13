<?php

$heading = "update test";

//require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$userID = 1;



// $note = $db->query("SELECT * from islamic_payments where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();

// authorize($note['other_id'] == $userID);




// $errors = [];

// if (!(Validator::string($_POST['anme'], 1, 255))) {
//     $errors["titel"] = "Titel  is too short or too long";
// }
// // if (!(Validator::string($_POST['body'], 1, 1000))) {
// //     $errors["titel"] = " body is too short or long";
// // }


// if (! empty($errors)) {
  
//     require "views/pages/islamic_payments/edit_view.php";
//     die();
// }
 

// // $db->query("UPDATE islamic_payments set name = :name  " , [
// //     'name' => $_POST['name'],

// // ]);
// $IslamicPayments = $db->query("SELECT * FROM islamic_payments where islamic_payment_id = :islamic_payment_id",[
//     'islamic_payment_id' => $_POST['islamic_payment_id']
// ])->findOrFail();

// $db->query("UPDATE islamic_payments SET
// (
//     type = :type, 
//     count = :count, 
//     cost = :cost, 
//     paid_cost = :paid_cost, 
//     paid_for = :paid_for, 
//     payment_date = :payment_date, 
//     user_id = :user_id
// )WHERE islamic_payment_id = :islamic_payment_id",[
//     'type' => $_POST['type'],
//     'count' => $_POST['count'],
//     'cost' => $_POST['cost'],
//     'paid_cost' => $_POST['paid_cost'],
//     'paid_for' => $_POST['paid_for'],
//     'payment_date' => $_POST['payment_date'],
//     'user_id' => $_POST['user_id'],
//     'islamic_payment_id' => $_POST['islamic_payment_id']
// ]);

try {
    $db->query(
        "UPDATE islamic_payments
        SET 
            type = COALESCE(:type, type),
            count = COALESCE(:count, count),
            cost = COALESCE(:cost, cost),
            paid_cost = COALESCE(:paid_cost, paid_cost),
            name = COALESCE(:name, name),
            payment_date = COALESCE(:payment_date, payment_date),
            user_id = COALESCE(:user_id, user_id),
            short_description = COALESCE(:short_description, short_description),
            photo = COALESCE(:photo, photo)
        WHERE islamic_payment_id = :islamic_payment_id",
        [
            'type' => isset($_POST['type']) ? htmlspecialchars($_POST['type']) : null,
            'count' => isset($_POST['count']) ? filter_var($_POST['count'], FILTER_SANITIZE_NUMBER_INT) : null,
            'cost' => isset($_POST['cost']) ? filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : null,
            'paid_cost' => isset($_POST['paid_cost']) ? filter_var($_POST['paid_cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : null,
            'name' => isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null,
            'payment_date' => $_POST['payment_date'] ?? null,
            'user_id' => $_POST['user_id'] ?? null,
            'short_description' => isset($_POST['short_description']) ? htmlspecialchars($_POST['short_description']) : null,
            'photo' => $filenamenew ?? null,
            'islamic_payment_id' => $_POST['islamic_payment_id']
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء تحديث البيانات";
    header("Location: /islamic_payments_edit");
    exit();
}




header("Location:". $_SERVER["HTTP_REFERER"]);
die();


