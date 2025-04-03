<?php
$heading = "Edit test";

use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;

$IslamicPayments = $db->query("SELECT * FROM islamic_payments where islamic_payment_id = :islamic_payment_id",[
    'islamic_payment_id' => $_POST['islamic_payment_id']
])->findOrFail();

// $item = $db->query("SELECT * from islamic_payments where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($item['other_id'] == $userID);
$db->query("UPDATE islamic_payments SET
(
    type = :type, 
    count = :count, 
    cost = :cost, 
    paid_cost = :paid_cost, 
    paid_for = :paid_for, 
    payment_date = :payment_date, 
    user_id = :user_id
)WHERE islamic_payment_id = :islamic_payment_id",[
    'type' => $_POST['type'],
    'count' => $_POST['count'],
    'cost' => $_POST['cost'],
    'paid_cost' => $_POST['paid_cost'],
    'paid_for' => $_POST['paid_for'],
    'payment_date' => $_POST['payment_date'],
    'user_id' => $_POST['user_id'],
    'islamic_payment_id' => $_POST['islamic_payment_id']
]);
//EXAMPLE: (type:'Zakat', COUNT: 1, COST: 1500.00,PAID_COST 1500.00,PAID_FOR: 'Water project - Receipt: ZK2024-001 AT: 2024-03-17',PAYMENT_DATE: '2024-03-15', USER_ID: 3),





require "views/pages/islamic_payments/edit_view.php";
