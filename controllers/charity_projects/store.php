<?php
$heading = "Create test";

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];


// التحقق من الحقول المطلوبة

if (!isset($_POST['category_id']) || !Validator::string($_POST['category_id'] ?? '', 1, 255)) {
    $errors["category_id"] = " يجب اختيار تصنيف صحيح للحملة";
}
if (!isset($_POST['name']) || !Validator::string($_POST['name'] ?? '', 1, 255)) {
    $errors["name"] = "الاسم يجب ان يكون بين  1 او 255 حرفا";
}
if (!isset($_POST['age']) || !(Validator::number($_POST['age'] ?? '', 1, 100))) {
   $errors["age"] = "العمر غير صالح ";
}
if (!isset($_POST['partner_id']) || !Validator::string($_POST['partner_id'] ?? '', 1, 1000)) {
    $errors["partner_id"] = " يجب اختيار شريك صحيح ";
}
if (!isset($_POST['state']) || !Validator::string($_POST['state'] ?? '', 1, 225)) {
    $errors["state "] = "الحالة  غير صالح ";
}
if (!isset($_POST['short_description']) || !Validator::string($_POST['short_description'] ?? '',10, 1000)) {
    $errors["short_description"] = "  الوصف المختصر يجب ان يكون بين 10الى 1000 حرفا";
}
if (!isset($_POST['full_description']) || !Validator::string($_POST['full_description'] ?? '', 30, 1000)) {
    $errors["full_description"] = "لوصف المختصر يجب ان يكون بين 10الى 1000 حرفا";
}
if (!Validator::number($_POST['cost'] ?? 0, 1, 10000000)) {
    $errors["name"] = " المبلغ غير صالح ";
}
 // معالجة الأخطاء
//  if (!empty($errors)) {
//     require "views/pages/charity_projects/create_view.php";
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
        "INSERT INTO projects (
            partner_id,
            category_id,
            name,
            photo,
            short_description,
            full_description,
            cost,
            country,
            city,
            street,
            beneficiaries_count,
            level,
            type
        ) VALUES (
            :partner_id,
            :category_id,
            :name,
            :photo,
            :short_description,
            :full_description,
            :cost,
            :country,
            :city,
            :street,
            :beneficiaries_count,
            :level,
            :type
        )",
        [
            'partner_id' => $_POST['partner_id'],
            'category_id' => $_POST['category_id'],
            'name' => htmlspecialchars($_POST['name']),
            'photo' => $filenamenew,
            'short_description' => htmlspecialchars($_POST['short_description']),
            'full_description' => htmlspecialchars($_POST['full_description']),
            'cost' => filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'country' => htmlspecialchars($_POST['country']),
            'city' => htmlspecialchars($_POST['city']),
            'street' => htmlspecialchars($_POST['street']),
            'beneficiaries_count' => filter_var($_POST['beneficiaries_count'], FILTER_SANITIZE_NUMBER_INT),
            'level' => filter_var($_POST['level'], FILTER_SANITIZE_NUMBER_INT),
            'type' => $_POST['type']
        ]
    );
    $levels = json_decode($_POST['levels'], true);
    if (json_last_error() === JSON_ERROR_NONE) {
        $project_id = $db->lastId();
        for ($i = 0; $i < count($levels); $i++) {
            $db->query("insert into levels (level_id, project_id, name) values(:level_id, :project_id , :name)", [
                'level_id' => $i,
                'project_id' => $project_id,
                'name' => $levels[$i]
            ]);
        }
    } else {
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
die();
