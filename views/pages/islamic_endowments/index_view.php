<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <!-- الفلتره -->
  <section class="bar_felter">
    <form action="" method="">
      <label for="gender_baby">  نوع الوقف</label>
        <select name="gender_baby" id="gender_baby">
          <option value="disabled selected">كل الأوقاف</option>
          <option value="charity">الوقف الخيري</option>
          <option value="atomic">الوقف الذري (الاهلي)</option>
          <option value="joint">الوقف المشترك</option>
          <option value="cash">الوقف النقدي</option>
          <option value="production">الوقف الانتاجي</option>
          <option value="timer">الوقف المؤقت</option>
          <option value="technological_and_scientific">الوقف التكنولوجي و العلمي</option>
        </select>
    </form>


  </section>
  <!-- كرت الاوقاف -->
  <section class="container">

    <div class="card_islamic_endowments">
      <img src="" alt="">
      <h2>وقف بناء مسجد</h2>
      <p>بناء مسجد في منطقة لا يوجد فيها مسجد</p>
      <form action="" method="">
        <label for="donation"><h3>مبلغ التبرع</h3></label><br>
        <input id="donation" type="number" name="donation" placeholder="ريال">
        <button class="donation" type="submit" name="donation">تبرع</button>
        <button class="add" name="add">إضافة الى السلة <img src="" alt=""></button>
        <button class="share" name="share">مشاركة المشروع <img src="" alt=""></button>
      </form>
      <p>ينتهي في 30 ديسمبر 2025</p><br>
      <a class="more_details" href="">تفاصيل أكثر</a>

    </div>
  </section>


</main>
<?php require('views/parts/footer.php') ?>