<?php
$heading = "one test";

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$userID = 1;
try {
    $endowments = $db->query(
        "SELECT 
            A.endowment_id,
            A.category_id,
            A.partner_id,
            A.name,
            A.short_description,
            A.full_description,
            A.cost,
            sum(B.cost) as donate_cost,
            max(B.donate_date) as donate_date,
            count(B.user_id) as donate_count,
            A.state,
            A.directorate,
            A.city,
            A.street,
            A.photo
        FROM endowments A LEFT JOIN users_donate_endowments B ON (A.endowment_id = B. endowment_id)
        GROUP BY(A.endowment_id)
        HAVING A.endowment_id = :endowment_id
        ORDER BY donate_date DESC
        ",
        [
            'endowment_id' => $_GET['endowment_id']
        ]
    )->fetchAll();
    $categories = $db->query(
        "SELECT * FROM categories where category_id = :category_id",
        [
            'category_id' => $endowments[0]['category_id']
        ]
    )->fetchAll(); // Fetch all rows from the query result
    $partners = $db->query(
        "SELECT * FROM partners where partner_id = :partner_id",
        [
            'partner_id' => $endowments[0]['partner_id']
        ]
    )->fetchAll(); // Fetch all rows from the query result

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header("Location: /charity_campaigns_create");
    exit();
}
require "views/pages/islamic_endowments/show_view.php";
