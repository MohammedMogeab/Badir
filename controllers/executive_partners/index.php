<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);

$page = "executive_partners_index" ;


try {
    // Get search input
    $search = $_GET['search'] ?? '';

    // Base Query
    $query = "SELECT * FROM partners WHERE 1=1";
    $params = [];

    // 🔎 Add Search Filter
    if (!empty($search)) {
        $query .= " AND MATCH(name, description, more_information) AGAINST (:search IN NATURAL LANGUAGE MODE)";
        $params['search'] = $search;
    }
    // if (isset($_GET['submit']) && $_GET['submit'] == "foryou") {
    //     $query .= " AND u.user_id = :user_id";
    //     $params['user_id'] = $_SESSION['user']['id'];
    // } لا يوجد يوزر ايدي في هذا الجدول كما لا يرتبط هذا الجدول بالمشاريع


    // 👌 Finalize Query
    $query .= " ORDER BY name ASC;";

    // Execute the query
    $partners = $db->query($query, $params)->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء جلب البيانات";
    header("Location: /partners");
    exit();
}

// foreach($partners as $key => $value){
//     $partners[$key]['phones'] = $db->query(
//         "SELECT phone, type from partners_phones
//         WHERE partner_id = :partner_id",[
//             'partner_id' => $value['partner_id']
//         ])->fetchAll();
//     $partners[$key]['accounts'] = $db->query(
//         "SELECT account, account_type from partners_accounts
//         WHERE partner_id = :partner_id",[
//             'partner_id' => $value['partner_id']
//         ])->fetchAll();
// }
// $executive_partners = $db->query("SELECT * from executive_partners ;")->fetchAll();


require "views/pages/executive_partners/index_view.php";


?>