<?php

$heading = "update test";

//require 'core\\' . "Validator.php";

use core\App;
use core\Database;

$db = App::resolve(Database::class);




$errors = [];

if (!isset($_POST['endowment_id']) || !Validator::number($_POST['endowment_id'], 1)) {
    $errors["endowment_id"] = "معرّف الوقف غير صالح";
}

if (isset($_POST['category_id']) && !Validator::string($_POST['category_id'], 1, 255)) {
    $errors["category_id"] = "تصنيف الوقف غير صالح";
}

if (isset($_POST['partner_id']) && !Validator::string($_POST['partner_id'], 1, 255)) {
    $errors["partner_id"] = "الشريك غير صالح";
}

if (isset($_POST['name']) && !Validator::string($_POST['name'], 1, 255)) {
    $errors["name"] = "الاسم يجب أن يكون بين 1 و 255 حرفاً";
}

if (isset($_POST['short_description']) && !Validator::string($_POST['short_description'], 10, 1000)) {
    $errors["short_description"] = "الوصف المختصر يجب أن يكون بين 10 و 1000 حرفاً";
}

if (isset($_POST['full_description']) && !Validator::string($_POST['full_description'], 30, 2000)) {
    $errors["full_description"] = "الوصف الكامل يجب أن يكون بين 30 و 2000 حرفاً";
}

if (isset($_POST['cost']) && !Validator::number($_POST['cost'], 1, 10000000)) {
    $errors["cost"] = "المبلغ غير صالح";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location:". $_SERVER["HTTP_REFERER"]);
    exit();
}

// if (!empty($errors)) {
//     require "views/pages/endowments/edit_view.php"; // تأكد من صحة المسار
//     die();
// }

try {

    require('controllers/parts/image_loader.php') ;
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
