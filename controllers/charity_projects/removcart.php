<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);
$_POST['user_id'] = $_SESSION['user_id'];
try {
    $db->query(
        "DELETE FROM users_cart_projects 
         WHERE user_id = :user_id AND project_id = :project_id",
        [
            'user_id' => $_POST['user_id'],
            'project_id' => $_POST['project_id']
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البعانات";
    header("Location: /charity_campaigns_create");
    exit();
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
