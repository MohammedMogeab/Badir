<?php


use core\Validator;
use core\Authenticator;
use core\App;
use core\Database;
use phpDocumentor\Reflection\Location;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$config = require 'config.php'; 

$heading = "Create test";


$address = htmlspecialchars($_POST['address'] ?? '');
$message = htmlspecialchars($_POST['descripe_problem'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);


$db = App::resolve(Database::class);

// if (isset($_POST["submit"])) {
  $_SESSION['user_data'] = $_POST;
  $_SESSION['file'] = $_FILES['photo'] ;
//   // التحقق من رفع الصورة
//   if (!isset($_FILES['photo'])) {
//     $_SESSION['error'] = "لم يتم تحميل الصورة.";
//     header("Location: /");
//     exit();
//   }
//   else {
//   $file = $_FILES['photo']['name'];
//   $tmp = $_FILES['photo']['tmp_name'];
//   $size = $_FILES['photo']['size'];
//   $type = $_FILES['photo']['type'];
//   $error = $_FILES['photo']['error'];

//   $fileExt = explode('.', $file);
//   $fileActual = strtolower(end($fileExt));
//   $allowed = array('jpg', 'jpeg', 'png', 'pdf');

//   if (in_array($fileActual, $allowed)) {
//     if ($error === 0) {
//       if ($size < 10000000) {
//         $filenamenew = uniqid('', true) . "." . $fileActual;
//         $fileDestination = __DIR__ . '/../../views/media/images/' . $filenamenew;

//         if (move_uploaded_file($tmp, $fileDestination)) {

//           // الملف تم نقله بنجاح
//           $_SESSION['photo'] = $filenamenew; // حفظ اسم الملف في الجلسة

//         } else {
//           $_SESSION['error'] = "حدث خطأ أثناء نقل الملف.";
//           header("Location: /");
//           exit();
//         }
//       } else {
//         $_SESSION['error'] = "حجم الملف كبير جدًا.";
//         header("Location: /");
//         exit();
//       }
//     } else {
//       $_SESSION['error'] = "حدث خطأ أثناء تحميل الملف.";
//       header("Location: /");
//       exit();
//     }
//   } else {
//     $_SESSION['error'] = "نوع الملف غير مدعوم. الرجاء رفع صورة بصيغة (jpg, jpeg, png, pdf)";
//     header("Location: /");
//     exit();
//   }
// }
// }

// $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();

// if ($user) {
//   $error = urlencode("البريد الإلكتروني مسجل بالفعل");
//   header("Location:/users_create_view?error={$error}");
//   exit();
// }

try {
  // إنشاء كود التحقق
  $verification_code = rand(100000, 999999);
  $_SESSION['verification_code'] = $verification_code;
  $_SESSION['code_expiry'] = time() + 300; // انتهاء الكود بعد 5 دقائق مثلًا

  $mail = new PHPMailer(true);

  // إعدادات الإرسال
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = $config['phpmailer']['mail_host'];
  $mail->Port = $config['phpmailer']['mail_port'];
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Username = $config['phpmailer']['mail_username'];
  $mail->Password = $config['phpmailer']['mail_password'];
  $fromemail = $config['phpmailer']['mail_from'];

  $mail->setFrom($fromemail, "Badir Charity");
  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->Subject = "تفعيل حسابك في منصة بادر";

  $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; }
                .email-container { background: #fff; padding: 20px; max-width: 600px; margin: auto; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
                .email-header img { max-width: 150px; }
                .email-footer { text-align: center; font-size: 12px; color: #777; margin-top: 20px; }
            </style>
        </head>
        <body>
        <div class='email-container'>
            <div class='email-header'>
                <img src='https://i.postimg.cc/prkHm9JK/badir-logo.jpg' alt='Badir Charity Logo'>
                <h3>رسالة جديدة من بادر الخيرية</h3>
            </div>
            <div class='email-content'>
                <p><strong>العنوان:</strong> {$address}</p>
                <p><strong>الرسالة:</strong><br>" . nl2br($message) . "</p>
                <hr>
                <p>رمز التحقق الخاص بك هو: <strong>{$verification_code}</strong></p>
            </div>
            <div class='email-footer'>
                <p>&copy; " . date('Y') . " Badir Charity</p>
            </div>
        </div>
        </body>
        </html>
    ";

  if ($mail->send()) {
    $_SESSION['success'] = "تم إرسال الكود بنجاح، تحقق من بريدك.";
    header("Location: /users_verification_view");
    exit();
  } else {
    die("فشل في إرسال البريد: " . $mail->ErrorInfo);
  }
} catch (Exception $e) {
  die("خطأ في الإرسال: " . $e->getMessage());
} catch (PDOException $e) {
  die("حدث خطأ أثناء الحفظ: " . $e->getMessage());
}

