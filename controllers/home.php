<?php
$heading = "Home";

$_SESSION['name'] = "Developer";

use core\App;
use core\Database;

$db = App::resolve(Database::class);


$heading = "All My tests";

try {
    $campaigns = $db->query(
        "SELECT 
            g.campaign_id, 
            g.category_id, 
            g.partner_id, 
            COALESCE(SUM(u.cost), 0) AS collected_money, 
            g.name, 
            g.photo, 
            g.short_description, 
            g.full_description, 
            g.cost, 
            g.state, 
            g.start_at, 
            g.stop_at, 
            g.end_at
        FROM campaigns g  
        LEFT JOIN users_donate_campaigns u ON g.campaign_id = u.campaign_id  
        GROUP BY g.campaign_id
        ORDER BY g.start_at;"
    )->fetchAll();


    $campaigns_statistics['count'] = $db->query("SELECT count(*) as count from campaigns ;")->fetch(); // عدد الحملات الخيرية
    $campaigns_statistics['donates_count'] = $db->query("SELECT count(*) as donates_count from users_donate_campaigns ;")->fetch(); // اجمالي التبرعات
    $campaigns_statistics['donates_sum'] = $db->query("SELECT sum(cost) as donates_sum from users_donate_campaigns ;")->fetch(); // اجمالي التبرعات للحملات الخيرية
    $campaigns_statistics['users_donates_count'] = $db->query("SELECT count(distinct user_id) as users_donates_count from users_donate_campaigns ;")->fetch(); // عدد المستخدمين الذين تبرعوا للحالات الخاصة

    $endowments_statistics['count'] = $db->query("SELECT count(*) as count from endowments ;")->fetch(); // عدد الاوقاف
    $endowments_statistics['donates_count'] = $db->query("SELECT count(*) as donates_count from users_donate_endowments ;")->fetch(); // اجمالي التبرعات
    $endowments_statistics['donates_sum'] = $db->query("SELECT sum(cost) as donates_sum from users_donate_endowments ;")->fetch(); // اجمالي التبرعات للحملات الخيرية
    $endowments_statistics['users_donates_count'] = $db->query("SELECT count(distinct user_id) as users_donates_count from users_donate_endowments ;")->fetch();

    $projects_statistics['count'] = $db->query("SELECT count(*) as count from projects ;")->fetch(); // عدد المشاريع
    $projects_statistics['donates_count'] = $db->query("SELECT count(*) as donates_count from users_donate_projects ;")->fetch(); // اجمالي التبرعات
    $projects_statistics['donates_sum'] = $db->query("SELECT sum(cost) as donates_sum from users_donate_projects ;")->fetch(); // اجمالي التبرعات للحملات الخيرية
    $projects_statistics['users_donates_count'] = $db->query("SELECT count(distinct user_id) as users_donates_count from users_donate_projects ;")->fetch();
    $projects_statistics['completed'] = $db->query("SELECT count(*) as completed FROM projects WHERE state = 'end';")->fetch(); // عدد المشاريع المكتملة

    $islamic_payments_statistics['count'] = $db->query("SELECT count(*) as count from islamic_payments ;")->fetch(); // عدد المدفوعات الاسلامية
    $islamic_payments_statistics['users_paid_count'] = $db->query("SELECT count(distinct user_id) as users_paid_count from islamic_payments ;")->fetch(); //  عدد المستخدمين الذين شاركوا في المصاريف الاسلامية
    $islamic_payments_statistics['zakat_sum'] = $db->query("SELECT sum(cost) as zakat_sum from islamic_payments where type = 'zakat' ;")->fetch(); // اجمالي الزكاة الاسلامية
    $islamic_payments_statistics['Kaffarah_sum'] = $db->query("SELECT sum(cost) as Kaffarah_sum from islamic_payments where type = 'Kaffarah' ;")->fetch(); // اجمالي الكفارات الاسلامية
    $islamic_payments_statistics['Sadaqah_sum'] = $db->query("SELECT sum(cost) as Sadaqah_sum from islamic_payments where type = 'Sadaqah' ;")->fetch(); // اجمالي الصدقات الاسلامية
    $islamic_payments_statistics['Islamic_payments_have_been_distributed'] = $db->query("SELECT SUM(paid_cost) as Islamic_payments_have_been_distributed from islamic_payments ;")->fetch(); // مدفوعات اسلامية تم توزيعها على الحملات والمشاريع
    $islamic_payments_statistics['rest'] = $islamic_payments_statistics['users_paid_count']['users_paid_count'] - $islamic_payments_statistics['Islamic_payments_have_been_distributed']['Islamic_payments_have_been_distributed'];


    $users_statistics['count'] = $db->query("SELECT count(*) as count from users ;")->fetch(); // عدد المستخدمين
    $users_statistics['donates_sum'] =
        $campaigns_statistics['donates_sum']['donates_sum'] +
        $endowments_statistics['donates_sum']['donates_sum'] +
        $projects_statistics['donates_sum']['donates_sum'] +
        $islamic_payments_statistics['users_paid_count']['users_paid_count']; // اجمالي تبرعات المستخدمين
    $users_statistics['donates_count'] =
        $campaigns_statistics['users_donates_count']['users_donates_count'] +
        $endowments_statistics['users_donates_count']['users_donates_count'] +
        $projects_statistics['users_donates_count']['users_donates_count'] +
        $islamic_payments_statistics['users_paid_count']['users_paid_count']; // اجمالي عدد المستخدمين الذين تبرعوا للمشاريع والحملات والمدفوعات الاسلامية

    $partners_statistics['count'] = $db->query("SELECT count(*) as count FROM partners;")->fetch(); // عدد الشركاء
    $campaigns_statistics['complete'] = $db->query("SELECT count(*) as complete from campaigns where state='end' ;")->fetch(); // اجمالي الحملات المكتملة وتشمل ايضا عدد المستفيدين لانه الحملة لمستفدين واحد
    $projects_statistics['beneficiaries_count'] = $db->query("SELECT sum(beneficiaries_count) as beneficiaries_count  from projects where state='end' ;")->fetch(); // عدد المستفيدين من المشروع
    $beneficiaries_project_campain['beneficiaries_count'] =
        $campaigns_statistics['complete']['complete'] +
        $projects_statistics['beneficiaries_count']['beneficiaries_count']; // اجمالي عدد المستفيدين من الحملات والمشاريغ
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}

require "views/pages/home_view.php";
