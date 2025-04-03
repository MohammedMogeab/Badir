<?php
$heading = "destroy note";
use core\App ;
use core\Database ;
use models\IslamicPayment;

$db = App::resolve(Database::class);

$userID = 1;


// $note = $db->query("SELECT * from islamic_endowments where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();
$endowments = $db->query("SELECT * from endowments where endowment_id = :endowment_id ", [
  'endowment_id' => $_POST['endowment_id']
])->findOrFail();
//authorize($note['other_id'] == $userID);

// $db->query("DELETE FROM islamic_endowments where id = :id", [
//   'id' => $_POST['id'],
// ]);
$db->query("DELETE FROM endowments where campign_id = :endowment_id", [
  'endowment_id' => $_POST['endowment_id']
]);

header("Location: /pages/islamic_endowments");
exit();



