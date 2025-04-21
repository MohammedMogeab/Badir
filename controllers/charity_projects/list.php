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

//authorize($note['other_id'] == $userID);

$projects = $db->query("SELECT A.project_id, A.partner_id, A.category_id, A.level, A.beneficiaries_count, A.name, A.photo, A.short_description, A.full_description, A.type, A.cost, sum(B.cost) as collected_money, A.start_at, A.end_at, A.state, A.directorate, MAX(B.donate_date) as donste_date
From projects A join users_donate_projects B on (A.project_id = B.project_id)
group by A.project_id
having A.project_id in
		(
			select project_id 
            from users_donate_projects 
            where user_id =  :USER_ID
		)
order by (donate_date) desc;",[
    'USER_ID' => $_GET['user_id']
])->fetchAll();

require "views/pages/charity_campaigns/list_view.php";
