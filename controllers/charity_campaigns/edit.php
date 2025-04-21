<?php
$heading = "Create ";

use core\App;
use core\Database;


$db = App::resolve(Database::class);


try {
    $categories = $db->query(
        "SELECT * FROM categories"
    )->fetchAll(); // Fetch all rows from the query result 
    $partners = $db->query(
        "SELECT * FROM partners"
    )->fetchAll(); // Fetch all rows from the query result
    $campaign = $db->query("select g.campaign_id, g.category_id, g.partner_id, sum(u.cost) as collected_money, g.name, 
        g.short_description, g.full_description, g.cost, g.state, g.start_at, g.stop_at, g.end_at,g.photo
        from campaigns g join users_donate_campaigns u on (g.campaign_id = u.campaign_id) group by(u.campaign_id) having g.campaign_id = :campaign_id ", [
        'campaign_id' => $_GET['campaign_id'],
    ])->findOrFail();
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


require "views/pages/charity_campaigns/edit_view.php";
