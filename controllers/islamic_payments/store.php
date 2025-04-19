<?php
$heading = "Create test";



use core\App ;
use core\Database;

$db = App::resolve(Database::class);




$errors = [];

if (!isset($_POST['type']) || !Validator::string($_POST['type'] ?? '', 1, 255)) {
    $errors["type"] = "يجب اختيار نوع الدفع بشكل صحيح";
}

if (!isset($_POST['name']) || !Validator::string($_POST['name'] ?? '', 1, 255)) {
    $errors["name"] = "الاسم يجب أن يكون بين 1 و255 حرفًا";
}

if (!isset($_POST['short_description']) || !Validator::string($_POST['short_description'] ?? '', 10, 1000)) {
    $errors["short_description"] = "الوصف المختصر يجب أن يكون بين 10 إلى 1000 حرفًا";
}

if (!Validator::number($_POST['cost'] ?? 0, 1, 10000000)) {
    $errors["cost"] = "قيمة المبلغ غير صالحة";
}

if (!Validator::number($_POST['paid_cost'] ?? 0, 0, 10000000)) {
    $errors["paid_cost"] = "قيمة المبلغ المدفوع غير صالحة";
}

if (isset($_POST['payment_date']) && !strtotime($_POST['payment_date'])) {
    $errors["payment_date"] = "تاريخ الدفع غير صالح";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location:". $_SERVER["HTTP_REFERER"]);
    exit();
}

try {
    require('controllers/parts/image_loader.php') ;
    $db->query(
        "INSERT INTO islamic_payments (
            type,
            cost,
            paid_cost,
            payment_date,
            user_id,
            photo,
            name,
            short_description
        ) VALUES (
            :type,
            :cost,
            :paid_cost,
            :payment_date,
            :user_id,
            :photo,
            :name,
            :short_description
        )",
        [
            'type' => htmlspecialchars($_POST['type']),
            'cost' => filter_var($_POST['cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'paid_cost' => filter_var($_POST['paid_cost'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'payment_date' => $_POST['payment_date'] ?? date('Y-m-d H:i:s'), // Default to current timestamp
            'user_id' => $_POST['user_id'] ?? 1,
            'photo' => $filenamenew ,
            'name' => $_POST['name'], 
            'short_description' => $_POST['short_description']  

        ]
    );
      
    }catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['error'] = "حدث خطأ أثناء حفظ البعانات";
        header("Location: /charity_projects_create");
        exit();
    }
    

header("Location: " . $_SERVER["HTTP_REFERER"]);
die();

