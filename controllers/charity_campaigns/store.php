<?php
$heading = "Create test";



use core\App ;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];

//if (!(Validator::string($_POST['name'], 1, 255))) {
  //  $errors["name"] = "Titel  is too short or too long";
//}
// if (!(Validator::string($_POST['body'], 1, 1000))) {
//     $errors["titel"] = " body is too short or long";
// }


if (! empty($errors)) {
    require "views/pages/charity_campaigns/create_view.php";
    die();
}


$campaign_id = $db->query
  ("INSERT INTO campaigns (category_id, partner_id, campaign_request_id, name, short_description, full_description, cost, state, start_at, end_at)
  VALUES (:category_id, :partner_id, :campaign_request_id, :name, :short_description, :full_description, :cost, :state ,now(), :end_at) RETURNING campaign_id",
  [
      'category_id' => $_POST['category_id'],
      'partner_id' => $_POST['partner_id'],
      'campaign_request_id' => $_POST['campaign_request_id'],
      'name' => $_POST['name'],
      'short_description' => $_POST['short_description'],
      'full_description' => $_POST['full_description'],
      'cost' => $_POST['cost'],
      'state' => $_POST['state'],
      'end_at' => $_POST['end_at'],
  ])->getGeneratedKey('campaign_id');

  // استقبال البيانات المطابقة لقاعدة البيانات 

$category_id = $_POST['category_id'];
$partner_id = $_POST['partner_id'];
$campaign_request_id =$_POST['campaign_request_id'];
$name = $_POST['name'];
$short_description = $_POST['short_description'];
$full_description = $_POST['full_description'];
$cost = $_POST['cost'];
$state = $_POST['state'];
$end_at = $_POST['end_at'];


  // استقبال البيانات من النموذج

 $caseType = $_POST['caseType'];
 $age = $_POST ['age']; 
 $circumstances = $_POST['circumstances'];
 $amount = $_POST['amount'];
 $accountNumber = $_POST['accountNumber']; 
 $bankName = $_POST['bankName']; 
$accountType = $_POST['accountType']; 

$documents = $_POST['documents']; 
$idFont = $_POST['idFont']; 
$idback = $_POST['idback']; 

// التحقق من الحقول المطلوبة

if (!isset($_POST['caseType']) || !Validator::string($_POST['caseType'] ?? '',1 ,255)){
    $errors["caseType"] = "نوع الحالة غير صالحة";
 }
 
 if (!isset($_POST['name']) || !Validator::string($_POST['name'] ?? '',1 ,255)){
 $errors["name"] = "الاسم يجب ان يكون بين  1 او 255 حرفا";
 }

 if (!isset($_POST['age']) || !(Validator::number($_POST['age']?? '', -1, 100 ))){
    $errors["age"] = "العمر غير صالح ";
 }
  
if (!isset($_POST['circumstances']) || !Validator::string($_POST['circumstances'] ?? '',1 ,1000)){
    $errors["circumstances"] = "الظروف غير صالح";
}  
if (!isset($_POST['accountNumber']) || !Validator::string($_POST['accountNumber'] ?? '',1 ,225)){
  $errors["accountNumber "] = "االحساب غير صالح ";
}
if (!isset($_POST['bankName']) || !Validator::string($_POST['bankName'] ?? '',1 ,1000)){
  $errors["bankName"] = "  اسم البنك غير صالح";
} 
if (!isset($_POST['accountType']) || !Validator::string($_POST['accountType'] ?? '',1 ,1000)){
    $errors["ciraccountTypecumstances"] = "  نوع الحساب غير صالح";
 }
 if (!Validator::number($_POST['cost'] ?? 0, 1 , 10000000)){
    $errors["name"] = " المبلغ غير صالح ";
 }


 if (!Validator::number($_POST['cost'] ?? 0, 1 , 10000000)){
    $errors["name"] = " المبلغ غير صالح ";
 }

 // معالجة الأخطاء
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header('Location: /charity_campaigns/create');
    exit();
}

 //  معالجة الملفات المرفوعة
$uploadDir = __DIR__ . 'views\media\images';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// معالجة المستندات الداعمة
$documents = [];
foreach ($_FILES['documents']['tmp_name'] as $key => $tmpName) {
    $fileName = basename($_FILES['documents']['name'][$key]);
    move_uploaded_file($tmpName, $uploadDir . $fileName);
    $documents[] = $fileName;
}

