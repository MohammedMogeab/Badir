<?php

use core\App;
use core\Database;
use core\Authenticator;


$db = App::resolve(Database::class);



// مبارك يكتب حق الاستعلامات حق قاعدة البيانات هنا 





// استقبال البيانات من النموذج
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone_number = $_POST['phone_number'];
$place = $_POST['place'];

// التحقق من البيانات

$errors = [];

if (!Validator::string($name, 2, 255)) {
    $errors['name'] = 'الاسم يجب أن يكون بين 2 و 255 حرفًا.';
}

if (!Validator::email($email)) {
    $errors['email'] = 'يرجى تقديم عنوان بريد إلكتروني صالح.';
}

if (!Validator::string($password, 8, 255)) {
    $errors['password'] = 'كلمة المرور يجب أن تكون على الأقل 8 أحرف.';
}

if ($password !== $confirm_password) {
    $errors['confirm_password'] = 'كلمتا المرور غير متطابقتين.';
}

if (!Validator::string($phone_number, 8, 15)) {
    $errors['phone_number'] = 'رقم الهاتف يجب أن يكون بين 8 و 15 رقمًا.';
}

if (!Validator::string($place, 2, 255)) {
    $errors['place'] = 'المنطقة يجب أن تكون بين 2 و 255 حرفًا.';
}


// إذا كانت هناك أخطاء، قم بإعادة توجيه المستخدم إلى صفحة التسجيل مع عرض الأخطا
 if (! empty($errors)) {
       require 'views/registertion/create_view.php';
    
 }


// التحقق مما إذا كان البريد الإلكتروني موجودًا مسبقًا
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    $errors['email'] = 'البريد الإلكتروني موجود مسبقًا.';
    require 'views/registertion/create_view.php';
    die();
}

if ($user) {
    header('location: /');
    exit();
} else {
    $user = $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
     
    
     // تسجيل دخول المستخدم بعد إنشاء الحساب
  //   $authenticator = new Authenticator();
  //   $authenticator->login($email);
     
    (new Authenticator)->login(['email' => $email]);


    header('location: /');
    exit();
}



// إدخال البيانات إلى قاعدة البيانات
$db->query('INSERT INTO users (name, email, password, phone_number, place) VALUES (:name, :email, :password, :phone_number, :place)', [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
    'phone_number' => $phone_number,
    'place' => $place
]);

//logIn($user);
// توجيه المستخدم إلى الصفحة الرئيسية بعد التسجيل الناجح
header("Location: /");
die();




// $user =  $db->query(
//     'select * from users where email = :email',
//     ['email' => $email]
// )->fetch();


    // $db->query(
    //     'INSERT INTO users (username , email , password ,admin )(:username ,:email , :password , :admin);',
    //     [
    //         'username' => 'guo',
    //         'email' => $email,
    //         'password' => password_hash($password, PASSWORD_BCRYPT),
    //         'admin' => 0
    //     ]
    // );
