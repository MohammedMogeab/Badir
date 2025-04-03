<?php
$heading = "Create test";



use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$errors = [];

//if (!(Validator::string($_POST['name'], 1, 255))) {
//    $errors["name"] = "Titel  is too short or too long";
//}
// if (!(Validator::string($_POST['body'], 1, 1000))) {
//     $errors["titel"] = " body is too short or long";
// }


if (! empty($errors)) {

    require "views/pages/notifications/create_view.php";
    die();
}


// $db->query("INSERT INTO notifications (name) VALUES (:name)", [
//     'name' => $_POST['name'],
// ]);
$notification_id = $db->query(
    "INSERT INTO notifications (title, content, send_at) VALUES (:title, :content, :send_at)",[
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'send_at' => $_POST['send_at'],
    ]
)->getGeneratedKey();
foreach($_POST['photoes'] as $photo){
    $db->query(
        "INSERT INTO notifications_photos (notification_id, photo) VALUES (:notification_id, :photo)",[
            'notification_id' => $notification_id,
            'photo' => $photo,
        ]
    );
}
foreach($_POST['projects'] as $project){
    $db->query(
        "INSERT INTO L_projects_notifications (notification_id, project_id) VALUES (:notification_id, :project_id)",[
            'notification_id' => $notification_id,
            'project_id' => $project['project_id'],
        ]
    );
    $users = $db->query("SELECT user_id FROM users_noti_projects WHERE project_id = :project_id",[
        'project_id'=>$project['project_id']
    ])->fetchAll();
    foreach($users as $user){
        $db->query(
            "INSERT into users_notification (notification_id,user_id) values (:notification_id,:user_id)",[
                'notification_id' => $notification_id,
                'user_id' => $user
            ]
        );
    }
}
foreach($_POST['endowments'] as $endowment){
    $db->query(
        "INSERT INTO L_endowments_notifications (notification_id, endowment_id) VALUES (:notification_id, :endowment_id)",[
            'notification_id' => $notification_id,
            'endowment_id' => $endowment['endowment_id'],
        ]
    );
    $users = $db->query("SELECT user_id FROM users_noti_endwoements WHERE endwoement_id = :endwoement_id",[
        'endwoement_id'=>$endwoement['endwoement_id']
    ])->fetchAll();
    foreach($users as $user){
        $db->query(
            "INSERT into users_notification (notification_id,user_id) values (:notification_id,:user_id)",[
                'notification_id' => $notification_id,
                'user_id' => $user
            ]
        );
    }
}
foreach($_POST['campaigns'] as $campaign){
    $db->query(
        "INSERT INTO L_campaigns_notifications (notification_id, campaign_id) VALUES (:notification_id, :campaign_id)",[
            'notification_id' => $notification_id,
            'campaign_id' => $campaign['campaign_id'],
        ]
    );
    $users = $db->query("SELECT user_id FROM users_noti_campaigns WHERE campaign_id = :campaign_id",[
        'campaign_id'=>$campaign['campaign_id']
    ])->fetchAll();// المستخدمين الذين فعلوا الاشعارات لهذه الحملة
    foreach($users as $user){
        $db->query(
            "INSERT into users_notification (notification_id,user_id) values (:notification_id,:user_id)",[
                'notification_id' => $notification_id,
                'user_id' => $user
            ]
        );// ارسال الاشعارات لهم
    }
}
header("Location: /pages/notifications");
die();


