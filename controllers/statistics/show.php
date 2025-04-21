<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;



// $note = $db->query("SELECT * from statistics where id = :id ", [
//   'id' => $_GET['id'],
// ])->findOrFail();

//authorize($note['other_id'] == $userID);

$campaigns_statistics['donates_sum'] = $db->query("SELECT sum(cost) as donates_sum from users_donate_campaigns ;")->fetch();// اجمالي التبرعات للحملات الخيرية
$campaigns_statistics['count'] = $db->query("SELECT count(*) as count from campaigns ;")->fetch();// عدد الحملات الخيرية

$endowments_statistics['donates_sum'] = $db->query("SELECT sum(cost) as donates_sum from users_donate_endowments ;")->fetch(); //اجمالي التبرعات للاوقاف 
$endowments_statistics['count'] = $db->query("SELECT count(*) as count from endowments ;")->fetch(); // عدد الاوقاف

$projects_statistics['donates_sum'] = $db->query("SELECT sum(cost) as donates_sum from users_donate_projects ;")->fetch(); //  اجمالي التبرعات للمشاريع
$projects_statistics['count'] = $db->query("SELECT count(*) as count from projects ;")->fetch(); // عدد المشاريع

$islamic_payments_statistics['donates_sum'] = $db->query("SELECT sum(paid_cost) as donates_sum from islamic_payments ;")->fetch(); //  اجمالي تبرعات المستخدمين
$islamic_payments_statistics['count'] = $db->query("SELECT count(*) as count from islamic_payments ;")->fetch(); // عدد المدفوعات الاسلامية



$statisticsAll = [
    'all' => [
        'sum' => $campaigns_statistics['donates_sum']['donates_sum']+$endowments_statistics['donates_sum']['donates_sum']+$projects_statistics['donates_sum']['donates_sum']+$islamic_payments_statistics['donates_sum']['donates_sum'] ,
        'count' => $campaigns_statistics['count']['count']+$endowments_statistics['count']['count']+$projects_statistics['count']['count']+$islamic_payments_statistics['count']['count'] 
    ],
    'campaigns' => [
        'sum' => $campaigns_statistics['donates_sum']['donates_sum'],
        'count' => $campaigns_statistics['count']['count']
    ],
    'endowments' => [
        'sum' => $endowments_statistics['donates_sum']['donates_sum'],
        'count' => $endowments_statistics['count']['count']
    ],
    'projects' => [
        'sum' => $projects_statistics['donates_sum']['donates_sum'],
        'count' => $projects_statistics['count']['count']
    ],
    'islamic_payments' => [
        'sum' => $islamic_payments_statistics['donates_sum']['donates_sum'],
        'count' => $islamic_payments_statistics['count']['count']
    ]
];

require "views/pages/statistics/show_view.php";
