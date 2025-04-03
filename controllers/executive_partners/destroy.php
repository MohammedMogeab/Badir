<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;


// $note = $db->query("SELECT * from executive_partners where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();
$partners = $db->query("SELECT * from partners where partner_id = :partner_id",[
    'partner_id' => $_POST['partner_id']
])->findOrFail();
//authorize($note['other_id'] == $userID);
$db->query("DELETE from partners where partner_id = :partner_id ",[
    'partner_id' => $_POST['partner_id']
]);
header("Location: /pages/executive_partners");
exit();



