<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);


$page = "notifications_manage" ;


try {
    // Get search and sorting inputs from $_GET
    $search = $_GET['search'] ?? '';
    $sort = $_GET['sort'] ?? 'latest'; // Default: show latest notifications

    // Base Query
    $query = "SELECT * FROM notifications WHERE 1=1";
    $params = [];

    // 🔎 Add Search Filter (Full-Text Search)
    if (!empty($search)) {
        $query .= " AND MATCH(title, content) AGAINST (:search IN NATURAL LANGUAGE MODE)";
        $params['search'] = $search;
    }
    if ($_GET['submit'] == "foryou") {
        $query .= " AND u.user_id = :user_id";
        $params['user_id'] = $_SESSION['user']['id'];
    }


    // 📌 Add Sorting Option
    if ($sort === 'oldest') {
        $query .= " ORDER BY send_at ASC";
    } else { 
        $query .= " ORDER BY send_at DESC"; // Default: Latest notifications first
    }

    // Execute the query
    $notifications = $db->query($query, $params)->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


// $notifications = $db->query(
//     "SELECT 
//         A.notification_id,
//         A.title,
//         A.content 
//     FROM notifications A join users_notifications B on(A.notification_id = B.notification_id)
//     GROUP BY notification_id
//     HAVING notification_id IN
//     (
//         SELECT notification_id FROM users_notifications WHERE user_id = :user_id
//     )
//     ORDER BY A.send_at",[
//         'user_id' => $userID
//     ]
// )->findOrFail();


// foreach($notifications as $notification){
//     $notification['photoes']= $db->query(
//         "SELECT photo from notifications_photos where notification_id = :notification_id",[
//             'notification_id'=>$notification['notification_id']
//         ]
//     )->fetchAll();
//     $notification['projects']= $db->query(
//         "SELECT project_id from L_projects_notifications where notification_id = :notification_id",[
//             'notification_id' => $notification['notification_id']
//         ]
//     )->fetchAll();
//     $notification['partners']= $db->query(
//         "SELECT partner_id from L_partners_notifications where notification_id = :notification_id",[
//             'notification_id' => $notification['notification_id']
//         ]
//     )->fetchAll();
//     $notification['endowments']= $db->query(
//         "SELECT endowment_id from L_endowments_notifications where notification_id = :notification_id",[
//             'notification_id' => $notification['notification_id']
//     ])->fetchAll();
//     $notification['campaigns']= $db->query(
//         "SELECT campaign_id from L_campaigns_notifications where notification_id = :notification_id",[
//             'notification_id' => $notification['notification_id']
//     ])->fetchAll();
//}

// $notifications = $db->query("SELECT * from notifications ;")->fetchAll();
// dd($notifications);

require "views/pages/notifications/manage_view.php";
