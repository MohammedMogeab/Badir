<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

// $note = $db->query("SELECT * from islamic_endowments where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);

// $db->query("DELETE FROM islamic_endowments where id = :id", [
//   'id' => $_POST['id'],
// ]);
header("Location: /pages/islamic_endowments");
exit();



