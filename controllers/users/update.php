<?php



//require 'core\\' . "Validator.php";

use core\App;
use core\Database;

$db = App::resolve(Database::class);


// $userID = 1;



// // $note = $db->query("SELECT * from users where id = :id ", [
// //   'id' => $_POST['id'],
// // ])->findOrFail();

// // authorize($note['other_id'] == $userID);

// $heading = "update test";


// $errors = [];

// // if (!(Validator::string($_POST['anme'], 1, 255))) {
// //     $errors["titel"] = "Titel  is too short or too long";
// // }
// // if (!(Validator::string($_POST['body'], 1, 1000))) {
// //     $errors["titel"] = " body is too short or long";
// // }


// // if (! empty($errors)) {
// //     require "views/pages/users/edit_view.php";
// //     die();
// // }
// // $users = $db->query("SELECT (username, password, photo, email, type, directorate, county, city, street, phone) from users where user_id = :user_id ", [
// //     'user_id' => $_GET['user_id']
// //   ])->findOrFail();
// // $db->query("UPDATE users set name = :name  " , [
// //     'name' => $_POST['name'],

// // ]);

// try {
//     $db->query("UPDATE users SET
//     username = :username,
//     email = :email,
//     type = :type,
//     country = :country,
//     city = :city,
//     street = :street,
//     phone = :phone
//     WHERE user_id = :user_id", [
//         'username' => $_POST['username'],
//         'email' => $_POST['email'],
//         'type' => $_POST['type'],
//         'country' => $_POST['country'],
//         'city' => $_POST['city'],
//         'street' => $_POST['street'],
//         'phone' => $_POST['phone'],
//         'user_id' => $_POST['user_id']
//     ]);
// } catch (PDOException $e) {
//     error_log($e->getMessage());
//     $_SESSION['error'] = "حدث خطأ أثناء حفظ البيانات";
//     header("Location: /charity_projects_create");
//     exit();
// }

try {
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
