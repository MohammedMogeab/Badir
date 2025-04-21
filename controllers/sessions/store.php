<?php

use core\App;
use core\Database;
use models\User;

$db  = App::resolve(Database::class);



$erorrs = [];


if (empty($_POST['email'])) {
    $erorrs['email'] = "Please enter your email";
}

if (empty($_POST['password'])) {
    $erorrs['password'] = "Please enter your password";
}


if (! Validator::email($_POST['email'])) {
    $erorrs['email'] = "not a valid email ";
}
if (! Validator::string($_POST['password'])) {
    $erorrs['password'] = "password is not valid ";
}

if (! empty($erorrs)) {
    require 'views/sessions/create_view.php';
}

$user = $db->query("select * from users where email = :email ; ", [
    "email" => $_POST['email']
])->fetch();


if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
        logIn($user);
        header("Location: /");
        exit();
    }
}


$erorrs['email'] = "There No Matching Email Or Password Like this";

require 'views/pages/users/index_view.php';
