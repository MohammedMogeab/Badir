<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<!-- الصفحه الرئيسه -->

<?php
// $config = require('config.php');
//echo"<br><br><br>" ;
//dd($campaigns);  
?>


<main>


  <!-- الصوره الكبير الي بل البدايه -->

  <label style="display: none;" for="hero-section" class="section-label">القسم الرئيسي</label>

  <section id="hero-section" class="hero">
    <!-- <img src="views/media/images/andrewSmall.jpg" alt="">
    <h1  style="         font-size: var(--font-size-ll);  color : white;  margin: -110px 10px 0 0; text-align: right;">بِفَضْلِ تَبَرُّعاتِكُمْ، نَصْنَعُ فَرْقًا حَقِيقِيًّا فِي حَياةِ الْمُحْتاجِين</h1> -->
    <!-- <div class="slider">
      <div class="slide">
    <input type="radio" name="radio-btn" id ="radio">
    <input type="radio" name="radio-btn" id ="radio">
    <input type="radio" name="radio-btn" id ="radio">
    <input type="radio" name="radio-btn" id ="radio">


    <div>
      <img src="views/media/images/ali.jpg" alt="">
    </div>

    <div>
      <img src="views/media/images/almwald.jpg" alt="">
    </div>

    <div>
      <img src="views/media/images/andrewSmall.jpg" alt="">
    </div>

    <div>
      <img src="" alt="">
    </div>

    <div class="nav-auto">
      <div class="a-b1"></div>
      <div class="a-b2"></div>
      <div class="a-b3"></div>
      <div class="a-b4"></div>
    </div>

    <div class="nav m">
      <label for="radio" class="m-btn"></label>
      <label for="radio" class="m-btn"></label>
      <label for="radio" class="m-btn"></label>
      <label for="radio" class="m-btn"></label>
    </div>

    
    </div>
    </div> -->
