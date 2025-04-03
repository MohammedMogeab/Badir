<?php
$heading = "Edit test";

use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;

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
    ]
)->fetchAll();
$notifications['campaigns']= $db->query(
    "SELECT campaign_id from L_campaigns_notifications where notification_id = :notification_id",[
        'notification_id' => $_GET['notification_id']
    ]
)->fetchAll();
$notifications['users']= $db->query(
    "SELECT (user_id, read_at) from users_notifications where notification_id = :notification_id",[
        'notification_id' => $_GET['notification_id']
    ]
)->fetchAll();


// $item = $db->query("SELECT * from notifications where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($item['other_id'] == $userID);

$db->query(
    "UPDATE notifications SET
    title = :title,
    content = :content,
    send_at = :send_at
    WHERE notification_id = :notification_id",[
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'send_at' => $_POST['send_at'],
        'notification_id' => $_POST['notification_id']
    ]
);
for($i = 0; $i < count($_POST['photoes']); $i++){
    $db->query(
        "UPDATE notifications_photos SET
        photo = :photo
        WHERE notification_id = :notification_id and photo = :L_photo",[
            'photo' => $_POST['photoes'][$i],
            'L_photo' => $notifications['photoes'][$i],
            'notification_id' => $_POST['notification_id']
        ]
    );
}
for($i =count($_POST['projects']);$i < count($notifications['projects']); $i++){
    $db->query(
        "DELETE FROM notifications_photos WHERE notification_id = :notification_id and photo = :photo",[
            'notification_id' => $_POST['notification_id'],
            'photo' => $notifications['photoes'][$i]
        ]
        );
}
for($i = 0; $i < count($_POST['projects']); $i++){
    $db->query(
        "UPDATE L_projects_notifications SET
        project_id = :project_id
        WHERE notification_id = :notification_id and project_id = :L_project_id",[
            'project_id' => $_POST['projects'][$i],
            'L_project_id' => $notifications['projects'][$i],
            'notification_id' => $_POST['notification_id']
        ]
    );
}
for($i =count($_POST['projects']);$i < count($notifications['projects']); $i++){
    $db->query(
        "DELETE FROM L_projects_notifications WHERE notification_id = :notification_id and project_id = :project_id",[
            'notification_id' => $_POST['notification_id'],
            'project_id' => $notifications['projects'][$i]
        ]
        );
}
for($i = 0; $i < count($_POST['campaigns']); $i++){
    $db->query(
        "UPDATE L_campaigns_notifications SET
        campaign_id = :campaign_id
        WHERE notification_id = :notification_id and campaign_id = :L_campaign_id",[
            'campaign_id' => $_POST['campaigns'][$i],
            'L_campaign_id' => $notifications['campaigns'][$i],
            'notification_id' => $_POST['notification_id']
        ]
    );
}
for($i =count($_POST['campaigns']);$i < count($notifications['campaigns']); $i++){
    $db->query(
        "DELETE FROM L_campaigns_notifications WHERE notification_id = :notification_id and campaign_id = :campaign_id",[
            'notification_id' => $_POST['notification_id'],
            'campaign_id' => $notifications['campaigns'][$i]
        ]
        );
}
for($i = 0; $i < count($_POST['endowments']); $i++){
    $db->query(
        "UPDATE L_endowments_notifications SET
        endowment_id = :endowment_id
        WHERE notification_id = :notification_id and endowment_id = :L_endowment_id",[
            'endowment_id' => $_POST['endowments'][$i],
            'L_endowment_id' => $notifications['endowments'][$i],
            'notification_id' => $_POST['notification_id']
        ]
    );
}
for($i =count($_POST['endowments']);$i < count($notifications['endowments']); $i++){
    $db->query(
        "DELETE FROM L_endowments_notifications WHERE notification_id = :notification_id and endowment_id = :endowment_id",[
            'notification_id' => $_POST['notification_id'],
            'endowment_id' => $notifications['endowments'][$i]
        ]
        );
}
for($i = 0; $i < count($_POST['partners']); $i++){
    $db->query(
        "UPDATE L_partners_notifications SET
        partner_id = :partner_id
        WHERE notification_id = :notification_id and partner_id = :L_partner_id",[
            'partner_id' => $_POST['partners'][$i],
            'L_partner_id' => $notifications['partners'][$i],
            'notification_id' => $_POST['notification_id']
        ]
    );
}
for($i =count($_POST['partners']);$i < count($notifications['partners']); $i++){
    $db->query(
        "DELETE FROM L_partners_notifications WHERE notification_id = :notification_id and partner_id = :partner_id",[
            'notification_id' => $_POST['notification_id'],
            'partner_id' => $notifications['partners'][$i]
        ]
        );
}




require "views/pages/notifications/edit_view.php";
