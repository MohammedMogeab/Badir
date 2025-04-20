<?php http_response_code(404); // مهم لضبط كود الحالة الصحيح ?>
<?php require('views/parts/head.php'); // تأكد من أن هذا الملف يضبط dir="rtl" في <html> أو <body> ?>
<?php require('views/parts/adminbar.php'); ?>
<?php require('views/parts/navgtion.php'); ?>
<?php require('views/parts/header.php'); ?>

<main class="safha_error_container">
    <div class="risala_card">  <?php // تم تغيير اسم الفئة ليعكس المحتوى بشكل أفضل ?>
        <div class="error_code">٤٠٤</div> <?php // فئة خاصة لكود الخطأ ?>
        <h1>عفوًا! الصفحة غير موجودة</h1>
        <p>
            نأسف، الصفحة التي تبحث عنها غير موجودة. ربما تم نقلها أو حذفها.
        </p>
        <a href="/">العودة إلى الرئيسية</a>
    </div>
</main>

<?php require('views/parts/footer.php'); ?>