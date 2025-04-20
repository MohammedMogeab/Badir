<?php
//دوال مهمه تستخدم بي كثره

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
function urls($value)
{
    return $_SERVER["REQUEST_URI"] == $value;
}

function routeToControler($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        http_response_code(200);

        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/errors/{$code}.php";
    die();
}


function authorize($condition, $status = Response::HTTP_FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}



function logIn($user)
{

    $_SESSION['user'] =  [
        'email' => $user['email'],
        'id' => $user['user_id'],
        'type' => $user['type']
    ];
    session_regenerate_id(true);
}



function logOut()
{
    $_SESSION = [];
    $user['email']  = null;
    $user['user_id'] = null;
    $user['type'] = null;
    session_destroy();

    $params =  session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

function base_path($path)
{
    return __DIR__ . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}