<?php

$heading = "update test";

//require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



$userID = 1;



// $note = $db->query("SELECT * from charity_projects where id = :id ", [
//   'id' => $_POST['id'],
// ])->findOrFail();

// authorize($note['other_id'] == $userID);




// $errors = [];

// if (!(Validator::string($_POST['anme'], 1, 255))) {
//     $errors["titel"] = "Titel  is too short or too long";
// }
// // if (!(Validator::string($_POST['body'], 1, 1000))) {
// //     $errors["titel"] = " body is too short or long";
// // }


// if (! empty($errors)) {
  
//     require "views/pages/charity_projects/edit_view.php";
//     die();
// }
 
// $projects = $db->query("SELECT 
//     (
//     partner_id,
//     category_id,
//     level,
//     name,
//     photo,
//     short_description,
//     full_description,
//     type,
//     cost,
//     start_at,
//     end_at,
//     state,
//     directorate
//     )FROM PROJECTS WHERE project_id = :project_id
// ",[
//     'project_id' => $_POST['project_id']
// ])->findOrFail();

// // $db->query("UPDATE charity_projects set name = :name  " , [
// //     'name' => $_POST['name'],

// // ]);
// $db->query
// (
//     "update projects set
//     (
//         partner_id = :partner_id,
//         category_id = :category_id,
//         level = :level,
//         name = :name,
//         photo = :photo,
//         short_description = :short_description,
//         full_description = :full_description,
//         type = :type,
//         cost = :cost,
//         end_at = :end_at,
//         state = :state,
//         directorate = :directorate
//     )where project_id = :project_id",
//     [
//         'partner_id' => $_POST['partner_id'],
//         'category_id' => $_POST['category_id'],
//         'level' => $_POST['level'],
//         'name' => $_POST['name'],
//         'photo' => $_POST['photo'],
//         'short_description' => $_POST['short_description'],
//         'full_description' => $_POST['full_description'],
//         'type' => $_POST['type'],
//         'cost' => $_POST['cost'],
//         'end_at' => $_POST['end_at'],
//         'state' => $_POST['state'],
//         'directorate' => $_POST['directorate'],
//         'project_id' => $_POST['project_id']
//     ]
// );

//  // استقبال البيانات المطابقة لقاعدة البيانات 
//  $category_id = $_POST['category_id'];
//  $partner_id = $_POST['partner_id'];
//  $level = $_POST['level'];
//  $photo =$_POST['photo'];
//  $name = $_POST['name'];
//  $short_description = $_POST['short_description'];
//  $full_description = $_POST['full_description'];
//  $type = ['type'];
//  $cost = $_POST['cost'];
//  $state = $_POST['state'];
//  $directorate  = ['directorate'];
//  $end_at = $_POST['end_at'];
// $project_id = $_POST['project_id'];

//    // استقبال البيانات من النموذج
//   $caseType = $_POST['caseType'];
//   $age = $_POST ['age']; 
//   $circumstances = $_POST['circumstances'];
//   $amount = $_POST['amount'];
//   $accountNumber = $_POST['accountNumber']; 
//   $bankName = $_POST['bankName']; 
//   $accountType = $_POST['accountType']; 
//   $documents = $_POST['documents']; 
//   $idFont = $_POST['idFont']; 
//   $idback = $_POST['idback']; 
 
//  header("Location: /pages/charity_projects");
//  die();


try {
    $db->query(
        "UPDATE projects
        SET 
            partner_id = COALESCE(:partner_id, partner_id),
            category_id = COALESCE(:category_id, category_id),
            level = COALESCE(:level, level),
            name = COALESCE(:name, name),
            short_description = COALESCE(:short_description, short_description),
            full_description = COALESCE(:full_description, full_description),
            type = COALESCE(:type, type),
            cost = COALESCE(:cost, cost),
            start_at = COALESCE(:start_at, start_at),
            stop_at = COALESCE(:stop_at, stop_at),
            end_at = COALESCE(:end_at, end_at),
            state = COALESCE(:state, state),
            directorate = COALESCE(:directorate, directorate),
            country = COALESCE(:country, country),
            city = COALESCE(:city, city),
            street = COALESCE(:street, street),
            photo = COALESCE(:photo, photo)
        WHERE project_id = :project_id",
        [
            'partner_id' => $_POST['partner_id'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'level' => $_POST['level'] ?? null,
            'name' => isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null,
            'short_description' => isset($_POST['short_description']) ? htmlspecialchars($_POST['short_description']) : null,
            'full_description' => isset($_POST['full_description']) ? htmlspecialchars($_POST['full_description']) : null,
            'type' => $_POST['type'] ?? null,
            'cost' => isset($_POST['cost']) ? filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : null,
            'start_at' => $_POST['start_at'] ?? null,
            'stop_at' => $_POST['stop_at'] ?? null,
            'end_at' => $_POST['end_at'] ?? null,
            'state' => $_POST['state'] ?? null,
            'directorate' => $_POST['directorate'] ?? null,
            'country' => $_POST['country'] ?? null,
            'city' => $_POST['city'] ?? null,
            'street' => $_POST['street'] ?? null,
            'photo' => $filenamenew ?? null,
            'project_id' => $_POST['project_id']
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء تحديث البيانات";
    header("Location: /projects_edit");
    exit();
}



header("Location:". $_SERVER["HTTP_REFERER"]);
die();
