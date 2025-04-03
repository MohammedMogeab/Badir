<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <!-- شريط التنقل -->
  <section class="bar_navigation">
    <div nav="button">
      <a class="public_projects" id="public_projects" href="">مشاريع عامة</a>
      <a class="sponsoring_orphans" id="sponsoring_orphans" href="">مشاريع عامة</a>
      <a class="mosque_care" id="mosque_care" href="">مشاريع عامة</a>
    </div>
    <form action="" method="">
      <input id="search" type="text" name="search">
      <button id="btn_search" type="submit" name="btn_search"><img src="views/media/images/search.png" alt=""></button>
    </form>
    <p>انضموا الينا في تقديم فرص تبرع تؤثر بشكل واسع وتدعم المجتمعات المحتاجة مع ضمان تحقيق نتائج طويلة الأمد</p>
  
  </section>

<!-- حاوية الكروت -->
  <section class="container">
    <div class="card_charity_projects">
      <img class="main_image" src="" alt="">
      <p>سداد ديون المساجين المتعففين</p>
      <button class="share" name="btn_share"><img class="image_share" src="" alt=""></button>
      <button class="bell" name="btn_bell"><img class="image_bell" src="" alt=""></button>
      <p>تم جمع <strong>20,555 ر.س</strong> </p>
      <p> المبلغ المستهدف  <strong>900,246 ر.س</strong> </p>
      <button name="stopped"> <img src="" alt=""> متوقف</button>
      <button name="underway"> <img src="" alt=""> قيد التنفيذ</button>
      <button name="complete"> <img src="" alt=""> مكتمل</button>
      <form action="" method="">
        <input  type="number" nam="amount" placeholder="مبلغ التبرع">
        <button type="submit" name="donate">تبرع الانِ</button>
        <button type="submit" name="basket"><img src="" alt=""></button>
      </form>
      <a class="view_more" id="view_more" href="">عرض المزيد</a>

    </div>

  </section>
</main>
<?php require('views/parts/footer.php') ?>