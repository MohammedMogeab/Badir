<?php http_response_code(403); // مهم لضبط كود الحالة الصحيح ?>
<?php require('views/parts/head.php'); ?>
<?php require('views/parts/adminbar.php'); ?>
<?php require('views/parts/navgtion.php'); ?>
<?php require('views/parts/header.php'); ?>

<main class="safha_error_container">
    <div class="risala_card">
        <div class="error_code">٤٠٣</div>
        <h1>ممنوع الوصول</h1>
        <p>
            عفوًا، ليس لديك الإذن اللازم للوصول إلى هذه الصفحة أو المصدر.
        </p>
        <a href="/">العودة إلى الرئيسية</a>
    </div>
</main>

<?php require('views/parts/footer.php'); ?>