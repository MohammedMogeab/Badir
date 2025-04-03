<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";

$projects = $db->query("
select P.project_id, P.partner_id, P.category_id, P.level, P.name, P.photo, P.short_description, P.full_description, P.type, P.cost, sum(B.cost) as collected_money, P.start_at, P.end_at, P.state, P.directorate
From projects P join users_donate_projects B on(P.project_id = B.project_id)
group by (P.project_id)
order by (P.start_at ) desc;
")->fetchAll();

// $charity_projects = $db->query("SELECT * from charity_projects ;")->fetchAll();


require "views/pages/charity_projects/index_view.php";


?>