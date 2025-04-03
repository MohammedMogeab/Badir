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

    require "views/pages/statistics/create_view.php";
    die();
}


// $db->query("INSERT INTO statistics (name) VALUES (:name)", [
//     'name' => $_POST['name'],
// ]);

header("Location: /pages/statistics");
die();


