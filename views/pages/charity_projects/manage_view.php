<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <div class="main_button">
    <p>إدارة حملات التبرع الإنسانية</p>
    <button name="add_donation_campaign">إضافة حملة تبرع</button>
  </div>
  <!-- شريط الاحداث -->
   <h2>الحملات الحالية</h2>
  <section class="bar_action">
    <button class="btn_stopping" name="btn_stopping">زر إيقاف</button>
    <button class="btn_post_notifications" name="btn_post_notifications">نشر اشعارات</button>
    <button class="btn_filter" name="btn_filter">فلترة</button>
    <button class="btn_search" name="btn_search">بحث</button>

  </section>
<!-- حاوية الكروت -->
  <section class="container">
    <div class="crad_charity_projects">
      <div class="head">
        <h3>تحديد</h3>
        <h3>اسم الحملة</h3>
        <h3>وصف الحملة</h3>
        <h3>نوع الحملة الانسانية</h3>
        <h3>المبلغ المستهدف / المجموع</h3>
        <h3>تاريخ التسجيل/ الانتهاء</h3>
        <h3>التقارير</h3>
        <h3>أدوات</h3>
      </div>
      <div class="table">
        <table>
          <tr>
            <td><img src="" alt=""></td>
            <td></td>
            <td></td>
            <td><span>70000$</span><span>35000$</span></td>
            <td><span>30/12/2024</span><span>30/12/2025</span></td>
            <td><button class="show_color_green" name="show_color_green">عرض</button></td>
            <td><button class="show_color_black" name="show_color_black">عرض</button></td>
            <td>
              <button class="btn_post" name="btn_post">نشر إشعار</button>
              <button class="btn_modify" name="btn_modify">تعديل</button>
              <button class="btn_add" name="btn_add">اضافة</button>
              <button class="btn_stop" name="btn_stop">إيقاف</button>
            </td>
          </tr>
        </table>
      </div>
    <div>
  </section>
  <h2>الحملات المقدمة</h2>
  <!-- شريط الاحداث -->
  <section class="bar_action">
    <button class="btn_delete" name="btn_delete"> حذف</button>
    <button class="btn_post_notifications" name="btn_post_notifications">نشر اشعارات</button>
    <button class="btn_publish" name="btn_publish">نشر خبر</button>
    <button class="btn_accept_request" name="btn_accept_request">قبول الطلبات</button>
    <button class="btn_filter" name="btn_filter">فلترة</button>
    <button class="btn_search" name="btn_search">بحث</button>

  </section>
<!-- حاوية الكروت -->
  <section class="container">
    <div class="crad_charity_projects">
      <div class="head">
        <h3>تحديد</h3>
        <h3>اسم الحملة</h3>
        <h3>وصف الحملة</h3>
        <h3>المبلغ المستهدف / المجموع</h3>
        <h3>تاريخ التسجيل/ الانتهاء</h3>
        <h3>التقارير</h3>
        <h3>أدوات</h3>
      </div>
      <div class="table">
        <table>
          <tr>
            <td><img src="" alt=""></td>
            <td></td>
            <td></td>
            <td><span>458148 ريال سعودي$</span><span>41518 ريال سعودي$</span></td>
            <td><span>30/12/2024</span><span>30/12/2025</span></td>
            <td><button class="show_color_green" name="show_color_green">عرض</button></td>
            <td><button class="show_color_black" name="show_color_black">عرض</button></td>
            <td>
              <button class="btn_accept_campaign" name="btn_accept_campaign">قبول الحلمة</button>
              <button class="btn_post_notifications" name="btn_post_notifications">نشر إشعار</button>
              <button class="btn_refusal_campaign" name="btn_refusal_campaign">رفض الحلمة</button>
            </td>
          </tr>
        </table>
      </div>

    </div>
  </section>

</main>
<?php require('views/parts/footer.php') ?>