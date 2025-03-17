
<?php

use core\App;
use core\Database;


$db  = App::resolve(Database::class);


$email = $_POST['email'];
$password = $_POST['password'];

$erorrs = [];

if (! Validator::email($email)) {
    $erorrs['email'] = "not a valid email ";
}
if (! Validator::string($password, 8, 255)) {
    $erorrs['password'] = "password is too short password ";
}

if (! empty($erorrs)) {
    require 'views/registertion/create_view.php';
}





// $user =  $db->query(
//     'select * from users where email = :email',
//     ['email' => $email]
// )->fetch();


if ($user) {
    header("Location: /");
} else {

    // $db->query(
    //     'INSERT INTO users (username , email , password ,admin ) VALUES (:username ,:email , :password , :admin);',
    //     [
    //         'username' => 'guo',
    //         'email' => $email,
    //         'password' => password_hash($password, PASSWORD_BCRYPT),
    //         'admin' => 0
    //     ]
    // );


    logIn($user);



    header("Location: /");
    die();
}
