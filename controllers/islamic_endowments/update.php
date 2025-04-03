<?php

$heading = "update test";

require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$userID = 1;
$endowments = $db->query("SELECT * from endowments where endowment_id = :endowment_id ", [
    'endowment_id' => $_GET['endowment_id']
])->findOrFail();


// $note = $db->query("SELECT * from islamic_endowments where id = :id ", [
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
  
    require "views/pages/islamic_endowments/edit_view.php";
    die();
}
 

// $db->query("UPDATE islamic_endowments set name = :name  " , [
//     'name' => $_POST['name'],

// ]);
$db->query(
    "
    UPDATE endowments SET
    (
        category_id = :category_id,
        partner_id = :partner_id,
        name = :name,
        short_description = :short_description,
        full_description = :full_description,
        cost = :cost,
        start_at = :start_at,
        end_at = :end_at,
        state = :state,
        directorate = :directorate,
        city = :city,
        street = :street,
        photo  = :photo
    )where endowment_id = :endowment_id
    ", [
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
        'photo' => $_POST['photo'],
        'endowment_id' => $_GET['endowment_id']
    ]
);


header("Location: /pages/islamic_endowments");
die();


