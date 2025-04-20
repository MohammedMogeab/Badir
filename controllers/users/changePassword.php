<?php

use core\App;
use core\Database;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$config = require 'config.php';

// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
//     die("uuuu");
// }

$verification_code = rand(100000, 999999);
$_SESSION['code_expiry'] = time() + 300;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
  $new_password = $_POST['new_password'] ?? '';
  $confirm_password = $_POST['confirm_password'] ?? '';

  $_SESSION['user_email'] = $email;
  $_SESSION['new_password'] = $new_password;
  $_SESSION['confirm_password'] = $confirm_password;

  // التحقق من صحة البيانات
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location:/users_changePassword_view?error=" . urlencode("البريد الإلكتروني غير صالح"));
    exit();
  }

  if (strlen($new_password) < 6) {
    header("Location:/users_changePassword_view?error=" . urlencode("كلمة المرور قصيرة جداً"));
    exit();
  }

  if ($new_password !== $confirm_password) {
    header("Location:/users_changePassword_view?error=" . urlencode("كلمتا المرور غير متطابقتين"));
    exit();
  }

  $db = App::resolve(Database::class);
  $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();

  if (!$user) {
    header("Location:/users_changePassword_view?error=" . urlencode("هذا البريد غير مسجل"));
    exit();
  }else
  {
    $updatePassword = $db->query("UPDATE USERS SET password= :new_password WHERE email = :email",
                            [
                                'new_password' => isset($_POST['new_password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null,
                                'email' => $_POST['email']
                            ]
                        );

  }

  $_SESSION['verification_code'] = $verification_code;

  
  sendEmail($config, $email, $verification_code);
}

// دالة الإرسال
function sendEmail($config, $email, $code)
{
  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $config['phpmailer']['mail_host'];
    $mail->Port = $config['phpmailer']['mail_port'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = $config['phpmailer']['mail_username'];
    $mail->Password = $config['phpmailer']['mail_password'];
    $mail->setFrom($config['phpmailer']['mail_from'], "Badir Charity");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = "رمز التحقق لتغيير كلمة المرور";
    $mail->Body = "
      <div style='font-family: Arial; padding: 20px;'>
        <h3>مرحباً بك،</h3>
        <p>لقد طلبت تغيير كلمة المرور لحسابك. رمز التحقق هو:</p>
        <div style='font-size: 20px; color: #00A7B5; margin: 10px 0;'>$code</div>
        <p>يرجى إدخاله خلال 5 دقائق.</p>
        <p>إذا لم تطلب ذلك، يرجى تجاهل الرسالة.</p>
      </div>
    ";
    $mail->send();

    header("Location: /users_verification?sent=1");
    exit();
  } catch (Exception $e) {
    die("فشل الإرسال: " . $mail->ErrorInfo);
  }
}




// $email;
// $new_password;
// $confirm_password;

// try {
//     if (isset($_POST['btn_chang_password'])) {
//         $users = $db->query("SELECT * FROM USERS WHERE email= :email", ['email' => $_POST['email']])->fetchAll();
//         if ($users) {
//             $email = $_POST['email'];
//             $new_password = $_POST['new_password'];
//             $confirm_password = $_POST['confirm_password'];

//             if ($new_password === $confirm_password) {
//                 $updatePassword = $db->query(
//                     "UPDATE USERS SET password= :new_password WHERE email = :email",
//                     [
//                         'new_password' => isset($_POST['new_password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null,
//                         'email' => $_POST['email']
//                     ]
//                 );
//                 if ($updatePassword) {
//                     die("تم بنجاح عملية التعديل");
//                 } else {
//                     die("لم يتم ");
//                 }
//             } else {
//                 //$_SESSION['error'] = "كلمة المرور غير مطابقة ";
//                 die("كلمة المرور غير متطابقة");
//             }
//         }
//     } else {
//         // $_SESSION['error'] = "البريد الالكتنروني غير موجود";
//         // header("Location: /users_create");
//         echo "<br><br><br><br><br><br><br><br>" . "<pre>";
//         print_r($users);
//         echo "</pre>";
//         die("لا يوجد مستخدم بهذا الاسم ");
//     }
// } catch (PDOException $e) {
//     error_log($e->getMessage());
//     $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
//     header("Location: /charity_campaigns_create");
//     exit();
// }
// require "views/pages/users/chanagePassword_view.php";
?>
