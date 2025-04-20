<?php

$heading = "update test";


use core\App ;
use core\Database;

$db = App::resolve(Database::class);




$errors = [];

// التحقق من الحقول المطلوبة

if (!isset($_POST['islamic_payment_id']) || !Validator::number($_POST['islamic_payment_id'], 1, 999999)) {
    $errors["islamic_payment_id"] = "معرّف الدفع الإسلامي غير صالح";
}

if (isset($_POST['type']) && !Validator::string($_POST['type'], 1, 255)) {
    $errors["type"] = "نوع الدفع غير صالح";
}

if (isset($_POST['count']) && !Validator::number($_POST['count'], 1, 1000000)) {
    $errors["count"] = "عدد المدفوعات غير صالح";
}

if (isset($_POST['cost']) && !Validator::number($_POST['cost'], 1, 10000000)) {
    $errors["cost"] = "قيمة المبلغ غير صالحة";
}

if (isset($_POST['paid_cost']) && !Validator::number($_POST['paid_cost'], 0, 10000000)) {
    $errors["paid_cost"] = "قيمة المبلغ المدفوع غير صالحة";
}

if (isset($_POST['name']) && !Validator::string($_POST['name'], 1, 255)) {
    $errors["name"] = "الاسم غير صالح";
}

if (isset($_POST['short_description']) && !Validator::string($_POST['short_description'], 10, 1000)) {
    $errors["short_description"] = "الوصف المختصر يجب أن يكون بين 10 إلى 1000 حرفًا";
}

if (isset($_POST['payment_date']) && !strtotime($_POST['payment_date'])) {
    $errors["payment_date"] = "تاريخ الدفع غير صالح";
}

// معالجة الأخطاء
// if (!empty($errors)) {
//     require "views/pages/islamic_payments/edit_view.php";
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
        "UPDATE islamic_payments
        SET 
            type = COALESCE(:type, type),
            count = COALESCE(:count, count),
            cost = COALESCE(:cost, cost),
            paid_cost = COALESCE(:paid_cost, paid_cost),
            name = COALESCE(:name, name),
            payment_date = COALESCE(:payment_date, payment_date),
            user_id = COALESCE(:user_id, user_id),
            short_description = COALESCE(:short_description, short_description),
            photo = COALESCE(:photo, photo)
        WHERE islamic_payment_id = :islamic_payment_id",
        [
            'type' => isset($_POST['type']) ? htmlspecialchars($_POST['type']) : null,
            'count' => isset($_POST['count']) ? filter_var($_POST['count'], FILTER_SANITIZE_NUMBER_INT) : null,
            'cost' => isset($_POST['cost']) ? filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : null,
            'paid_cost' => isset($_POST['paid_cost']) ? filter_var($_POST['paid_cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : null,
            'name' => isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null,
            'payment_date' => $_POST['payment_date'] ?? null,
            'user_id' => $_POST['user_id'] ?? null,
            'short_description' => isset($_POST['short_description']) ? htmlspecialchars($_POST['short_description']) : null,
            'photo' => $filenamenew ?? null,
            'islamic_payment_id' => $_POST['islamic_payment_id']
        ]
    );

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء تحديث البيانات";
    header("Location: /islamic_payments_edit");
    exit();
}




header("Location:". $_SERVER["HTTP_REFERER"]);
die();


