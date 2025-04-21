<?php http_response_code(503); // مهم لضبط كود الحالة الصحيح ?>
<?php require('views/parts/head.php'); ?>
<?php require('views/parts/adminbar.php'); ?>
<?php require('views/parts/navgtion.php'); ?>
<?php require('views/parts/header.php'); ?>

<main class="safha_error_container">
    <div class="risala_card">
        <div class="error_code">٥٠٣</div>
        <h1>الخدمة غير متوفرة</h1>
        <p>
            عفوًا، الخادم غير جاهز حاليًا للتعامل مع الطلب (ربما بسبب الصيانة أو الحمل الزائد). يرجى المحاولة مرة أخرى لاحقًا.
        </p>
        <a href="/">العودة إلى الرئيسية</a>
    </div>
</main>

<?php require('views/parts/footer.php'); ?>