<?php
$heading = "Home";

$_SESSION['name'] = "Developer";

use core\App;
use core\Database;

$db = App::resolve(Database::class);






$projects = $db->query(
    "SELECT 
    c.user_id,c.project_id, m.name ,m.short_description ,m.photo
    FROM
    users_cart_projects c JOIN projects m
    WHERE
    c.user_id = :user_id and c.project_id = m.project_id;",
    [
        'user_id' =>filter_var( $_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
    ]
)->fetchAll(); // محتوى السلة من المشاريع


$campaigns = $db->query(
    "SELECT 
    c.user_id,c.campaign_id, m.name ,m.short_description ,m.photo
    FROM
    users_cart_campaigns c JOIN campaigns m
    WHERE
    c.user_id = :user_id and c.campaign_id = m.campaign_id;",
    [
        'user_id' =>filter_var( $_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
    ]
)->fetchAll(); // محتوى السلة من الحملات الخيرية


$endowments = $db->query(
    "SELECT 
    c.user_id,c.endowment_id, m.name ,m.short_description ,m.photo
    FROM
    users_cart_endowments c JOIN endowments m
    WHERE
    c.user_id = :user_id and c.endowment_id = m.endowment_id;",
    [
        'user_id' =>filter_var( $_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
    ]
)->fetchAll(); // محتوى السلة من الأوقاف


$islamic_payments = $db->query(
    "SELECT 
    c.user_id,c.islamic_payment_id, m.name ,m.short_description ,m.photo
    FROM
    users_cart_islamic_payments c JOIN islamic_payments m
    WHERE
    c.user_id = :user_id and c.islamic_payment_id = m.islamic_payment_id ;",
    [
        'user_id' =>filter_var( $_SESSION['user']['id'], FILTER_SANITIZE_NUMBER_INT),
    ]
)->fetchAll();



// $islamic_payments =$db->query(
//     "SELECT
//     (
//         islamic_payment_describtion,"// وصف المدفوعات الاسلامية قد يتم ربطه برابط الى صفحة المدفوعات الاسلامية لانها غير مخزنة في قاعدة البيانات
//         ."cost,
//         donate_date
//     )
//     FROM users_cart_islamic_payments WHERE user_id = :user_id",[
//         'user_id' => $_SESSION['user_id'] 
//     ]
// )->fetchAll();// محتوى السلة من المصاريف الاسلامية
//صفحة التكلم عن الموقع

require "views/pages/cart_view.php";
