<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <!-- شريط الافعال -->
  <section class="bar_action">

  </section>

    

    <main class="main_executive_partners_index">
    <h1>إدارة الشراكات</h1>

        <!-- أزرار الإدارة -->
        <div class="management-buttons">
            <button id="delete-selected">حذف المحددين</button>
            <button id="add-partner">إضافة شريك</button>
        </div>

        <!-- جدول الشركاء -->
        <table class="partners-table">
            <thead>
                <tr >
                    <th><input type="checkbox" id="select-all"></th>
                    <th>الشعار</th>
                    <th>اسم الشريك</th>
                    <th>الوصف</th>
                    <th>الخيارات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="select-partner"></td>
                    <td><img src="logo1.png" alt="شعار الشريك 1" class="partner-logo"></td>
                    <td>شركة التقنية</td>
                    <td>وصف قصير عن الشريك الأول.</td>
                    <td>
                        <div class="dropdown">
                            <button class="dropdown-btn">خيارات</button>
                            <div class="dropdown-content">
                                <a href="#" class="send-email">إرسال بريد إلكتروني</a>
                                <a href="#" class="edit-partner">تعديل الشريك</a>
                                <a href="#" class="delete-partner">حذف الشريك</a>
                                <a href="#" class="view-reports">عرض التقارير</a>
                                <a href="#" class="add-report">إضافة تقرير</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="select-partner"></td>
                    <td><img src="logo2.png" alt="شعار الشريك 2" class="partner-logo"></td>
                    <td>شركة التعليم</td>
                    <td>وصف قصير عن الشريك الثاني.</td>
                    <td>
                        <div class="dropdown">
                            <button class="dropdown-btn">خيارات</button>
                            <div class="dropdown-content">
                                <a href="#" class="send-email">إرسال بريد إلكتروني</a>
                                <a href="#" class="edit-partner">تعديل الشريك</a>
                                <a href="#" class="delete-partner">حذف الشريك</a>
                                <a href="#" class="view-reports">عرض التقارير</a>
                                <a href="#" class="add-report">إضافة تقرير</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

  <!-- بطاقات الشركا التنفيذيين -->
  <section class="container">
<div class="card_executive_partners">

</div>
</section>
</main>
