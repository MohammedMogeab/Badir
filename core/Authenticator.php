<?php

namespace core;

class Authenticator
{
    public function login($email)
    {
        // قم بتخزين البريد الإلكتروني في الجلسة
        $_SESSION['user'] = [
            'email' => $email
        ];

        // تحديث الجلسة لتجنب هجمات Session Fixation
        session_regenerate_id(true);
    }

    public function logout()
    {
        // إزالة بيانات المستخدم من الجلسة
        $_SESSION = [];

        // تدمير الجلسة
        session_destroy();

        // إزالة كوكي الجلسة
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 3600,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    public function isLoggedIn()
    {
        // التحقق مما إذا كان المستخدم مسجلًا دخولًا
        return isset($_SESSION['user']);
    }
}