<!-- ................................ -->
    <!-- <div class="slider">
    <div class="slides">
      <div class="slide"><img src="views/media/images/ali.jpg" alt="Slide 1"></div>
      <div class="slide"><img src="views/media/images/andrewSmall.jpg" alt="Slide 2"></div>
      <div class="slide"><img src="https://placehold.co/800x400/4444ff/fff?text=Slide+3" alt="Slide 3"></div>
      <div class="slide"><img src="https://placehold.co/800x400/ffff44/000?text=Slide+4" alt="Slide 4"></div>
      <div class="slide"><img src="https://placehold.co/800x400/ff44ff/fff?text=Slide+5" alt="Slide 5"></div>
    </div>
    <div class="dots">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div> -->
  
  <div class="slider">
    <div class="slide active">
    <img src="views/media/images/ali.jpg" alt=" منازل قديمة" loading="lazy">
      <h1>"إن تُقرضوا الله قرضًا حسنًا يُضاعفه لكم ويغفر لكم" – التغابن: 17
      </h1>
    </div>
    <div class="slide">
    <img src="views/media/images/andrewSmall.jpg" alt="شجرة دم الأخوين" loading="lazy">
    <h1>مَّثَلُ الَّذِينَ يُنفِقُونَ أَمْوَالَهُمْ فِي سَبِيلِ اللَّهِ كَمَثَلِ حَبَّةٍ أَنبَتَتْ سَبْعَ سَنَابِلَ" – البقرة: 261</h1>
    </div>
    <div class="slide">
    <img src="views/media/images/almwald.jpg"  alt="المسجد النبوي" loading="lazy">
    <h1>"لن تنالوا البر حتى تنفقوا مما تحبون" – آل عمران: 92</h1>
    </div>
    <div class="slide">
    <img src="views/media/images/gah.png" alt="القاهرة" loading="lazy">
    <h1>"كل امرئٍ في ظل صدقته يوم القيامة" – رواه أحمد
      </h1>
    </div>


    <div class="dots">
      <div class="dot active"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>

    <div class="btns">
    <img class="btn prev-btn" src="views/media/images/left.png" alt="السابق" loading="lazy">
    <img class="btn " src="views/media/images/next.png" alt="التالي" loading="lazy">

      <!-- <button class="btn prev-btn">⏮️ السابق</button>
      <button class="btn next-btn">التالي ⏭️</button> -->
    </div>
  </div>



  </section>


  <h1 style="         margin: var(--margin-xl); text-align: center;    color: var(--bgcolor-dark); ">الصَّدَقَةُ لَا تَنْقُصُ الْمَالَ، بَلْ تَزِيدُهُ بَرَكَةً وَطُهْرًا</h1>

  <label style="display: none;" for="campaigns-section" class="section-label">حملات التبرع</label>

  <section id="campaigns-section" class="Carousel_card box ">
    <!-- حاوية البطاقات -->

    <main class="main_cart">
      <section class="container_card">
        <?php foreach ($campaigns as $campaign): ?>
          <div class="donation-card">
            <a href="/charity_campaigns_show?campaign_id=<?= htmlspecialchars($campaign['campaign_id']) ?>">
              <img src="views/media/images/<?= htmlspecialchars($campaign['photo'] ?? "11.png") ?>" alt="مشروع نور السعودية" loading="lazy">
            </a>
            <div class="donation-info">
              <div class="aghtha">
                <h6 >بادر</h6>
                <h5>رقم الحملة : <?= htmlspecialchars($campaign['campaign_id']) ?></h5>
                <!-- <a href=""><img src="" alt=""></a> -->
              </div>
              <h3><?= htmlspecialchars($campaign['name']) ?></h3>
              <div class="progress-bar">
                <div class="progress" style="width:<?= htmlspecialchars(($campaign['collected_money'] / $campaign['cost']) * 100) ?>% "></div>
              </div>
              <div class="donation-details">
                <div>
                  <p><strong style="display: inline;">$ <?= htmlspecialchars($campaign['collected_money']) ?>/</strong><?= htmlspecialchars($campaign['cost']) ?></p>
                </div>
              </div>
              <div class="donate-section">
                <form action="/charity_campaigns_checkout" method="get" class="donate-section">
                  <input class="inp" type="number" name="cost" placeholder="$">
                  <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                  <button type="submit" class="donate-btn" aria-label="تبرع الان">تبرع الأن</button>
                </form>
                <form action="/charity_campaigns_addcart" method="post">
                  <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                  <button type="submit" class="donate_cart" aria-label="السلة"><img src="views/media/images/cart.png" alt="السلة" loading="lazy"></button>
                </form>
              </div>
              <div class="details">
                <a href="/charity_campaigns_show?campaign_id=<?= htmlspecialchars($campaign['campaign_id']) ?>">عرض التفاصيل</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </section>
      <section class="bar_action">

      </section>
    </main>





  </section>
  <!-- الاحداث السريعه -->
  <h1 style="background-color: white; color: var(--bgcolor-dark);text-align: center;         margin: var(--margin-xl); " >بِتَكاتُفِنا، نَسْتَطِيعُ تَحْقِيقَ الْمُسْتَحِيل </h1>

  <label style="display: none;" for="stats-section" class="section-label">الإحصائيات</label>

  <section id="stats-section" class="Fast-acting" >
    <div class="tbr3">


      <div class="t3 box" >
        <p>بفضل كرمكم تجاوزنا الكثير من التبرعات. معاً نصنع الفرق.</p>
        <P class="pt">عدد عمليات التبرع <br><span><?=$users_statistics['donates_sum'] ?></span> <br> عملية تبرع</P>
      </div>
      <hr>
      <div class="t3 box">
        <p>إنجاز جديد يضاف إلى سجلنا. توصلنا إلى عدداً
          من المشاريع المكتملة <br>
          وغيرنا بهم حياة الكثيرين.
        </p>
        <p class="pt">عددالمشاريع المكتملة<br><span>
       <?php echo $projects_statistics['completed']['completed']?></span><br> مشروع</p>
      </div>
      <hr>

      <div class="t3 box">
        <p>بفضل الله ثم بدعمكم السخي، وصلنا إلى هذاالعدد
          من المستفيدين وغيرنا حياتهم للأفضل
        </p>
        <p class="pt">عدد المستفيدين<br><span><?php echo $beneficiaries_project_campain['beneficiaries_count']?></span><br>مستفيد</p>
      </div>
    </div>

    <div class="login_home box">
      <h1 style="color: var(--bgcolor-dark);"> بإنشاء حسابك
      </h1>
      <p id="plogin">
        تحصل على فرصة للمشاركة <br>
        في مشاريعنا المميزة والمساهمة في بناء مجتمع أفضل
      </p>

      <div class="login_tbr3 "  >
        <div class="login_for_home_and_tbr3 box">
          <p>خطواتك الأولى نحو العطاء تبدأ من هنا.
            انشئ حساباَ واستكشف الفرص للمساهمة في الخير.<br>
          </p>
          <a href="/users_create">
           <button type="button" aria-label=" انشاء حساب">إنشاء حساب</button>
          </a>
        </div>
        <div class="login_for_home_and_tbr3 box">
          <p>
            تبرعك اليوم يصنع فرقاً، غداً كن جزءاً من الخير.<br>
            لا تتردد، تبرعك اليوم قد يغير حياة شخصاً، كن سبباً في سعادته.
          </p>
          
           <a href="/charity_campaigns_donate">
            <button aria-label="تبرع الان">تبرع الان</button>
          </a> 
        </div>

      </div>
    </div>


  </section>

</main>




<?php require('views/parts/footer.php') ?>