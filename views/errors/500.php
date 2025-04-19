<?php http_response_code(500); // مهم لضبط كود الحالة الصحيح ?>
<?php require('views/parts/head.php'); ?>
<?php require('views/parts/adminbar.php'); ?>
<?php require('views/parts/navgtion.php'); ?>
<?php require('views/parts/header.php'); ?>

<main class="safha_error_container">
    <div class="risala_card">
        <div class="error_code">٥٠٠</div>
        <h1>خطأ داخلي بالخادم</h1>
        <p>
            عفوًا، حدث خطأ غير متوقع في الخادم. فريقنا يعمل على إصلاحه في أقرب وقت ممكن.
        </p>
        <a href="/">العودة إلى الرئيسية</a>
    </div>
</main>

<?php require('views/parts/footer.php'); ?>