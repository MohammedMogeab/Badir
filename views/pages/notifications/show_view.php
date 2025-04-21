<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<main class="main_show_ch">
    <section class="card_islamic_endowments">
        <div class="imgs">
            <img src="views/media/images/<?php echo $notifications['0']['photo'] ?? 'default.png'; ?>" alt="صورة الإشعار" loading="lazy">
        </div>
        <div>
            <h5><?php echo htmlspecialchars($notifications['0']['title']); ?></h5>
            <p class="details_p"><?php echo htmlspecialchars($notifications['0']['content']); ?></p>
        </div>
        <h5>تاريخ الإرسال: <?php echo htmlspecialchars($notifications['0']['send_at']); ?></h5>
    </section>

    <!-- باقي البيانات -->
    <section class="card_islamic_endowments" id="card_islamic_endowments">
        <div class="details_show_ch">
            <h5>تفاصيل الإشعار</h5>
            <p>عنوان الإشعار: <?php echo htmlspecialchars($notifications['0']['title']); ?></p>
            <p>المحتوى: <?php echo htmlspecialchars($notifications['0']['content']); ?></p>
        </div>

        <div class="card_insid" id="card_insid">
            <div>
                <h6>وقت الإرسال</h6>
                <p><?php echo htmlspecialchars($notifications['0']['send_at']); ?></p>
            </div>
        </div>

        <div class="news">
            <h5>أخبار الإشعار</h5>
            <div><p>تم إرسال هذا الإشعار بتاريخ: <?php echo htmlspecialchars($notifications['0']['send_at']); ?></p></div>
        </div>
    </section>
</main>

<?php require('views/parts/footer.php') ?>