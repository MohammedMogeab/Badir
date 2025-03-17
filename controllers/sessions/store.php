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
if (! Validator::string($password)) {
    $erorrs['password'] = "password is not valid ";
}

if (! empty($erorrs)) {
    require 'views/sessions/create_view.php';
}

// $user = $db->query("select * from users where email = :email ; ", [
//     "email" => $email
// ])->fetch();

if ($user) {
    if (password_verify($password, $user['password'])) {
        logIn($user);
        header("Location: /");
        exit();
    }
}


$erorrs['email'] = "There No Matching Email Or Password Like this";

require 'views/sessions/create_view.php';
