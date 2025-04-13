<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section class="islamic_payments_index">
    <div class="nav_links_islamic_payments">
      <a class="zakat" href="">الزكاة</a>
      <a class="charity" href="">الصدقة</a>
      <a class="ransom" href="">الفدية</a>
      <a class="atonement" href="">الكفارة و النذور</a>
      <a class="aqeeqah" href="">العقيقة</a>
    </div>
    <!-- الصدقه -->
    <section class="Carousel_card">
      <!-- حاوية البطاقات -->


      <main class="main_cart">
        <section class="container_card">

          <?php foreach ($islamic_payments as $islamic_payment): ?>

            <div class="donation-card">
              <a href="/islamic_payments_zakat">
                <img src="views/media/images/<?= htmlspecialchars($islamic_payment['photo'] ?? "11.png") ?>" alt="مشروع نور السعودية">
              </a>
              <div class="donation-info">
                <div class="aghtha">

                  <h5>رقم الحملة : <?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?></h5>
                  <a href=""><img src="" alt=""></a>
                </div>
                <h3> <?= htmlspecialchars($islamic_payment['type']) ?> </h3>
                <div class="progress-bar">
                  <div class="progress"></div>
                </div>
                <div class="donation-details">
                  <div>
                    <p><strong style="display: inline;">$ <?= htmlspecialchars($islamic_payment['cost']) ?>/</strong><?= htmlspecialchars($islamic_payment['paid_cost']) ?></p>
                  </div>
                </div>
                <div class="donate-section">
                  <form action="/islamic_payments_donate" method="post" class="donate-section" required>
                    <input class="inp" type="number" name="cost" placeholder="$">
                    <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?>">
                    <button type="submit" class="donate-btn">تبرع الأن</button>
                  </form>
                  <form action="/islamic_payments_addcart" method="post">
                    <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?>">
                    <button type="submit" class="donate_cart"><img src="views/media/images/cart.png" alt=""></button>
                  </form>
                </div>
                <a href="/islamic_payments_zakat">
                  <div class="details">عرض التفاصيل</div>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </section>
        <section class="bar_action">

        </section>
      </main>

    </section>
  </section>
</main>
<?php require('views/parts/footer.php') ?>