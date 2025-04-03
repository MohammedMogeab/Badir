<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";

$partners = $db->query("SELECT * from partners where partner_id = :partner_id")->findOrFail();
foreach($partners as $key => $value){
    $partners[$key]['phones'] = $db->query(
        "SELECT phone, type from partners_phones
        WHERE partner_id = :partner_id",[
            'partner_id' => $value['partner_id']
        ])->fetchAll();
    $partners[$key]['accounts'] = $db->query(
        "SELECT account, account_type from partners_accounts
        WHERE partner_id = :partner_id",[
            'partner_id' => $value['partner_id']
        ])->fetchAll();
}
// $executive_partners = $db->query("SELECT * from executive_partners ;")->fetchAll();


require "views/pages/executive_partners/index_view.php";


?>