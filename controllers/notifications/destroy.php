<?php
$heading = "destroy note";
use core\App ;
use core\Database ;

$db = App::resolve(Database::class);

$userID = 1;
 

// $note = $db->query("SELECT * from notifications where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();
$notifications = $db->query(
    "SELECT * FROM notifications WHERE notification_id = :notification_id",[
        'notification_id'=>$_GET['notification_id']
    ]
);

//authorize($note['other_id'] == $userID);

// $db->query("DELETE FROM notifications where id = :id", [
//   'id' => $_POST['id'],
// ]);
$db->query(
    "DELETE FROM notifications WHERE notification_id = :notification_id",[
        'notification_id'=>$_POST['notification_id']
    ]
);

header("Location: /pages/notifications");
exit();



