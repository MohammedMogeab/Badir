<?php

$heading = "update test";

require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$userID = 1;



// $note = $db->query("SELECT * from charity_projects where id = :id ", [
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
  
    require "views/pages/charity_projects/edit_view.php";
    die();
}
 
$projects = $db->query("SELECT 
    (
    partner_id,
    category_id,
    level,
    name,
    photo,
    short_description,
    full_description,
    type,
    cost,
    start_at,
    end_at,
    state,
    directorate
    )FROM PROJECTS WHERE project_id = :project_id
",[
    'project_id' => $_POST['project_id']
])->findOrFail();

// $db->query("UPDATE charity_projects set name = :name  " , [
//     'name' => $_POST['name'],

// ]);
$db->query
(
    "update projects set
    (
        partner_id = :partner_id,
        category_id = :category_id,
        level = :level,
        name = :name,
        photo = :photo,
        short_description = :short_description,
        full_description = :full_description,
        type = :type,
        cost = :cost,
        end_at = :end_at,
        state = :state,
        directorate = :directorate
    )where project_id = :project_id",
    [
        'partner_id' => $_POST['partner_id'],
        'category_id' => $_POST['category_id'],
        'level' => $_POST['level'],
        'name' => $_POST['name'],
        'photo' => $_POST['photo'],
        'short_description' => $_POST['short_description'],
        'full_description' => $_POST['full_description'],
        'type' => $_POST['type'],
        'cost' => $_POST['cost'],
        'end_at' => $_POST['end_at'],
        'state' => $_POST['state'],
        'directorate' => $_POST['directorate'],
        'project_id' => $_POST['project_id']
    ]
);


header("Location: /pages/charity_projects");
die();


