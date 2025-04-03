<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;


$partners = $db->query("SELECT * from partners where partner_id = :partner_id",[
    'partner_id' => $_POST['partner_id']
])->findOrFail();
$partners['phones'] = $db->query(
    "SELECT phone, type from partners_phones
    WHERE partner_id = :partner_id",[
        'partner_id' => $_POST['partner_id']
    ])->fetchAll();
$partners['accounts'] = $db->query(
    "SELECT account, account_type from partners_accounts
    WHERE partner_id = :partner_id",[
        'partner_id' => $_POST['partner_id']
    ])->fetchAll();
    
// $note = $db->query("SELECT * from executive_partners where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);



require "views/pages/executive_partners/show_view.php";
