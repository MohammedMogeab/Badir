<?php
$heading = "Create test";

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];

if (isset($_POST["submit"])) {

    $file = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $size = $_FILES['photo']['size'];
    $type = $_FILES['photo']['type'];
    $error = $_FILES['photo']['error'];
    $fileExt = explode('.', $file);
    $fileActual = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActual, $allow)) {
        if ($error === 0) {
            if ($size < 10000000) {
                $filenamenew = uniqid('', true) . "." . $fileActual;
                $fileDestination = __DIR__ . '/../../views/media/images/' . $filenamenew;

                echo $fileDestination;
                move_uploaded_file($tmp, $fileDestination);
            } else {
                echo "your file is too big";
            }
        } else {
            echo "there was an error uploading your file";
        }
    } else {
        echo "you are not allow to uplaod file";
    }
} else {
    echo "error";
}

//if (!(Validator::string($_POST['name'], 1, 255))) {
//    $errors["name"] = "Titel  is too short or too long";
//}
// if (!(Validator::string($_POST['body'], 1, 1000))) {
//     $errors["titel"] = " body is too short or long";
// }


// if (! empty($errors)) {

//     require "views/pages/charity_projects/create_view.php";
//     die();
// }


// $db->query("INSERT INTO charity_projects (name) VALUES (:name)", [
//     'name' => $_POST['name'],
// ]);


// استقبال البيانات المطابقة لقاعدة البيانات 
// $category_id = $_POST['category_id'];
// $partner_id = $_POST['partner_id'];
// $name = $_POST['name'];
// $short_description = $_POST['short_description'];
// $full_description = $_POST['full_description'];
// $cost = $_POST['cost'];
//  $bankName = $_POST['bankName']; 
//  $accountType = $_POST['accountType']; 


 // التحقق من الحقول المطلوبة

// if (!isset($_POST['category_id']) || !Validator::string($_POST['category_id'] ?? '', 1, 255)) {
//     $errors["category_id"] = " يجب اختيار تصنيف صحيح للحملة";
// }
// if (!isset($_POST['name']) || !Validator::string($_POST['name'] ?? '', 1, 255)) {
//     $errors["name"] = "الاسم يجب ان يكون بين  1 او 255 حرفا";
// }
// if (!isset($_POST['age']) || !(Validator::number($_POST['age'] ?? '', 1, 100))) {
//    $errors["age"] = "العمر غير صالح ";
// }
// if (!isset($_POST['partner_id']) || !Validator::string($_POST['partner_id'] ?? '', 1, 1000)) {
//     $errors["partner_id"] = " يجب اختيار شريك صحيح ";
// }
// if (!isset($_POST['state']) || !Validator::string($_POST['state'] ?? '', 1, 225)) {
//     $errors["state "] = "الحالة  غير صالح ";
// }
// if (!isset($_POST['short_description']) || !Validator::string($_POST['short_description'] ?? '',10, 1000)) {
//     $errors["short_description"] = "  الوصف المختصر يجب ان يكون بين 10الى 1000 حرفا";
// }
// if (!isset($_POST['full_description']) || !Validator::string($_POST['full_description'] ?? '', 30, 1000)) {
//     $errors["full_description"] = "لوصف المختصر يجب ان يكون بين 10الى 1000 حرفا";
// }
// if (!Validator::number($_POST['cost'] ?? 0, 1, 10000000)) {
//     $errors["name"] = " المبلغ غير صالح ";
// }
//  // معالجة الأخطاء
//  if (!empty($errors)) {
//     $_SESSION['errors'] = $errors;
//     $_SESSION['old'] = $_POST;
//     header('Location: /charity_campaigns/create');
//     exit();
// }

try {
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
            street
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
            :street
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
            'street' => htmlspecialchars($_POST['street'])
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
