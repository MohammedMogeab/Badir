<?php

$heading = "update test";

//require 'core\\' . "Validator.php";

use core\App ;
use core\Database;

$db = App::resolve(Database::class);



require('controllers/parts/image_loader.php') ;

$errors = [];

if (!isset($_POST['partner_id']) || !Validator::number($_POST['partner_id'], 1, 999999)) {
    $errors['partner_id'] = "رقم الشريك غير صالح";
}

if (isset($_POST['name']) && !Validator::string($_POST['name'], 1, 255)) {
    $errors['name'] = "الاسم يجب أن يكون بين 1 و 255 حرفاً";
}

if (isset($_POST['description']) && !Validator::string($_POST['description'], 10, 1000)) {
    $errors['description'] = "الوصف يجب أن يكون بين 10 و 1000 حرفاً";
}

if (isset($_POST['more_information']) && !Validator::string($_POST['more_information'], 0, 2000)) {
    $errors['more_information'] = "المعلومات الإضافية طويلة جداً";
}

if (isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "البريد الإلكتروني غير صالح";
}

if (isset($_POST['directorate']) && !Validator::string($_POST['directorate'], 1, 255)) {
    $errors['directorate'] = "المديرية غير صالحة";
}

if (isset($_POST['country']) && !Validator::string($_POST['country'], 1, 255)) {
    $errors['country'] = "الدولة غير صالحة";
}

if (isset($_POST['city']) && !Validator::string($_POST['city'], 1, 255)) {
    $errors['city'] = "المدينة غير صالحة";
}

if (isset($_POST['street']) && !Validator::string($_POST['street'], 1, 255)) {
    $errors['street'] = "الشارع غير صالح";
}

if (isset($_POST['phone']) && !Validator::string($_POST['phone'], 7, 20)) {
    $errors['phone'] = "رقم الهاتف غير صالح";
}

// if (!empty($errors)) {
//     require "views/pages/partners/edit_view.php"; // adjust path if needed
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
        "UPDATE partners
        SET 
            name = COALESCE(:name, name),
            description = COALESCE(:description, description),
            more_information = COALESCE(:more_information, more_information),
            email = COALESCE(:email, email),
            directorate = COALESCE(:directorate, directorate),
            country = COALESCE(:country, country),
            city = COALESCE(:city, city),
            street = COALESCE(:street, street),
            phone = COALESCE(:phone, phone),
            photo = COALESCE(:photo, photo)
        WHERE partner_id = :partner_id",
        [
            'name' => isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null,
            'description' => isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null,
            'more_information' => isset($_POST['more_information']) ? htmlspecialchars($_POST['more_information']) : null,
            'email' => isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null,
            'directorate' => $_POST['directorate'] ?? null,
            'country' => $_POST['country'] ?? null,
            'city' => $_POST['city'] ?? null,
            'street' => $_POST['street'] ?? null,
            'phone' => $_POST['phone'] ?? null,
            'photo' => $filenamenew ?? null,
            'partner_id' => $_POST['partner_id']
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء تحديث البيانات";
    header("Location: /partners_edit");
    exit();
}



header("Location:". $_SERVER["HTTP_REFERER"]);
die();



