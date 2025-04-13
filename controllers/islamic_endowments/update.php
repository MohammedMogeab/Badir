<?php

$heading = "update test";

//require 'core\\' . "Validator.php";

use core\App;
use core\Database;

$db = App::resolve(Database::class);



// $userID = 1;
// $endowments = $db->query("SELECT * from endowments where endowment_id = :endowment_id ", [
//     'endowment_id' => $_GET['endowment_id']
// ])->findOrFail();


// // $note = $db->query("SELECT * from islamic_endowments where id = :id ", [
// //   'id' => $_POST['id'],
// // ])->findOrFail();

// authorize($note['other_id'] == $userID);




// $errors = [];

// if (!(Validator::string($_POST['anme'], 1, 255))) {
//     $errors["titel"] = "Titel  is too short or too long";
// }
// // if (!(Validator::string($_POST['body'], 1, 1000))) {
// //     $errors["titel"] = " body is too short or long";
// // }


// if (! empty($errors)) {

//     require "views/pages/islamic_endowments/edit_view.php";
//     die();
// }


// $db->query("UPDATE islamic_endowments set name = :name  " , [
//     'name' => $_POST['name'],

// ]);

try {
    $db->query(
        "UPDATE endowments
        SET 
            category_id = COALESCE(:category_id, category_id),
            partner_id = COALESCE(:partner_id, partner_id),
            name = COALESCE(:name, name),
            short_description = COALESCE(:short_description, short_description),
            full_description = COALESCE(:full_description, full_description),
            cost = COALESCE(:cost, cost),
            state = COALESCE(:state, state),
            directorate = COALESCE(:directorate, directorate),
            country = COALESCE(:country, country),
            city = COALESCE(:city, city),
            street = COALESCE(:street, street),
            photo = COALESCE(:photo, photo)
        WHERE endowment_id = :endowment_id",
        [
            'category_id' => $_POST['category_id'] ?? null,
            'partner_id' => $_POST['partner_id'] ?? null,
            'name' => isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null,
            'short_description' => isset($_POST['short_description']) ? htmlspecialchars($_POST['short_description']) : null,
            'full_description' => isset($_POST['full_description']) ? htmlspecialchars($_POST['full_description']) : null,
            'cost' => isset($_POST['cost']) ? filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : null,
            'state' => $_POST['state'] ?? null,
            'directorate' => $_POST['directorate'] ?? null,
            'country' => $_POST['country'] ?? null,
            'city' => $_POST['city'] ?? null,
            'street' => $_POST['street'] ?? null,
            'photo' => $filenamenew ?? null,
            'endowment_id' => $_POST['endowment_id']
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء تحديث البيانات";
    header("Location: /charity_projects_edit");
    exit();
}


header("Location:". $_SERVER["HTTP_REFERER"]);
die();
