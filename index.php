<?php
//يبدا جلسة المستخدم
session_start();
require("vendor/autoload.php");
spl_autoload_register(function ($class) {
    $class =str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require "{$class}.php";
});


//يستدعي كلاسات التحقق
require 'core\\' . "Validator.php";
//يستدعي الدوال المساعده
require 'core\\'."function.php";
// يستدعي مهيا المشروع
require 'bootstrap.php';
// يستدعي رموز الارجاع
require 'core\\'."Response.php";
//

//ينشاء كلاس الروتر و يستدعي  الموجه
$router = new core\Routers;
$routes = require "routes.php";


//يستخرج المسار المكلوب من الرابط
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//يتحقق اذا في ميثود خاصه او يعتمد على الميثود العاديه
$methode = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


//يبدا عملية التوجيه
$router->route($uri,$methode);


//يطعبع كل خصائص السرفر اسفل الصفحه

// dd($_SERVER);

