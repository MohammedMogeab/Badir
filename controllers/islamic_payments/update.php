<?php

$heading = "update test";

require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$userID = 1;



// $note = $db->query("SELECT * from islamic_payments where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();

authorize($note['other_id'] == $userID);




$errors = [];

if (!(Validator::string($_POST['anme'], 1, 255))) {
    $errors["titel"] = "Titel  is too short or too long";
}
// if (!(Validator::string($_POST['body'], 1, 1000))) {
//     $errors["titel"] = " body is too short or long";
// }


if (! empty($errors)) {
  
    require "views/pages/islamic_payments/edit_view.php";
    die();
}
 

// $db->query("UPDATE islamic_payments set name = :name  " , [
//     'name' => $_POST['name'],

// ]);
$IslamicPayments = $db->query("SELECT * FROM islamic_payments where islamic_payment_id = :islamic_payment_id",[
    'islamic_payment_id' => $_POST['islamic_payment_id']
])->findOrFail();

$db->query("UPDATE islamic_payments SET
(
    type = :type, 
    count = :count, 
    cost = :cost, 
    paid_cost = :paid_cost, 
    paid_for = :paid_for, 
    payment_date = :payment_date, 
    user_id = :user_id
)WHERE islamic_payment_id = :islamic_payment_id",[
    'type' => $_POST['type'],
    'count' => $_POST['count'],
    'cost' => $_POST['cost'],
    'paid_cost' => $_POST['paid_cost'],
    'paid_for' => $_POST['paid_for'],
    'payment_date' => $_POST['payment_date'],
    'user_id' => $_POST['user_id'],
    'islamic_payment_id' => $_POST['islamic_payment_id']
]);


header("Location: /pages/islamic_payments");
die();


