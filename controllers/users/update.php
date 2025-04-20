<?php


use core\App;
use core\Database;

$db = App::resolve(Database::class);


if (!isset($_POST['username']) || !Validator::string($_POST['username'], 3, 255)) {
    $errors['username'] = "اسم المستخدم يجب أن يكون بين 3 و255 حرفًا.";
}

if (!isset($_POST['email']) || !Validator::email($_POST['email'])) {
    $errors['email'] = "البريد الإلكتروني غير صالح.";
}

if (isset($_POST['password']) && !Validator::string($_POST['password'], 6, 255)) {
    $errors['password'] = "كلمة المرور يجب أن تتكون من 6 أحرف على الأقل.";
}

if (!isset($_POST['country']) || !Validator::string($_POST['country'], 2, 255)) {
    $errors['country'] = "البلد غير صالح.";
}

if (!isset($_POST['city']) || !Validator::string($_POST['city'], 2, 255)) {
    $errors['city'] = "المدينة غير صالحة.";
}

if (!isset($_POST['street']) || !Validator::string($_POST['street'], 2, 255)) {
    $errors['street'] = "الشارع غير صالح.";
}

// if (!isset($_POST['phone']) || !Validator::phone($_POST['phone'])) {
//     $errors['phone'] = "رقم الهاتف غير صالح.";
// }


if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location:" . $_SERVER["HTTP_REFERER"]);
    exit();
}



try {
    // require('controllers/parts/image_loader.php');
    $db->query(
        "UPDATE users
        SET 
            username = COALESCE(:username, username),
            password = COALESCE(:password, password),
            photo = COALESCE(:photo, photo),
            email = COALESCE(:email, email),
            type = COALESCE(:type, type),
            directorate = COALESCE(:directorate, directorate),
            country = COALESCE(:country, country),
            city = COALESCE(:city, city),
            street = COALESCE(:street, street),
            phone = COALESCE(:phone, phone),
            notifications = COALESCE(:notifications, notifications)
        WHERE user_id = :user_id",
        [
            'username' => isset($_POST['username']) ? htmlspecialchars($_POST['username']) : null,
            'password' => isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null, // Assuming password hash
            'photo' => $filenamenew ?? null,
            'email' => isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null,
            'type' => $_POST['type'] ?? null,
            'directorate' => $_POST['directorate'] ?? null,
            'country' => $_POST['country'] ?? null,
            'city' => $_POST['city'] ?? null,
            'street' => $_POST['street'] ?? null,
            'phone' => $_POST['phone'] ?? null,
            'notifications' => isset($_POST['notifications']) ? (int)$_POST['notifications'] : 1,
            'user_id' => $_POST['user_id']
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء تحديث البيانات";
    header("Location: /users_edit");
    exit();
}



header("Location:" . $_SERVER["HTTP_REFERER"]);
die();
