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

$endowments = $db->query(
    "SELECT 
        A.category_id,
        A.partner_id,
        A.name,
        A.short_description,
        A.full_description,
        A.cost,
        sum(B.cost) as donate_cost,
        max(B.donate_date) as donate_date,
        A.start_at,
        A.end_at,
        A.state,
        A.directorate,
        A.city,
        A.street,
        A.photo
    FROM endowments A JOIN users_donate_endowments B ON (A.endowment_id = B. endowment_id)
    GROUP BY(A.endowment_id)
    HAVING A.endowment_id IN
    (
        select endowment_id from users_donate_endowments where user_id = :user_id
    )
    ORDER BY donate_date DESC
    ",[
        'user_id' => $_GET['user_id']
    ]
);

require "views/pages/charity_campaigns/list_view.php";
