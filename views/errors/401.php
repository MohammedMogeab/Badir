<?php http_response_code(401); // مهم لضبط كود الحالة الصحيح ?>
<?php require('views/parts/head.php'); ?>
<?php require('views/parts/adminbar.php'); ?>
<?php require('views/parts/navgtion.php'); ?>
<?php require('views/parts/header.php'); ?>

<main class="safha_error_container">
    <div class="risala_card">
        <div class="error_code">٤٠١</div>
        <h1>غير مصرح به</h1>
        <p>
            عفوًا، تحتاج إلى تسجيل الدخول أو تقديم بيانات اعتماد صالحة للوصول إلى هذه الصفحة.
        </p>
        <a href="/">العودة إلى الرئيسية</a>
    </div>
</main>

<?php require('views/parts/footer.php'); ?>