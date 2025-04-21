<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);




$campaigns = $db->query("select g.campaign_id, g.category_id, g.partner_id, sum(u.cost) as collected_money, g.name, g.short_description, g.full_description, g.cost, g.state, g.start_at, g.stop_at, g.end_at,g.photo
from campaigns g join users_donate_campaigns u on (g.campaign_id = u.campaign_id) group by(u.campaign_id) having g.campaign_id = :campaign_id ", [
  'campaign_id' => $_GET['campaign_id'],
])->findOrFail();


$donation = [
    'donation_page' => 'charity_campaigns_donate' ,
    'cost' => $_GET['cost'] ?? 0,
    'product_id' => $campaigns['campaign_id'] ?? 0 ,
    'name' => $campaigns['name'] ?? 'Campaign Name',
    'description' => $campaigns['short_description'] ?? 'Campaign Description',
    'image' => $campaigns['photo'] 
];




require "views/pages/checkout_view.php";

