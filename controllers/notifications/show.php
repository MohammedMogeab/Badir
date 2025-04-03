<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;



// $note = $db->query("SELECT * from notifications where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);
$notifications = $db->query(
    "SELECT * FROM notifications WHERE notification_id = :notification_id",[
        'notification_id'=>$_GET['notification_id']
    ]
)->findOrFail();
$notifications['photoes']= $db->query(
    "SELECT photo from notifications_photos where notification_id = :notification_id",[
        'notification_id'=>$_GET['notification_id']
    ]
)->fetchAll();
$notifications['projects']= $db->query(
    "SELECT project_id from L_projects_notifications where notification_id = :notification_id",[
        'notification_id' => $_GET['notification_id']
    ]
)->fetchAll();
$notifications['partners']= $db->query(
    "SELECT partner_id from L_partners_notifications where notification_id = :notification_id",[
        'notification_id' => $_GET['notification_id']
    ]
)->fetchAll();
$notifications['endowments']= $db->query(
    "SELECT endowment_id from L_endowments_notifications where notification_id = :notification_id",[
        'notification_id' => $_GET['notification_id']
])->fetchAll();
$notifications['campaigns']= $db->query(
    "SELECT campaign_id from L_campaigns_notifications where notification_id = :notification_id",[
        'notification_id' => $_GET['notification_id']
])->fetchAll();


require "views/pages/notifications/show_view.php";
