<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<!-- الصفحه الرئيسه -->

<?php
// $config = require('config.php'); 
// dd($config);  
?>
<main>
  <!-- الصوره الكبير الي بل البدايه -->
  <section class="hero">
    <img src="views/media/images/andrewSmall.jpg" alt="">

  </section>
  <section class="Carousel_card">
    <h1>الصَّدَقَةُ لَا تَنْقُصُ الْمَالَ، بَلْ تَزِيدُهُ بَرَكَةً وَطُهْرًا</h1>
  <!-- حاوية البطاقات -->

    <main class="main_cart">
      <section class="container">
        <div class="donation-card">
          <img src="views/media/images/P251.png" alt="مشروع نور السعودية">
          <div class="donation-info">
            <div class="aghtha">
              <h6>إغاثة</h6>
              <h5>رقم الحملة :</h5>
              <a href=""><img src="" alt=""></a>
            </div>
            <h3>مشروع نور السعودية</h3>
            <div class="progress-bar">
              <div class="progress"></div>
            </div>
            <div class="donation-details">
              <div>
                <p><strong style="display: inline;">SR 15000/</strong>14000</p>
              </div>
            </div>
            <div class="donate-section">
              <input class="inp" type="text" placeholder=" مبلغ التبرع                   ر.س">
              <button class="donate-btn">تبرع الأن</button>
              <button><img src="" alt=""></button>
            </div>
            <div class="details">عرض التفاصيل</div>
          </div>
      </section>
      <section class="bar_action">

      </section>
    </main>

  </section>
  <!-- الاحداث السريعه -->
  <section class="Fast-acting">
    <div class="tbr3" style="  background-color:#00a7b5;">
      <h1>بِتَكاتُفِنا، نَسْتَطِيعُ تَحْقِيقَ الْمُسْتَحِيل </h1>

      <div class="t3">
        <p>بفضل كرمكم تجاوزنا الكثير من التبرعات. معاً نصنع الفرق.</p>
        <P class="pt">عدد عمليات التبرع <br> 25,7 ألف<br> عملية تبرع</P>
      </div>
      <hr>
      <div class="t3">
        <p>إنجاز جديد يضاف إلى سجلنا. توصلنا إلى عدداً 
          من المشاريع المكتملة <br>
          وغيرنا بهم حياة الكثيرين.
        </p>
        <p class="pt">عددالمشاريع المكتملة<br>
          25,7 ألف <br> مشروع</p>
      </div>
      <hr>

      <div class="t3">
        <p>بفضل الله ثم بدعمكم السخي، وصلنا إلى هذاالعدد
          من المستفيدين وغيرنا حياتهم للأفضل
        </p>
        <p class="pt">عدد المستفيدين<br>25,7ألف<br>مستفيد</p>
      </div>
    </div>

    <div class="login_home">
      <h1> بإنشاء حسابك
      </h1>
      <p id="plogin">
        تحصل على فرصة للمشاركة <br>
        في مشاريعنا المميزة والمساهمة في بناء مجتمع أفضل
      </p>

      <div class="login_tbr3">
        <div class="login_for_home_and_tbr3">
          <p>خطواتك الأولى نحو العطاء تبدأ من هنا.
            انشئ حساباَ واستكشف الفرص للمساهمة في الخير.<br>
          </p>
          <button href="">إنشاء حساب</button>

        </div>
        <div class="login_for_home_and_tbr3">
          <p>
            تبرعك اليوم يصنع فرقاً، غداً كن جزءاً من الخير.<br>
            لا تتردد، تبرعك اليوم قد يغير حياة شخصاً، كن سبباً في سعادته.
          </p><button href="">تبرع الان</button>
        </div>

      </div>
    </div>


  </section>

</main>




<?php require('views/parts/footer.php') ?>