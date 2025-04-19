<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<script src="views/javascrept/fidya.js"></script>


<main class="main_islamic_payments_zakat">
<label for="fidya-calculator" class="section-label visually-hidden"></label>

  <section id="fidya-calculator" class="form_zakat">
  <!-- حسابة الفديه-->
     <!-- فورم حساب الفدية -->
     <form >
      <h2>احسب الفدية حسب حالتك</h2>

      <label>سبب الفدية:</label>
      <div class="type-options">
        <div class="option-box" onclick="calculate('alsiyam')">فدية الصيام للعاجز </div>
        <div class="option-box" onclick="calculate('adhaa')">الأذى في الحج</div>
        <div class="option-box" onclick="calculate('jimae')">فدية الجماع في نهار رمضان</div>
        <div class="option-box" onclick="calculate('najasa')">الجهل بالنجاسة في الصلاة</div>
        <div class="option-box" onclick="calculate('nadhar')">التخلّي عن نذر أو شرط شرعي</div>
        <div class="option-box" onclick="calculate('sayd')">التطيب أو حلق الشعر أو تقليم الأظافر أثناء الإحرام</div>
      </div>

      <input type="hidden" id="type" name="type">

      <label for="days">عدد المرات</label>
      <input type="number" id="count" name="days" required min="1">


    </form>


    <div class="donate-section">
      <form action="/islamic_payments_checkout" method="get" class="donate-section" required>
        <input class="inp" type="number" name="cost" placeholder="$" required id="result">
        <input type="hidden" name="islamic_payment_id" value="5">
        <button type="submit" class="donate-btn3" aria-label="تبرع الأن">تبرع الأن</button>
      </form>
      <form class="fromCart" action="/islamic_payments_addcart" method="post">
        <input type="hidden" name="islamic_payment_id" value="5">
        <button type="submit" class="donate_cart" aria-label="السله"><img src="views/media/images/cart.png" alt=""></button>
      </form>
    </div>

  </section>

     
  <label for="fidya-info" class="section-label visually-hidden"></label>

  <section id="fidya-info" >
  <!-- تعريف عام  -->
     <!-- معلومات حول الفدية -->
     <div class="info-box info-section">
      <h2>ما هي الفدية؟</h2>
      <p>
        الفدية هي مبلغ أو طعام يُقدَّم بدلاً من الصيام لمن لا يستطيع الصوم بعذر دائم أو شرعي. يجب إخراجها عن كل يوم يفطر فيه المسلم ولا يستطيع قضاؤه.
      </p>

      <h3>متى تجب الفدية؟</h3>
      <ul>
        <li>في حالة <strong>المرض المزمن</strong> الذي لا يُرجى شفاؤه.</li>
        <li>عند <strong>الرضاعة أو الحمل</strong> إذا خيف على الطفل.</li>
        <li>على <strong>كبار السن</strong> العاجزين عن الصيام.</li>
        <li>في حالة <strong>تأخير قضاء رمضان بدون عذر</strong> حتى يدخل رمضان التالي.</li>
      </ul>

      <h3>كيفية إخراج الفدية:</h3>
      <ul>
        <li>إطعام مسكين عن كل يوم.</li>
        <li>مقدار الإطعام: وجبة مشبعة أو نصف صاع (ما يعادل تقريبًا 1.5 كجم من الطعام).</li>
        <li>يمكن إخراجها نقدًا إذا دعت الحاجة (بحسب رأي بعض العلماء).</li>
      </ul>

      <h3>آيات وأحاديث:</h3>
      <ul>
        <li>قال الله تعالى: ﴿ وَعَلَى الَّذِينَ يُطِيقُونَهُ فِدْيَةٌ طَعَامُ مِسْكِينٍ ﴾ [البقرة: 184]</li>
        <li>قال ابن عباس: "ليُطْعِم عن كل يوم مسكينًا، إن شاء أعطاه مدًّا من قمح..."</li>
      </ul>

      <h3>فوائد إخراج الفدية:</h3>
      <ul>
        <li>رحمة بالضعفاء وأصحاب الأعذار.</li>
        <li>مساعدة للفقراء والمحتاجين.</li>
        <li>امتثال لأمر الله وتحقيق الطهارة القلبية.</li>
      </ul>
    </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>