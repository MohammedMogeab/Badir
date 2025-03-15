<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

$note = $db->query("SELECT * from cards where id = :id ", [
  'id' => $_POST['id'],
])->findOrFail();

//authorize($note['other_id'] == $userID);

$db->query("DELETE FROM cards where id = :id", [
  'id' => $_POST['id'],
]);
header("Location: /pages/cards");
exit();



