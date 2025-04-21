<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_list_notifications">
  <!-- العمود الي تحت اعمله اول شي  -->
  <!-- شريط البحث -->
  <section class="bar_search_notifications">
    <form action="" method="">
       <button class="read" name="read" aria-label="مقروءة">✔  مقروءة</button>
       <button class="delete" name="delete" aria-label="حذف">🗑  حذف</button>
       <button class="obstruction" name="obstruction" aria-label="تعطيل الاشعارات">❗  تعطيل الإشعارات</button>
       <button class="white-button" aria-label="تصفية الحسابات">
      <span class="icon">تصفية الحسابات▾</button>
      <input class="search" type="text" name="search" placeholder="مربع بحث">
    </form>

  </section>
  <!-- كرت الاشعارات -->
  <section class="container_notifications">
    <div class="card_notifications">
            
          <img src="views/media/images/bader.png" alt="شعار بادر">
          <h2>أخبار جديدة في منصة بادر!</h2>
          <p class="time">منذ 5 دقائق</p>
        
        
          <p class="hello">
            مرحباً [اسم المستخدم]!<br><br>
            نود إبلاغك أنه تم إضافة بعض التحديثات الهامة على منصة بادر!<br>
            لمعرفة المزيد من التفاصيل حول التحديثات الجديدة أو للوصول إلى الروابط المتعلقة بها،<br>
            يرجى النقر على التفاصيل أدناه.<br><br>
            شكراً لاستخدامك منصة بادر.
          </p>
          
          <h2>أخبار جديدة في منصة بادر! </h2>
        
          <button class="show" id="show" name="show" aria-label="عرض التفاصيل">عرض التفاصيل</button>
        
      

    </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>