<?php

use models\Partner;

 require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>


<main class="main_show_ch">
<label for="partner-main-section" class="section-label visually-hidden">تفاصيل الشريك الرئيسية</label>

  <section id="partner-main-section" class="card_islamic_endowments">
    <!-- Partner Image -->
    <div class="img">
      <img src="views/media/images/<?php echo $partners['0']['photo'] ?? "default.png" ?>" alt=" شعار الشريك" loading="lazy">
    </div>
    <div>
      <!-- Partner Name -->
      <h5><?php echo htmlspecialchars($partners['0']['name']); ?></h5>
      <!-- Partner Description -->
      <p class="details_p"><?php echo htmlspecialchars($partners['0']['description']); ?></p>
    </div>
    <!-- Partner Details -->
    <h5>رقم الشريك : <?php echo htmlspecialchars($partners['0']['partner_id']); ?></h5>
    <div class="details_show_ch">
      <h5>تفاصيل الشريك</h5>
      <p>البريد الإلكتروني: <?php echo htmlspecialchars($partners['0']['email']); ?></p>
      <p>المدينة: <?php echo htmlspecialchars($partners['0']['city']); ?></p>
      <p>الشارع: <?php echo htmlspecialchars($partners['0']['street']); ?></p>
      <p>الهاتف: <?php echo htmlspecialchars($partners['0']['phone']); ?></p>
      <p>المعلومات الإضافية: <?php echo htmlspecialchars($partners['0']['more_information']); ?></p>
    </div>
    <!-- Partner Location -->
    <div class="news" id="news">
      <div>
        <h6>المديرية</h6>
        <p><?php echo htmlspecialchars($partners['0']['directorate']); ?></p>
        <h6>الدولة</h6>
        <p><?php echo htmlspecialchars($partners['0']['country'] ?? 'Yemen'); ?></p>
      </div>
      <div>
        <h6>المدينة</h6>
        <p><?php echo htmlspecialchars($partners['0']['city']); ?></p>
        <h6>الشارع</h6>
        <p><?php echo htmlspecialchars($partners['0']['street']); ?></p>
      </div>
    </div>
    <div class="news">
      <h5>معلومات إضافية</h5>
      <div>
        <p><?php echo htmlspecialchars($partners['0']['more_information']); ?></p>
      </div>

    </div>
    
  </section>
  
</main>

<?php require('views/parts/footer.php') ?>