<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section class="bar_search">
    <form action="" method="">
      <input id="search" type="search" name="search" placeholder="Search">
      <select name="project_type" id="project_type">
        <option value="">نوع المشروع</option>
        <option value="رجوع"> رجوع </option>
        <option value="محتاجيين"> محتاجيين</option>
        <option value="عمليات"> عمليات</option>
        <option value="بناء مسكن"> بناء مسكن</option>
      </select>
      <select name="region" id="region">
        <option value="">المنطقة</option>
      </select>

    </form>
  
  </section>

  <section class="container">
    <h1>حملات الترع المتاحة</h1>
    <div class="card_charity_campaigns">
      <img src="" alt="">
      <strong>بادر</strong>
      <p><img src="" alt=""> <strong>رقم الحملة : 51</strong></p>
      <p><img src="" alt=""> <strong>المنطقة تعز</strong></p>
      <h3>مشروع مساعدة المحتاجين</h3>
      <p>
        <span>55%</span>
        <strong></strong>
        500000/125000 ريال
      </p>

      <form action="" method="">
        <label for="donation_amount">مبلغ التبرع</label>
        <input id="donation_amount" type="number" name="donation_amount" placeholder="ريال">
        <button id="btn_donation" type="submit" name="btn_donation">تبرع</button>
        <button id="btn_basket" type="submit" name="btn_basket"><img src="" alt=""></button>

      </form>
      <a class="view_details" href="">عرض التفاصيل</a>
      
    </div>

  </section>
</main>
<?php require('views/parts/footer.php') ?>