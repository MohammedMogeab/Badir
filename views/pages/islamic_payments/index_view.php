<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
<!-- <label for="islamic-payments-section" class="section-label visually-hidden">قسم التبرعات الإسلامية</label> -->

  <section id="islamic-payments-section" class="islamic_payments_index">
    <div class="nav_links_islamic_payments">
      <a class="zakat" href="/islamic_payments_zakat">الزكاة</a>
      <a class="charity" href="/islamic_payments_sadaqah">الصدقة</a>
      <a class="ransom" href="/islamic_payments_fidya">الفدية</a>
      <a class="atonement" href="/islamic_payments_kaffara">الكفارة و النذور</a>
      <a class="aqeeqah" href="/islamic_payments_aqiqah">العقيقة</a>
    </div>
    <!-- الصدقه -->
    <!-- <label for="payments-carousel" class="section-label visually-hidden">عرض التبرعات الإسلامية</label> -->
    <section id="payments-carousel" class="Carousel_card">
      <main class="main_cart">
      <!-- <label for="payments-list" class="section-label visually-hidden">بطاقات التبرعات</label> -->
        <section id="payments-list" class="container_card">

          <?php foreach ($islamic_payments as $islamic_payment): ?>

            <div class="donation-card">
              <a href="/islamic_payments_show?islamic_payment_id=<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?>">
                <img src="views/media/images/<?= htmlspecialchars($islamic_payment['photo'] ?? "11.png") ?>" alt="مشروع نور اليمن">
              </a>
              <div class="donation-info">
                <div class="aghtha">

                  <h5>رقم الحملة : <?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?></h5>
                  <!-- <a href=""><img src="" alt=""></a> -->
                </div>
                <h3> <?= htmlspecialchars($islamic_payment['type']) ?> </h3>
                <div class="progress-bar">
                  <div class="progress" style="text-align: left; width: <?= htmlspecialchars(($islamic_payment['paid_cost'] / $islamic_payment['cost']) * 100) ?>%;">%<?= htmlspecialchars((int)(($islamic_payment['paid_cost'] / $islamic_payment['cost']) * 100)) ?></div>
                </div>
                <div class="donation-details">
                  <div>
                    <p><strong style="display: inline;">$ <?= htmlspecialchars($islamic_payment['cost']) ?>/</strong><?= htmlspecialchars($islamic_payment['paid_cost']) ?></p>
                  </div>
                </div>
                <div class="donate-section">
                  <form action="/islamic_payments_checkout" method="get" class="donate-section" required>
                    <input class="inp" type="number" name="cost" placeholder="$" required min="0" max="<?= htmlspecialchars($islamic_payment['cost'] - $islamic_payment['paid_cost']) ?> ">
                    <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?>">
                    <button type="submit" class="donate-btn" aria-label="تبرع الأن">تبرع الأن</button>
                  </form>
                  <form action="/islamic_payments_addcart" method="post">
                    <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?>">
                    <button type="submit" class="donate_cart"  aria-label="السله"><img src="views/media/images/cart.png" alt="السلة" loading="lazy"></button>
                  </form>
                </div>
                <div class="details">
                  <a href="/islamic_payments_show?islamic_payment_id=<?= htmlspecialchars($islamic_payment['islamic_payment_id'])  ?>">
                    عرض التفاصيل</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </section>

        <div style="display: flex; justify-content: space-around; width: 100%;">
          <div style="display: flex; width: 50%; justify-content: space-around; ; height:20px; padding: 40px; align-self:center; align-items: center; text-align: center;">          
            <a href="/islamic_payments_index?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] - 1 : 1 ?>" style=" max-height: 50px; max-width: 50px; <?php echo !isset($_GET['page_number']) || $_GET['page_number'] - 1 <= 0 ? 'pointer-events: none; cursor: default; opacity: 0.3; ' : 'pointer-events: auto; cursor: pointer; ' ?>"><img src="views/media/images/left.png" alt="previous" loading="lazy" heigh= "50px" width= "50px"></a>
            <div style="height: inherit; width: auto; font-size: larger; font-family: 'Times New Roman', Times, serif;" >
              <div style="display: flex; flex-direction: row; justify-content: space-around; width: 100%;">
                <div style="width: fit-content;"><?php echo (isset($_GET['page_number'])? $_GET['page_number'] - 1 : 0) . " . . . " ; ?></div>
                <div style="color: blue; width: fit-content;"><?php echo "   " . isset($_GET['page_number'])? $_GET['page_number'] : 1 . "   "; ?></div>
                <div style="width: fit-content;"><?php echo " . . . " . (isset($_GET['page_number'])? $_GET['page_number'] + 1: 2 ); ?></div>
              </div>
            </div>
            <a href="/islamic_payments_index?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] + 1 : 2 ?>"style=" max-height: 50px; max-width: 50px; <?php echo !isset($_GET['page_number']) || $_GET['page_number'] + 1 >= $pages_count['islamic_payments']? 'pointer-events: none; cursor: default; opacity: 0.3;  ' : 'pointer-events: auto; cursor: pointer; ' ?>"><img src="views/media/images/next.png" alt="next" loading="lazy" heigh= "50px" width= "50px" ></a>
          </div>
        </div>
        </section>
      </main>
    </section>
  </section>
</main>
<?php require('views/parts/footer.php') ?>