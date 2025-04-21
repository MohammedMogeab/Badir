<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);

try {
 
    $islamic_payments = $db->query("SELECT 
        islamic_payment_id,
        type,
        count,
        cost,
        paid_cost,
        name,
        payment_date,
        user_id,
        short_description,
        photo
    FROM islamic_payments where islamic_payment_id =:islamic_payment_id  ",[
          'islamic_payment_id' => $_GET['islamic_payment_id'],
    ])->findOrFail();

} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


$donation = [
    'donation_page' => 'islamic_payments_donate' ,
    'cost' => $_GET['cost'] ?? 0,
    'product_id' => $islamic_payments['islamic_payment_id'] ?? 0 ,
    'name' => $islamic_payments['name'] ?? 'Campaign Name',
    'description' => $islamic_payments['short_description'] ?? 'Campaign Description',
    'image' => $islamic_payments['photo'] 
];




require "views/pages/checkout_view.php";

