<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;



$note = $db->query("SELECT * from cards where id = :id ", [
  'id' => $_GET['id'],
])->findOrFail();

//authorize($note['other_id'] == $userID);



require "views/pages/cards/show_view.php";
