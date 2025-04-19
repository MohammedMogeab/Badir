<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<script src="views/javascrept/kaffara.js"></script>


<main class="main_islamic_payments_zakat">
<label for="kaffarah-calculator" class="section-label visually-hidden"> </label>

  <section id="kaffarah-calculator" class="form_zakat">
  <!-- حسابة الكفاره-->


    <!-- فورم حساب الكفارة -->
    <form>
      <h2>احسب الكفارة حسب حالتك</h2>

      <label>اختر نوع الكفارة:</label>
      <div class="type-options">
        <div class="option-box" onclick="calculate('yamin')" >كفارة يمين (الحلف بالله)</div>
        <div class="option-box" onclick="calculate('ramadan')" >كفارة إفطار في رمضان (متعمد)</div>
        <div class="option-box" onclick="calculate('zihar')" >كفارة الظهار</div>
        <div class="option-box" onclick="calculate('qatal')" >كفارة القتل الخطأ</div>
        <div class="option-box" onclick="calculate('nother')" >كفارة النذر</div>
      </div>

      <label for="count">كم مرة وجبت عليك الكفارة؟</label>
      <input type="number" id="count" name="count" required min="1">

      
    </form>

    <div class="donate-section">
      <form action="/islamic_payments_checkout" method="get" class="donate-section" required>
        <input class="inp" type="number" name="cost" placeholder="$" required id="result">
        <input type="hidden" name="islamic_payment_id" value="4">
        <button type="submit" class="donate-btn3" aria-label="تبرع الأن">تبرع الأن</button>
      </form>
      <form class="fromCart" action="/islamic_payments_addcart" method="post">
        <input type="hidden" name="islamic_payment_id" value="4">
        <button type="submit" class="donate_cart" aria-label="السله"><img src="views/media/images/cart.png" alt=""></button>
      </form>
    </div>

  </section>


  <label for="kaffarah-info" class="section-label visually-hidden"></label>

  <section id="kaffarah-info" >
  <!-- تعريف عام  -->
   
    <!-- معلومات حول الكفارة -->
    <div class="info-box info-section">
      <h2>ما هي الكفارة؟</h2>
      <p>
        الكفارة هي ما يُؤدى لتكفير ذنب أو مخالفة شرعية. فرضها الله في بعض الحالات للتوبة ولتطهير النفس، وهي تختلف حسب نوع المخالفة.
      </p>

      <h3>أنواع الكفارات:</h3>
      <ul>
        <li><strong>اليمين:</strong> إطعام 10 مساكين، أو كسوتهم، أو تحرير رقبة، فإن لم يجد فصيام 3 أيام.</li>
        <li><strong>الإفطار في رمضان:</strong> صيام شهرين متتابعين، أو إطعام 60 مسكينًا.</li>
        <li><strong>الظهار:</strong> تحرير رقبة، فإن لم يجد فصيام شهرين، فإن لم يستطع فإطعام 60 مسكينًا.</li>
        <li><strong>القتل الخطأ:</strong> تحرير رقبة مؤمنة، فإن لم يجد فصيام شهرين متتابعين.</li>
        <li><strong>النذر:</strong> الوفاء به، فإن تعذر فيخرج كفارة يمين.</li>
      </ul>

      <h3>شروط الكفارة:</h3>
      <ul>
        <li>النية الصادقة والإخلاص لله.</li>
        <li>القيام بالكفارة فور القدرة دون تأخير.</li>
        <li>اتباع الترتيب عند وجوبه (مثل الصيام بعد العجز عن الإطعام).</li>
      </ul>

      <h3>فوائد الكفارة:</h3>
      <ul>
        <li>تكفير الذنوب والمعاصي.</li>
        <li>تقوية الصلة بالله والتوبة النصوح.</li>
        <li>مساعدة المحتاجين والمساكين (في كفارات الإطعام).</li>
      </ul>

      <h3>آيات وأحاديث:</h3>
      <ul>
        <li>قال تعالى: ﴿ فَكَفَّارَتُهُ إِطْعَامُ عَشَرَةِ مَسَاكِينَ ﴾ [المائدة: 89]</li>
        <li>قال النبي ﷺ: "من حلف على يمين فرأى غيرها خيرًا منها فليأتِ الذي هو خير، وليكفر عن يمينه." (رواه مسلم)</li>
      </ul>
    </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>