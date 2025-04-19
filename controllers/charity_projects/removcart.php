<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);

try {
    $db->query(
        "DELETE FROM users_cart_projects 
         WHERE user_id = :user_id AND project_id = :project_id",
        [
            'user_id' => filter_var($_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
            'project_id' => $_POST['project_id']
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
