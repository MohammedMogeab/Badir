<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

$campaigns = $db->query("SELECT * from campaigns where campign_id = :campaign_id ", [
  'campaign_id' => $_POST['campaign_id'],
])->findOrFail();

// print_r($note);
//authorize($note['other_id'] == $userID);

$db->query("DELETE FROM campaigns where campign_id = :campaign_id", [
  'campaign_id' => $_POST['campaign_id'],
]);

header("Location: /pages/charity_campaigns");
exit();



