<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$heading = "All My tests";
$notifications = $db->query(
    "SELECT * from notifications;"
)->findOrFail();
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

// $notifications = $db->query("SELECT * from notifications ;")->fetchAll();


require "views/pages/notifications/index_view.php";


?>