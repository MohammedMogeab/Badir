<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;


// يعرض الحملات التي قد تبرعت له
// يعني ششجمع العناصر بي النسبه لي علاقت المستخدم بهم 
// $note = $db->query("SELECT * from charity_campaigns where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

$IslamicPayments = $db->query("SELECT * FROM islamic_payments WHERE user_id = :user_id",[
    'user_id'=> $userID
]);

//authorize($note['other_id'] == $userID);



require "views/pages/charity_campaigns/list_view.php";
