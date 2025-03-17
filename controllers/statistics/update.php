<?php

$heading = "update test";

require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$userID = 1;



// $note = $db->query("SELECT * from statistics where id = :id ", [
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
  
    require "views/pages/statistics/edit_view.php";
    die();
}
 

// $db->query("UPDATE statistics set name = :name  " , [
//     'name' => $_POST['name'],

// ]);



header("Location: /pages/statistics");
die();


