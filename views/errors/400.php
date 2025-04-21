<?php http_response_code(400); // مهم لضبط كود الحالة الصحيح ?>
<?php require('views/parts/head.php'); ?>
<?php require('views/parts/adminbar.php'); ?>
<?php require('views/parts/navgtion.php'); ?>
<?php require('views/parts/header.php'); ?>

<main class="safha_error_container">
    <div class="risala_card">
        <div class="error_code">٤٠٠</div>
        <h1>طلب سيء</h1>
        <p>
            عفوًا، لم يتمكن الخادم من فهم طلبك بسبب صياغة غير صحيحة أو بيانات غير صالحة.
        </p>
        <a href="/">العودة إلى الرئيسية</a>
    </div>
</main>

<?php require('views/parts/footer.php'); ?>