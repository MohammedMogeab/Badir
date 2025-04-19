<?php
$heading = "Create test";

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$errors = [];



// التحقق من الحقول المطلوبة
if (!isset($_POST['name']) || !Validator::string($_POST['name'] ?? '', 1, 255)) {
    $errors["name"] = "الاسم يجب ان يكون بين  1 او 255 حرفا";
}

if (!isset($_POST['city']) || !Validator::string($_POST['city'] ?? '', 1, 255)) {
    $errors["city"] = "المدينة يجب ان يكون بين  1 او 255 حرفا";
}

if (!isset($_POST['email']) || !Validator::email($_POST['email'])) {
    $errors["email"] = "البريد الالكتروني غير صالح ";
}

if (!isset($_POST['description']) || !Validator::string($_POST['description'] ?? '', 1, 1000)) {
    $errors["description"] = "الوصف يجب ان يكون بين  1 او 1000 حرفا";
}

if (!isset($_POST['more_information']) || !Validator::string($_POST['more_information'] ?? '', 1, 1000)) {
    $errors["more_information"] = "بيانات التواصل الاضافية  يجب ان يكون بين  1 او 1000 حرفا";
}

if (!isset($_POST['directorate']) || !Validator::string($_POST['directorate'], 1, 255)) {
    $errors["directorate"] = "المديرية يجب أن تكون بين 1 و 255 حرفًا";
}
if (!isset($_POST['street']) || !Validator::string($_POST['street'], 1, 255)) {
    $errors["street"] = "الشارع يجب أن يكون بين 1 و 255 حرفًا";
}

if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    $errors["photo"] = "يجب تحميل شعار صالح";
}

if (!isset($_POST['country']) || !Validator::string($_POST['country'], 1, 255)) {
    $errors["country"] = "الدولة يجب أن تكون بين 1 و 255 حرفًا";
}

// if (!isset($_POST['phone']) || !Validator::string($_POST['phone'], 1, 255)) {
//     $errors["phone"] = "رقم الهاتف يجب أن يكون بين 1 و 255 حرفًا";
// }

if (!isset($_POST['street']) || !Validator::string($_POST['street'], 1, 255)) {
    $errors["street"] = "الشارع يجب أن يكون بين 1 و 255 حرفًا";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location:". $_SERVER["HTTP_REFERER"]);
    exit();
}


try {
    require('controllers/parts/image_loader.php') ;
    $db->query(
        "INSERT INTO partners (
            name,
            description,
            more_information,
            email,
            directorate,
            country,
            city,
            street,
            phone,
            photo
        ) VALUES (
            :name,
            :description,
            :more_information,
            :email,
            :directorate,
            :country,
            :city,
            :street,
            :phone,
            :photo
        )",
        [
            'name' => htmlspecialchars($_POST['name']),
            'description' => htmlspecialchars($_POST['description']),
            'more_information' => htmlspecialchars($_POST['more_information']),
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'directorate' => htmlspecialchars($_POST['directorate']),
            'country' => htmlspecialchars($_POST['country']),
            'city' => htmlspecialchars($_POST['city']),
            'street' => htmlspecialchars($_POST['street']),
            'phone' => filter_var($_POST['phone'], FILTER_SANITIZE_STRING),
            'photo' => $filenamenew
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البعانات";
    header("Location: /charity_projects_create");
    exit();
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
die();
