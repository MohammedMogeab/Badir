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

$notifications = $db->query(
    "SELECT 
        A.notification_id,
        A.title,
        A.content 
    FROM notifications A join users_notifications B on(A.notification_id = B.notification_id)
    GROUP BY notification_id
    HAVING notification_id IN
    (
        SELECT notification_id FROM users_notifications WHERE user_id = :user_id
    )
    ORDER BY A.send_at",[
        'user_id' => $userID
    ]
)->findOrFail();
foreach($notifications as $notification){
    $notification['photoes']= $db->query(
        "SELECT photo from notifications_photos where notification_id = :notification_id",[
            'notification_id'=>$notification['notification_id']
        ]
    )->fetchAll();
    $notification['projects']= $db->query(
        "SELECT project_id from L_projects_notifications where notification_id = :notification_id",[
            'notification_id' => $notification['notification_id']
        ]
    )->fetchAll();
    $notification['partners']= $db->query(
        "SELECT partner_id from L_partners_notifications where notification_id = :notification_id",[
            'notification_id' => $notification['notification_id']
        ]
    )->fetchAll();
    $notification['endowments']= $db->query(
        "SELECT endowment_id from L_endowments_notifications where notification_id = :notification_id",[
            'notification_id' => $notification['notification_id']
    ])->fetchAll();
    $notification['campaigns']= $db->query(
        "SELECT campaign_id from L_campaigns_notifications where notification_id = :notification_id",[
            'notification_id' => $notification['notification_id']
    ])->fetchAll();
}

require "views/pages/charity_campaigns/list_view.php";
