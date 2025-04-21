<?php

$heading = "update test";

//require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];

if (!isset($_POST['project_id']) || !Validator::number($_POST['project_id'], 1, 999999)) {
    $errors['project_id'] = "رقم المشروع غير صالح";
}
if (isset($_POST['category_id']) && !Validator::string($_POST['category_id'], 1, 255)) {
    $errors["category_id"] = "يجب اختيار تصنيف صحيح للحملة";
}
if (isset($_POST['name']) && !Validator::string($_POST['name'], 1, 255)) {
    $errors["name"] = "الاسم يجب ان يكون بين 1 و 255 حرفاً";
}
if (isset($_POST['partner_id']) && !Validator::string($_POST['partner_id'], 1, 1000)) {
    $errors["partner_id"] = "يجب اختيار شريك صحيح";
}
if (isset($_POST['state']) && !Validator::string($_POST['state'], 1, 225)) {
    $errors["state"] = "الحالة غير صالحة";
}
if (isset($_POST['short_description']) && !Validator::string($_POST['short_description'], 10, 1000)) {
    $errors["short_description"] = "الوصف المختصر يجب أن يكون بين 10 و 1000 حرفاً";
}
if (isset($_POST['full_description']) && !Validator::string($_POST['full_description'], 30, 1000)) {
    $errors["full_description"] = "الوصف الكامل يجب أن يكون بين 30 و 1000 حرفاً";
}
if (isset($_POST['cost']) && !Validator::number($_POST['cost'], 1, 10000000)) {
    $errors["cost"] = "المبلغ غير صالح";
}
if (isset($_POST['beneficiaries_count']) && !Validator::number($_POST['beneficiaries_count'], 1, 10000000)) {
    $errors["beneficiaries_count"] = "عدد المستفيدين غير صالح";
}
if (isset($_POST['level']) && !Validator::number($_POST['level'], 1, 1000)) {
    $errors["level"] = "المستوى غير صالح";
}
// Optional: Validate date format if needed
// $dateFields = ['start_at', 'stop_at', 'end_at'];
// foreach ($dateFields as $field) {
//     if (isset($_POST[$field]) && !Validator::date($_POST[$field])) {
//         $errors[$field] = "صيغة التاريخ لحقل $field غير صحيحة";
//     }
// }

// if (!empty($errors)) {
//     require "views/pages/charity_projects/edit_view.php";
//     die();
// }

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location:". $_SERVER["HTTP_REFERER"]);
    exit();
}

try {
    require('controllers/parts/image_loader.php') ;
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
            photo = COALESCE(:photo, photo),
            beneficiaries_count = COALESCE(:beneficiaries_count, beneficiaries_count)
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
            'project_id' => $_POST['project_id'],
            'beneficiaries_count' => $_POST['beneficiaries_count']
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
