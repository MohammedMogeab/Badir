<?php
$heading = "Create test";

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];


// . التحقق من تصنيف الحملة
if (empty($_POST['category_id'])) {
    $errors['category_id'] = "حقل التصنيف مطلوب";
} elseif (!Validator::number($_POST['category_id']?? '', 1, 255)) {
    $errors['category_id'] = "يجب اختيار تصنيف صحيح من القائمة";

}
// . التحقق من الشريك
if (empty($_POST['partner_id'])) {
    $errors['partner_id'] = "حقل الشريك مطلوب";
} elseif (!Validator::number($_POST['partner_id'] ?? '', 1, 1000)) {
    $errors['partner_id'] = "يجب اختيار شريك صحيح من القائمة";
}

// . التحقق من اسم الحملة
if (empty($_POST['name'])) {
    $errors['name'] = "حقل اسم الحملة مطلوب";
} elseif (!Validator::string($_POST['name'] ?? '', 3, 255)) {
    $errors['name'] = "يجب أن يكون اسم الحملة بين 3 إلى 255 حرفاً";
}
// . التحقق من الوصف المختصر
if (empty($_POST['short_description'])) {
    $errors['short_description'] = "حقل الوصف المختصر مطلوب";
} elseif (!Validator::string($_POST['short_description'] ?? '', 20, 1000)) {
    $errors['short_description'] = "يجب أن يكون الوصف المختصر بين 20 إلى 1000 حرفاً";
}

// . التحقق من الوصف الكامل
if (empty($_POST['full_description'])) {
    $errors['full_description'] = "حقل الوصف الكامل مطلوب";
} elseif (!(Validator::string($_POST['full_description'] ?? '', 50, 5000))) {
    $errors['full_description'] = "يجب أن يكون الوصف الكامل بين 50 إلى 5000 حرفاً";
}
// و. التحقق من التكلفة

if (empty($_POST['cost'])) {
    $errors['cost'] = "حقل التكلفة مطلوب";
} elseif (!(Validator::number($_POST['cost'] ?? 0, 1, 10000000))) {
    $errors['cost'] = "يجب أن تكون التكلفة بين 1 إلى 10,000,000";
}


// ط. التحقق من الصورة (إذا تم إدخالها)
// if (empty($filenamenew)) {
//     $errors['photo'] = "رابط الصورة غير صالح. يجب أن يكون رابطاً صحيحاً";
// }
//dd($errors);
// إذا كان هناك أخطاء، عرضها
// if (!empty($errors)) {
//     require "views/pages/charity_campaigns/edit_view.php";
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
        "UPDATE campaigns
        SET 
            category_id = COALESCE(:category_id, category_id),
            partner_id = COALESCE(:partner_id, partner_id),
            name = COALESCE(:name, name),
            short_description = COALESCE(:short_description, short_description),
            full_description = COALESCE(:full_description, full_description),
            cost = COALESCE(:cost, cost),
            state = COALESCE(:state, state),
            start_at = COALESCE(:start_at, start_at),
            stop_at = COALESCE(:stop_at, stop_at),
            end_at = COALESCE(:end_at, end_at),
            photo = COALESCE(:photo, photo)
        WHERE campaign_id = :campaign_id",
        [
            'category_id' => $_POST['category_id'] ?? null,
            'partner_id' => $_POST['partner_id'] ?? null,
            'name' => isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null,
            'short_description' => isset($_POST['short_description']) ? htmlspecialchars($_POST['short_description']) : null,
            'full_description' => isset($_POST['full_description']) ? htmlspecialchars($_POST['full_description']) : null,
            'cost' => isset($_POST['cost']) ? filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : null,
            'state' => $_POST['state'] ?? null,
            'start_at' => $_POST['start_at'] ?? null,
            'stop_at' => $_POST['stop_at'] ?? null,
            'end_at' => $_POST['end_at'] ?? null,
            'photo' => $filenamenew ?? null,
            'campaign_id' => $_POST['campaign_id']
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}



header("Location:". $_SERVER["HTTP_REFERER"]);
die();