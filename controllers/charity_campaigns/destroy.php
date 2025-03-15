<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

$note = $db->query("SELECT * from charity_campaigns where id = :id ", [
  'id' => $_POST['id'],
])->findOrFail();

//authorize($note['other_id'] == $userID);

$db->query("DELETE FROM charity_campaigns where id = :id", [
  'id' => $_POST['id'],
]);
header("Location: /pages/charity_campaigns");
exit();



