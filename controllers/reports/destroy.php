<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

$note = $db->query("SELECT * from reports where id = :id ", [
  'id' => $_POST['id'],
])->findOrFail();

//authorize($note['other_id'] == $userID);

$db->query("DELETE FROM reports where id = :id", [
  'id' => $_POST['id'],
]);
header("Location: /pages/reports");
exit();



