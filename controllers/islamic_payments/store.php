<?php
$heading = "Create test";



use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$errors = [];

if (!(Validator::string($_POST['name'], 1, 255))) {
    $errors["name"] = "Titel  is too short or too long";
}
// if (!(Validator::string($_POST['body'], 1, 1000))) {
//     $errors["titel"] = " body is too short or long";
// }


if (! empty($errors)) {

    require "views/pages/islamic_payments/create_view.php";
    die();
}

$islamicPayment_id = $db->query(
    "
    INSERT INTO islamic_payments (type, count, cost, paid_cost, paid_for, payment_date, user_id)
    VALUES (:type, :count, :cost, :paid_cost, :paid_for, :payment_date, :user_id) RETURNING islamic_payment_id;
    ",
    [
        'type' => $_POST['type'],
        'count' => $_POST['count'],
        'cost' => $_POST['cost'],
        'paid_cost' => $_POST['paid_cost'],
        'paid_for' => $_POST['paid_for'],
        'payment_date' => $_POST['payment_date'],
        'user_id' => $_POST['user_id']
    ]
)->getGeneratedKey();
// $db->query("INSERT INTO islamic_payments (name) VALUES (:name)", [
//     'name' => $_POST['name'],
// ]);

header("Location: /pages/islamic_payments");
die();


