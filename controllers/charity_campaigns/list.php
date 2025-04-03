<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);


$userID = 1;


// يعرض الحملات التي قد تبرعت له
// يعني ششجمع العناصر بي النسبه لي علاقت المستخدم بهم
// $note = $db->query("SELECT * from charity_campaigns where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

$campaigns = $db->query("SELECT
A.campaign_id,
A.category_id,
SUM(B.COST) AS collected_money,
A.partner_id,
A.campaign_request_id,
A.name,
A.short_description,
A.full_description,
A.cost,
A.state,
A.start_at,
max(B.donate_date) as donate_date
FROM campaigns A join users_donate_campaigns B ON (A.campaign_id = B.campaign_id)
group by A.campaign_id

having A.campaign_id IN
		(
			select campaign_id
			FROM USERS_DONATE_CAMPAIGNS
			where USER_ID = :USER_ID
        )
order by donate_date desc;
", [
	'USER_ID' => $userID
])->fetchAll();

//authorize($note['other_id'] == $userID);



require "views/pages/charity_campaigns/list_view.php";
