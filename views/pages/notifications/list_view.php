<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <!-- العمود الي تحت اعمله اول شي  -->
  <!-- شريط البحث -->
  <section class="bar_search">
    <form action="" method="">
       <button class="delete" name="delete">🗑حذف</button>
       <button class="read" name="read">✔مقروءة</button>
       <button class="obstruction" name="obstruction">❗تعطيل الإشعارات</button>
       <button class="white-button">
      <span class="icon">تصفية الحسابات▾</button>
      <input class="search" type="text" name="search" placeholder="مربع بحث">
    </form>

  </section>
  <!-- كرت الاشعارات -->
  <section class="container">
    <div class="card_notifications">
            
          <img src="bader.png" alt="شعار بادر">
          <h2>أخبار جديدة في منصة بادر!</h2>
          <p class="time">منذ 5 دقائق</p>
        
        
          <p>
            مرحباً [اسم المستخدم]!<br><br>
            نود إبلاغك أنه تم إضافة بعض التحديثات الهامة على منصة بادر!<br>
            لمعرفة المزيد من التفاصيل حول التحديثات الجديدة أو للوصول إلى الروابط المتعلقة بها،<br>
            يرجى النقر على التفاصيل أدناه.<br><br>
            شكراً لاستخدامك منصة بادر.
          </p>
          
          <h2>أخبار جديدة في منصة بادر! </h2>
        
          <button class="show" id="show" name="show">عرض التفاصيل</button>
        
      

    </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>