<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


$userID = 1;



// $endowments = $db->query("SELECT * from endowments where endowment_id = :endowment_id ", [
//     'endowment_id' => $_GET['endowment_id']
// ])->findOrFail();

try {
    $categories = $db->query(
        "SELECT * FROM categories"
    )->fetchAll(); // Fetch all rows from the query result 
    $partners = $db->query(
        "SELECT * FROM partners"
    )->fetchAll(); // Fetch all rows from the query result
    $endowments = $db->query(
        "SELECT 
            A.category_id,
            A.partner_id,
            A.name,
            A.short_description,
            A.full_description,
            A.cost,
            sum(B.cost) as donate_cost,
            max(B.donate_date) as donate_date,
            A.state,
            A.directorate,
            A.city,
            A.street,
            A.photo
        FROM endowments A JOIN users_donate_endowments B ON (A.endowment_id = B. endowment_id)
        GROUP BY(A.endowment_id)
        HAVING A.endowment_id = :endowment_id
        ORDER BY donate_date DESC
        ",[
            'endowment_id' => $_GET['endowment_id']
        ]
    )->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البعانات";
    header("Location: /charity_campaigns_create");
    exit();
}



// $note = $db->query("SELECT * from endowments where endowment_id = :endowment_id ", [
//   'endowment_id' => $_GET['endowment_id'],
// ])->fetchAll();

//authorize($note['other_id'] == $userID);



require "views/pages/islamic_endowments/show_view.php";
