<?php
$heading = "Create test";



use core\App;
use core\Database;

$db = App::resolve(Database::class);



$errors = [];

if (isset($_POST["submit"])) {

    $file = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $size = $_FILES['photo']['size'];
    $type = $_FILES['photo']['type'];
    $error = $_FILES['photo']['error'];
    $fileExt = explode('.', $file);
    $fileActual = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActual, $allow)) {
        if ($error === 0) {
            if ($size < 10000000) {
                $filenamenew = uniqid('', true) . "." . $fileActual;
                $fileDestination = __DIR__ . '/../../views/media/images/' . $filenamenew;

                echo $fileDestination;
                move_uploaded_file($tmp, $fileDestination);
            } else {
                echo "your file is too big";
            }
        } else {
            echo "there was an error uploading your file";
        }
    } else {
        echo "you are not allow to uplaod file";
    }
} else {
    echo "error";
}


if (! empty($errors)) {

    require "views/pages/notifications/create_view.php";
    die();
}


// $db->query("INSERT INTO notifications (name) VALUES (:name)", [
//     'name' => $_POST['name'],
// ]);
// $notification_id = $db->query(
// "INSERT INTO notifications (title, content, send_at) VALUES (:title, :content, :send_at)",[
// 'title' => $_POST['title'],
// 'content' => $_POST['content'],
// 'send_at' => $_POST['send_at'],
// ]
// )->getGeneratedKey();
// foreach($_POST['photoes'] as $photo){
// $db->query(
// "INSERT INTO notifications_photos (notification_id, photo) VALUES (:notification_id, :photo)",[
// 'notification_id' => $notification_id,
// 'photo' => $photo,
// ]
// );
// }
// foreach($_POST['projects'] as $project){
// $db->query(
// "INSERT INTO L_projects_notifications (notification_id, project_id) VALUES (:notification_id, :project_id)",[
// 'notification_id' => $notification_id,
// 'project_id' => $project['project_id'],
// ]
// );
// $users = $db->query("SELECT user_id FROM users_noti_projects WHERE project_id = :project_id",[
// 'project_id'=>$project['project_id']
// ])->fetchAll();
// foreach($users as $user){
// $db->query(
// "INSERT into users_notification (notification_id,user_id) values (:notification_id,:user_id)",[
// 'notification_id' => $notification_id,
// 'user_id' => $user
// 
// ]
// );
// }
// }
// foreach($_POST['endowments'] as $endowment){
// $db->query(
// "INSERT INTO L_endowments_notifications (notification_id, endowment_id) VALUES (:notification_id, :endowment_id)",[
// 'notification_id' => $notification_id,
// 'endowment_id' => $endowment['endowment_id'],
// ]
// );
// $users = $db->query("SELECT user_id FROM users_noti_endwoements WHERE endwoement_id = :endwoement_id",[
// 'endwoement_id'=>$endwoement['endwoement_id']
// ])->fetchAll();
// foreach($users as $user){
// $db->query(
// "INSERT into users_notification (notification_id,user_id) values (:notification_id,:user_id)",[
// 'notification_id' => $notification_id,
// 'user_id' => $user
// 
// ]
// );
// }
// }
// foreach($_POST['campaigns'] as $campaign){
// $db->query(
// "INSERT INTO L_campaigns_notifications (notification_id, campaign_id) VALUES (:notification_id, :campaign_id)",[
// 'notification_id' => $notification_id,
// 'campaign_id' => $campaign['campaign_id'],
// ]
// );
// $users = $db->query("SELECT user_id FROM users_noti_campaigns WHERE campaign_id = :campaign_id",[
// 'campaign_id'=>$campaign['campaign_id']
// ])->fetchAll();// المستخدمين الذين فعلوا الاشعارات لهذه الحملة
// foreach($users as $user){
// $db->query(
// "INSERT into users_notification (notification_id,user_id) values (:notification_id,:user_id)",[
// 'notification_id' => $notification_id,
// 'user_id' => $user
// ]
// );// ارسال الاشعارات
// }
// }
// 




try {
    $db->query(
        "INSERT INTO notifications (
            title,
            content,
            send_at,
            photo
        ) VALUES (
            :title,
            :content,
            :send_at,
            :photo
        )",
        [
            'title' => htmlspecialchars($_POST['title']),
            'content' => htmlspecialchars($_POST['content']),
            'send_at' => $_POST['send_at'] ?? date('Y-m-d H:i:s'), // Default to current timestamp
            'photo' => $filenamenew
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_projects_create");
    exit();
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
die();
