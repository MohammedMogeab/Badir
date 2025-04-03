<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;



$endowments = $db->query("SELECT * from endowments where endowment_id = :endowment_id ", [
    'endowment_id' => $_GET['endowment_id']
])->findOrFail();

// $note = $db->query("SELECT * from islamic_endowments where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);



require "views/pages/islamic_endowments/show_view.php";
