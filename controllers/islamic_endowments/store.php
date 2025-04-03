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

    require "views/pages/islamic_endowments/create_view.php";
    die();
}


$db->query(
    "INSERT INTO endowments (category_id, partner_id, name, short_description, full_description, cost, start_at, end_at, state, directorate, city, street, photo)
     VALUES (:category_id, :partner_id, :name, :short_description, :full_description, :cost, :start_at, :end_at, :state, :directorate, :city, street, :photo)", [
        'category_id' => $_POST['category_id'],
        'partner_id' => $_POST['partner_id'],
        'name' => $_POST['name'],
        'short_description' => $_POST['short_description'],
        'full_description' => $_POST['full_description'],
        'cost' => $_POST['cost'],
        'start_at' => $_POST['start_at'],
        'end_at' => $_POST['end_at'],
        'state' => $_POST['state'],
        'directorate' => $_POST['directorate'],
        'city' => $_POST['city'],
        'street' => $_POST['street'],
        'photo' => $_POST['photo']
]);

header("Location: /pages/islamic_endowments");
die();


