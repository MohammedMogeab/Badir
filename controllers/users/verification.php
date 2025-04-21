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
$verification_code = rand(100000, 999999);
$_SESSION['verification_code'] = $verification_code;
$_SESSION['code_expiry'] = time() + 300;

$heading = "Create test";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  if (isset($_POST['submit'])) {

    $_SESSION['process_type'] = 'register';
    $verification_code = rand(100000, 999999);
    $_SESSION['verification_code'] = $verification_code;
    $_SESSION['code_expiry'] = time() + 300;

    // }

    //validate the data
    $address = htmlspecialchars($_POST['address'] ?? '');
    $message = htmlspecialchars($_POST['descripe_problem'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $_SESSION['user_email'] = $email;
    setcookie(
      'user_email',
      $email,
      [
        'expires' => time() + 3600,
        'path' => '/',
        'domain' => '', //    
        'secure' => true, // send cookie by HTTPS
        'httponly' => true, //it does not arrive to cookie by JavaScript
        'samesite' => 'Strict'
      ]
    );
    $db = App::resolve(Database::class);
    // $errors = [];

    $_SESSION['user_data'] = $_POST;
    $_SESSION['file'] = $_FILES['photo'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = urlencode("البريد الإلكتروني غير صالح");
      header("Location:/users_create_view?error={$error}");
      exit();
    }

    $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();

    if ($user) {
      $error = urlencode("البريد الإلكتروني مسجل بالفعل");
      header("Location:/users_create_view?error={$error}");
      exit();
    }

    if (sendEmail($config, $email, $message, $verification_code)) {
      header("Location: /users_verification_view");
      exit();
    }
  } elseif (isset($_POST['btn_chang_password'])) {
    // Handle the change password request
    $_SESSION['process_type'] = 'change_password';
    $verification_code = rand(100000, 999999);
    $_SESSION['verification_code'] = $verification_code;
    $_SESSION['code_expiry'] = time() + 300;
    $message = htmlspecialchars($_POST['descripe_problem'] ?? '');
    $_SESSION['change_password_data'] = $_POST;

    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = urlencode("البريد الإلكتروني غير صالح");
      header("Location:/users_changePassword_view?error={$error}");
      exit();
    }

    if (strlen($new_password) < 6) {
      $error = urlencode("كلمة المرور قصيرة جداً");
      header("Location:/users_changePassword_view?error={$error}");
      exit();
    }

    if ($new_password !== $confirm_password) {
      $error = urlencode("كلمة المرور غير متطابقة");
      header("Location:/users_changePassword_view?error={$error}");
      exit();
    }

    // Proceed with changing the password logic here
    // ... 
    $db = App::resolve(Database::class);
    $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();
    if (!$user) {
      $error = urlencode("هذا البريد غير مسجل");
      header("Location:/users_changePassword_view?error={$error}");
      exit();
    }
    if (sendEmail($config, $email, $message, $verification_code)) {
      header("Location: /users_verification_view");
      exit();
    }
  } else {
    // If the form is not submitted, redirect to the create view
    header("Location: /users_create_view");
    exit();
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

  // Check if the user is logged in and has a session
  $email = $_SESSION['user_email'] ?? $_COOKIE['user_email'] ?? '';
  $message = $_SESSION['user_data']['descripe_problem'] ?? '';
  $address = $_SESSION['user_data']['address'] ?? '';

  sendEmail($config, $email, $message, $verification_code); // send the email with the verification code
} else {
  // If the request method is not POST or GET, redirect to the create view
  error_log("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
  header("Location: /users_create_view");
  exit();
}




function sendEmail($config, $email, $message, $verification_code) // this function sends the email
{
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = urlencode("البريد الإلكتروني غير صالح أو انتهت الجلسة");
    header("Location:/users_create_view?error={$error}");
    exit();
  }

  blockUser();

  $mail = new PHPMailer(true);

  try {

    // srvice provider which sends the email 
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
    $mail->CharSet = 'UTF-8'; //UTF-8
    $mail->Body = "
  <html>
  <head>
      <title>رسالة من بادر الخيرية</title>
      <style>
          body {
              font-family: 'Arial', sans-serif;
              background-color: #f9f9f9;
              margin: 0;
              padding: 0;
          }
  
            .email-container {
              background: #ffffff;
              padding: 30px;
              max-width: 600px;
              margin: 20px auto;
              border-radius: 10px;
              box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
              border-top: 5px solid #00A7B5;
            }
  
          .email-header {
              text-align: center;
              margin-bottom: 20px;
          }
  
          .email-header img {
              max-width: 140px;
              margin-bottom: 10px;
          }
  
          .email-header h3 {
              color: #00A7B5;
              font-size: 24px;
              margin: 0;
          }
  
          .email-content {
              font-size: 16px;
              line-height: 1.7;
              color: #333;
              margin-bottom: 20px;
          }
  
          .email-content p {
              margin: 12px 0;
              text-align: right;
          }
  
          .email-content strong {
              color: #00A7B5;
          }
  
          .verification-code {
              background-color: #e2f8fa;
              padding: 12px;
              border-radius: 6px;
              color: #00A7B5;
              font-weight: bold;
              font-size: 18px;
              text-align: center;
              margin-top: 10px;
          }
  
          .email-footer {
              text-align: center;
              font-size: 12px;
              color: #A0A0A0;
              margin-top: 30px;
              border-top: 1px solid #eee;
              padding-top: 15px;
          }
  
          .email-footer p {
              margin: 5px 0;
          }
  
          .email-footer a {
              color: #00A7B5;
              text-decoration: none;
          }
              .vcode{
              text-align: center;
              
              }
  
      </style>
  </head>
  <body>
      <div class='email-container'>
          <div class='email-header'>
              <img src='https://i.postimg.cc/mgq2V5Wf/badir-logo.jpg' alt='Badir Charity Logo'>
              <h3>رسالة جديدة من بادر الخيرية</h3>
          </div>
          <div class='email-content'>
              <p> $email <strong>:مرحباً بك عزيزي المستخدم</strong></p>
              <p><strong> أنت على بعد خطوة واحدة من تفعيل حسابك في منصة بادر الخيرية</strong><br>" . nl2br($message) . "</p>
              <hr>
              <p class='vcode'><strong>:رمز التحقق الخاص بك</strong></p>
              <div class='verification-code'>$verification_code</div>
          </div>
          <div class='email-footer'>
              <p>&copy; " . date('Y') . " بادر الخيرية - جميع الحقوق محفوظة</p>
              <p>:تواصل معنا <br><a href='mailto:badir.charity.org@gmail.com'>support@badir.org</a></p>
          </div>
      </div>
  </body>
  </html>
  ";


    if ($mail->send()) {

      // $_SESSION['success'] = "تم إرسال الكود بنجاح، تحقق من بريدك.";
      return true;

      // header("Location: /users_verification_view?sent=success");

      // exit();
    } else {
      return false;
      die("فشل في إرسال البريد: " . $mail->ErrorInfo);
    }
  } catch (Exception $e) {
    // die("خطأ في الإرسال: " . $e->getMessage());
    error_log($e->getMessage());
    abort(500);
  } catch (PDOException $e) {
    // die("حدث خطأ أثناء الحفظ: " . $e->getMessage());
    error_log($e->getMessage());
    abort(500);
  }
}





function blockUser()
{
  $now = time();
  $attempts = $_SESSION['send_attempts'] ?? 0;
  $last_sent_time = $_SESSION['last_sent_time'] ?? 0;
  $ban_time = $_SESSION['ban_time'] ?? 0;

  //check if the user is banned
  if ($ban_time > $now) {

    $remaining = ceil(($ban_time - $now) / 60); // waiting time in minutes
    // header("Location: /user_blocked_view");
    // exit();
    die("🚫 تم حظرك مؤقتًا<br>⏳ حاول مرة أخرى بعد: $remaining دقيقة.");
  }

  // check if the user has exceeded the allowed attempts
  if ($attempts >= 4) {
    // if the user has exceeded the allowed attempts, ban him for 24 hours
    $_SESSION['ban_time'] = $now + 86400; // ban for 24 hours
    header("Location: /user_blocked_view");
    exit();
  }

  // calculate the waiting time
  $wait_time = 30 * pow(2, $attempts);
  if (($now - $last_sent_time) < $wait_time) {
    $remaining = $wait_time - ($now - $last_sent_time);  // الوقت المتبقي
    // header("Location: /user_blocked_view");
    die("🚫 تم حظرك مؤقتًا<br>⏳ حاول مرة أخرى بعد: " . $remaining . " ثانية.");
    exit();
  }

  // increment the number of attempts and update the last sent time
  $_SESSION['send_attempts'] = $attempts + 1;
  $_SESSION['last_sent_time'] = $now;

  // reset the ban time if it has expired
  // if ($ban_time <= $now) {
  //   $_SESSION['send_attempts'] = 0;
  //   $_SESSION['ban_time'] = 0;
  // }
}
