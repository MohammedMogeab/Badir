<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_islamic_payments_zakat">
<label for="sadaqah-calculator" class="section-label visually-hidden"> </label>

  <section id="sadaqah-calculator" class="form_zakat">
  <!-- حسابة  الصدقه-->
  <form >
      <h2>حاسبة الصدقة</h2>
      
      <!-- <label for="income">الدخل الشهري (بالريال)</label>
      <input type="number" id="income" name="income" required> -->
<!-- 
    <h2>احسب الصدقة</h2> -->

    <div class="donate-section">
    <form action="/islamic_payments_checkout" method="get" class="donate-section" required>
      <input class="inp" type="number" name="cost" placeholder="$" required id="result">
      <input type="hidden" name="islamic_payment_id" value="1">
      <button type="submit" class="donate-btn3" aria-label="تبرع الأن">تبرع الأن</button>
    </form>
    <form class="fromCart" action="/islamic_payments_addcart" method="post">
      <input type="hidden" name="islamic_payment_id" value="1">
      <!-- <button type="submit" class="donate_cart" aria-label="السله"><img src="views/media/images/cart.png" alt=""></button> -->
    </form>
  </div>

  </section>


  <label for="sadaqah-info" class="section-label visually-hidden"></label>

  <section id="sadaqah-info" class="info-section">
  <!-- تعريف عام  -->
  <form>
      <h2>عن الصدقة</h2>

      <p>
        الصدقة من أعظم أبواب الخير، بها يُمحى الذنب، وتُزكى النفس، ويُرفع البلاء.
      </p>

      <h3>فوائد الصدقة:</h3>
      <ul>
        <li>تطهر المال والنفس.</li>
        <li>تدفع البلاء وتفتح أبواب الخير.</li>
        <li>سبب في الشفاء.</li>
        <li>تزيد البركة في الرزق والعمر.</li>
      </ul>

      <h3>آيات قرآنية:</h3>
      <ul>
        <li>﴿ مَنْ ذَا الَّذِي يُقْرِضُ اللَّهَ قَرْضًا حَسَنًا ﴾ [البقرة: 245]</li>
        <li>﴿ خُذْ مِنْ أَمْوَالِهِمْ صَدَقَةً تُطَهِّرُهُمْ وَتُزَكِّيهِمْ بِهَا ﴾ [التوبة: 103]</li>
      </ul>

      <h3>أحاديث نبوية:</h3>
      <ul>
        <li>"الصدقة تطفئ الخطيئة كما يطفئ الماء النار" - رواه الترمذي</li>
        <li>"ما نقص مال من صدقة" - رواه مسلم</li>
      </ul>

      <h3>شروط الصدقة:</h3>
      <ul>
        <li>النية الخالصة لله.</li>
        <li>أن تكون من مال حلال.</li>
        <li>عدم المنّ أو الرياء.</li>
      </ul>
    </form>

  </section>
</main>
<?php require('views/parts/footer.php') ?>