// معالجة صور البطاقة
$idFront = basename($_FILES['idFront']['name']);
move_uploaded_file($_FILES['idFront']['tmp_name'], $uploadDir . $idFront);

$idBack = basename($_FILES['idBack']['name']);
move_uploaded_file($_FILES['idBack']['tmp_name'], $uploadDir . $idBack);


// حفظ صور البطاقة
// $idFrontName = uniqid() . '_' . basename($_FILES['idFront']['name']);
// move_uploaded_file($_FILES['idFront']['tmp_name'], $uploadPath . $idFrontName);
// 
// $idBackName = uniqid() . '_' . basename($_FILES['idBack']['name']);
// move_uploaded_file($_FILES['idBack']['tmp_name'], $uploadPath . $idBackName);
 

$allowedTypes = ['image/jpeg', 'application/pdf'];
if (!in_array($_FILES['idFront']['type'], $allowedTypes)) {
    $errors['idFront'] = 'نوع الملف غير مسموح به';
}

if ($_FILES['idFront']['size'] > 2 * 1024 * 1024) {
    $errors['idFront'] = 'حجم الملف يتجاوز 2MB';
}

$accountNumber = openssl_encrypt(
    $_POST['accountNumber'],
    'AES-256-CBC',
    'your-encryption-key'
);

// إدخال البيانات في قاعدة البيانات
try {
    $db->query(
        "INSERT INTO campaigns (
            category_id,
            partner_id,
            name,
            full_description,
            cost,
            state,
            bank_account,
            identity_documents,
            age,
            case_type,
            id_front,
            id_back
        ) VALUES (
            :category_id,
            :partner_id,
            :name,
            :full_description,
            :cost,
            :state,
            :bank_account,
            :identity_documents,
            :age,
            :case_type,
            :id_front,
            :id_back
        )",
        [
            'category_id' => $_POST['category_id'],
            'partner_id' => $_POST['partner_id'],
            'name' => htmlspecialchars($_POST['fullName']),
            'full_description' => htmlspecialchars($_POST['circumstances']),
            'cost' => filter_var($_POST['amount'], FILTER_SANITIZE_NUMBER_INT),
            'state' => $_POST['state'],
            'bank_account' => encryptData($_POST['accountNumber']), // دالة تشفير مخصصة
            'identity_documents' => json_encode($documentPaths),
            'age' => filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT),
            'case_type' => htmlspecialchars($_POST['caseType']),
            'id_front' => $idFrontName,
            'id_back' => $idBackName
        ]
    );
    
    $_SESSION['success'] = "تم تقديم الطلب بنجاح";
    header('Location: /charity_campaigns');
    exit();

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
    header('Location: /charity_campaigns/create');
    exit();
}
// دالة مساعدة للتشفير
function encryptData($data) {
    return openssl_encrypt(
        $data,
        'AES-256-CBC',
        'your-secret-key',
        0,
        'your-iv-vector'
    );
}

//  إذا كان هناك أخطاء، عرضها
if (!empty($errors)) {
    require "views/pages/charity_campaigns/create_view.php";
    die();
}


















// تحقق من صحة الملفات
// $allowedImageTypes = ['image/jpeg', 'image/png'];
// $maxFileSize = 2 * 1024 * 1024; // 2MB

// تحقق من ملفات المستندات
//  if (count($_FILES['documents']['name']) > 5) {
    //  $errors['documents'] = "الحد الأقصى 5 مستندات";
//  }
//  
//  foreach ($_FILES['documents']['tmp_name'] as $index => $tmpName) {
    //  if ($_FILES['documents']['size'][$index] > $maxFileSize) {
        //  $errors['documents'] = "حجم الملف يتجاوز 2MB";
    //  }
//  }
//  
// تحقق من صور البطاقة
// foreach (['idFront', 'idBack'] as $fileInput) {
    // if (!in_array($_FILES[$fileInput]['type'], $allowedImageTypes)) {
        // $errors[$fileInput] = "نوع الملف غير مدعوم (JPEG/PNG فقط)";
    // }
// }
