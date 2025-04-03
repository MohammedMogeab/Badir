<?php
$heading = "Create test";




// $db->query("INSERT INTO charity_campaigns (name) VALUES (':item')", [
//     'item' => $_POST['item'],
//   ]);
// $campaign_id = $db->query
//   ("INSERT INTO campaigns (category_id, partner_id, campaign_request_id, name, short_description, full_description, cost, state, start_at, end_at)
//   VALUES (:category_id, :partner_id, :campaign_request_id, :name, :short_description, :full_description, :cost, :state, now(), :end_at) RETURNING campaign_id",
//   [
//       'category_id' => $_POST['category_id'],
//       'partner_id' => $_POST['partner_id'],
//       'campaign_request_id' => $_POST['campaign_request_id'],
//       'name' => $_POST['name'],
//       'short_description' => $_POST['short_description'],
//       'full_description' => $_POST['full_description'],
//       'cost' => $_POST['cost'],
//       'state' => $_POST['state'],
//       'end_at' => $_POST['end_at'],
//   ])->getGeneratedKey('campaign_id');

  
// 
//   function validateInput($data) {
// $errors = [];
// 
    // التحقق من البريد الإلكتروني
    // if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        // $errors['email'] = "البريد الإلكتروني غير صحيح";
    // }
// 
    // التحقق من كلمة المرور
    // if (empty($data['password']) || strlen($data['password']) < 8) {
        // $errors['password'] = "كلمة المرور يجب أن تكون 8 أحرف على الأقل";
    // }
// 
    // return $errors;
// } 
// 
// 3. دالة التحقق من صلاحيات المستخدم
// function hasPermission($requiredRole) {
//   if (isset($_SESSION['user']) && $_SESSION['user']['role'] === $requiredRole) {
    //   return true;
//   }
//   return false;
// }
// 
// 4. دالة حماية الصفحات
// function protectPage() {
//   if (!isset($_SESSION['user']) || !$_SESSION['user']['logged_in']) {
    //   header('Location: login.php');
    //   exit();
//   }
// }
// 
// 5. دالة إنشاء الحملة مع التحقق من الصلاحيات
// function createCampaign($db, $data) {
//   التحقق من تسجيل الدخول
//   protectPage();
// 
//   التحقق من الصلاحية (فقط الشركاء أو المديرين يمكنهم إنشاء حملات)
//   if (!hasPermission('partner') && !hasPermission('admin')) {
    //   die("ليس لديك صلاحية لإنشاء حملة");
//   }
// 
//   إدخال الحملة في قاعدة البيانات
//   $campaign_id = $db->query(
    //   "INSERT INTO campaigns (category_id, partner_id, campaign_request_id, name, short_description, full_description, cost, state, start_at, end_at)
   //   VALUES (:category_id, :partner_id, :campaign_request_id, :name, :short_description, :full_description, :cost, :state, now(), :end_at) RETURNING campaign_id",
    //   [
        //   'category_id' => $data['category_id'],
        //   'partner_id' => $data['partner_id'],
        //   'campaign_request_id' => $data['campaign_request_id'],
        //   'name' => $data['name'],
        //   'short_description' => $data['short_description'],
        //   'full_description' => $data['full_description'],
        //   'cost' => $data['cost'],
        //   'state' => $data['state'],
        //   'end_at' => $data['end_at'],
    //   ]
//   )->getGeneratedKey('campaign_id');
// 
//   return $campaign_id;
// }
// 
//6. معالجة طلب إنشاء الحملة
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 // التحقق من صحة البيانات المدخلة
//   $errors = validateInput($_POST);
//   if (empty($errors)) {
    //  إنشاء الحملة
    //   $campaign_id = createCampaign($db, $_POST);
    //   if ($campaign_id) {
        //   echo "تم إنشاء الحملة بنجاح!";
    //   } else {
        //   echo "حدث خطأ أثناء إنشاء الحملة";
    //   }
//   } else {
     // عرض الأخطاء
    //   foreach ($errors as $error) {
        //   echo $error . "<br>";
    //   }
//   }
// }
// 
// 
// 
// 

require "views/pages/charity_campaigns/create_view.php";
