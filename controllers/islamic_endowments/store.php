<?php
$heading = "Create test";



use core\App;
use core\Database;

$db = App::resolve(Database::class);




$errors = [];

if (!isset($_POST['category_id']) || !Validator::string($_POST['category_id'], 1, 255)) {
    $errors["category_id"] = "يجب اختيار تصنيف صحيح للوقف";
}

if (!isset($_POST['partner_id']) || !Validator::string($_POST['partner_id'], 1, 1000)) {
    $errors["partner_id"] = "يجب اختيار شريك صحيح";
}

if (!isset($_POST['name']) || !Validator::string($_POST['name'], 1, 255)) {
    $errors["name"] = "الاسم يجب أن يكون بين 1 و 255 حرفاً";
}

if (!isset($_POST['short_description']) || !Validator::string($_POST['short_description'], 10, 1000)) {
    $errors["short_description"] = "الوصف المختصر يجب أن يكون بين 10 و 1000 حرفاً";
}

if (!isset($_POST['full_description']) || !Validator::string($_POST['full_description'], 30, 2000)) {
    $errors["full_description"] = "الوصف الكامل يجب أن يكون بين 30 و 2000 حرفاً";
}

if (!isset($_POST['cost']) || !Validator::number($_POST['cost'], 1, 10000000)) {
    $errors["cost"] = "المبلغ غير صالح";
}



// if (!empty($errors)) {
//     require "views/pages/endowments/create_view.php"; // تأكد من صحة المسار
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
        "INSERT INTO endowments (
            category_id,
            partner_id,
            name,
            short_description,
            full_description,
            cost,
            photo
        ) VALUES (
            :category_id,
            :partner_id,
            :name,
            :short_description,
            :full_description,
            :cost,
            :photo
        )",
        [
            'category_id' => $_POST['category_id'],
            'partner_id' => $_POST['partner_id'],
            'name' => htmlspecialchars($_POST['name']),
            'short_description' => htmlspecialchars($_POST['short_description']),
            'full_description' => htmlspecialchars($_POST['full_description']),
            'cost' => filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'photo' => $filenamenew
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
die();
