<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_manage">
  <section class="section_manage">
    <a class="add-link" href="/executive_partners_create">إضافة</a>
    <!-- جدول الحملات الحالية -->
    <h2> الشركاء التنفيذيين</h2>
    <!-- شريط الأحداث -->
    <!-- <section class="bar_action_manage">
        <button class="btn_stopping" name="btn_stopping">إيقاف</button>
        <button class="btn_post_notifications" name="btn_post_notifications">نشر اشعارات</button>
        <button class="btn_filter" name="btn_filter">فلترة</button>
        <button class="btn_search" name="btn_search">بحث</button>
      </section> -->

      <div class="campaigns-table-container">

    <table class="campaigns-table">
      <thead>
        <tr>
          <th><input type="checkbox" id="select-all"></th>
          <th>الشعار</th>
          <th>اسم الشريك</th>
          <th>وصف الشريك</th>
          <th>نوع الشريك</th>
          <th>المدينة</th>
          <th> الايميل </th>
          <!-- <th>التقارير</th> -->
          <!-- <th>الخيارات</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($partners as $partner): ?>
          <tr>
            
            <td><input type="checkbox" class="select-partner"></td>
            <td><img src="views/media/images/<?= htmlspecialchars($partner['photo'] ?? "default.png") ?>" alt="شعار الشريك" class="partner-logo" loading="lazy"></td>
            <td><?= htmlspecialchars($partner['name']) ?>
              <nav class="options">
                <ul>
                  <li>
                    <form action="/executive_partners_show" method="get">
                      <input type="hidden" name="partner_id" value="<?= htmlspecialchars($partner['partner_id']) ?>">
                      <button type="submit" aria-label="عرض">عرض</button>
                    </form>
                  </li>
                  <li>
                    <form action="/executive_partners_edit" method="get">
                      <input type="hidden" name="partner_id" value="<?= htmlspecialchars($partner['partner_id']) ?>">
                      <button type="submit" aria-label="تعديل">تعديل</button>
                    </form>
                  </li>
                  <li>
                    <form action="/executive_partners_destroy" method="post">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="partner_id" value="<?= htmlspecialchars($partner['partner_id']) ?>">
                      <button type="submit" aria-label="حذف">حذف</button>
                    </form>
                  </li>
                  <li>
                    <form action="/notifications_create" method="get">
                      <input type="hidden" name="" value="">
                      <input type="hidden" name="partner_id" value="<?= htmlspecialchars($campaign['partner_id']) ?>">
                      <button type="submit" aria-label="اشعار">اشعار</button>
                    </form>
                  </li>
                </ul>
              </nav>
            </td>
            <td><?= htmlspecialchars($partner['description']) ?></td>
            <td>تنفيذي</td> <!-- Adjust this field if there's a "type" column for partners -->
            <td><?= htmlspecialchars($partner['city']) ?></td>
            <td><?= htmlspecialchars($partner['email']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
      </div>

  </section>
</main>



<?php require('views/parts/footer.php') ?>