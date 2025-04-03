<?php
$heading = "Edit test";

use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;

$endowments = $db->query("SELECT * from endowments where endowment_id = :endowment_id ", [
    'endowment_id' => $_GET['endowment_id']
])->findOrFail();

// $item = $db->query("SELECT * from islamic_endowments where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();
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

//authorize($item['other_id'] == $userID);





require "views/pages/islamic_endowments/edit_view.php";
