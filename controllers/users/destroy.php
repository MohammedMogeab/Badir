<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

// $note = $db->query("SELECT * from users where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);

// $db->query("DELETE FROM users where id = :id", [
//   'id' => $_POST['id'],
// ]);
header("Location: /pages/users");
exit();



