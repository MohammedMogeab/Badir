<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;

$IslamicPayments = $db->query("SELECT * FROM islamic_payments where islamic_payment_id = :islamic_payment_id",[
    'islamic_payment_id' => $_POST['islamic_payment_id']
])->findOrFail();

// $note = $db->query("SELECT * from islamic_payments where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);



require "views/pages/islamic_payments/show_view.php";
