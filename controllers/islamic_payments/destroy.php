<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 
$IslamicPayments = $db->query("SELECT * FROM islamic_payments where islamic_payment_id = :islamic_payment_id",[
    'islamic_payment_id' => $_POST['islamic_payment_id']
])->findOrFail();
// $note = $db->query("SELECT * from islamic_payments where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);
$db->query("DELETE FROM islamic_payments where islamic_payment_id = :islamic_payment_id",[
    'islamic_payment_id' => $_POST['islamic_payment_id']
]);
// $db->query("DELETE FROM islamic_payments where id = :id", [
//   'id' => $_POST['id'],
// ]);
header("Location: /pages/islamic_payments");
exit();



