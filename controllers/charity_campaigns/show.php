<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;



$campaigns = $db->query("select g.campaign_id, g.category_id, g.partner_id, g.campaign_request_id, sum(u.cost) as collected_money, g.name, g.short_description, g.full_description, g.cost, g.state, g.start_at, g.stop_at, g.end_at
from campaigns g join users_donate_campaigns u on (g.campaign_id = u.campaign_id) group by(u.campaign_id) having g.campaign_id = :campaign_id ", [
  'campaign_id' => $_GET['campaign_id'],
])->findOrFail();

//authorize($note['other_id'] == $userID);



require "views/pages/charity_campaigns/show_view.php";
