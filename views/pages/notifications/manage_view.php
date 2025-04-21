<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_manage">
  <section class="section_manage">
    <a class="add-link" href="/notifications_create">إضافة</a>
    <!-- جدول الحملات الحالية -->
    <h2>الاشعارات </h2>
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
          <th>اسم الاشعار</th>
          <th>محتوا الاشعار</th>
          <th>تاريخ الاشعار</th>
          <!-- <th>التقارير</th> -->
          <!-- <th>الخيارات</th> -->
        </tr>
      </thead>
<tbody>
  <?php foreach ($notifications as $notification): ?>
    <tr>
      <td><input type="checkbox" class="select-notification"></td>
      <td><img src="views/media/images/<?= htmlspecialchars($notification['photo'] ?? "default.png") ?>" alt="شعار الاشعار" class="notification-logo" loading="lazy"></td>
      <td><?= htmlspecialchars($notification['title']) ?>
        <nav class="options">
          <ul>
            <li>
              <form action="/notifications_show" method="get">
                <input type="hidden" name="notification_id" value="<?= htmlspecialchars($notification['notification_id']) ?>">
                <button type="submit" aria-label="عرض">عرض</button>
              </form>
            </li>
            <li>
              <form action="/notifications_edit" method="get">
                <input type="hidden" name="notification_id" value="<?= htmlspecialchars($notification['notification_id']) ?>">
                <button type="submit" aria-label="تعديل">تعديل</button>
              </form>
            </li>
            <li>
              <form action="/notifications_destroy" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="notification_id" value="<?= htmlspecialchars($notification['notification_id']) ?>">
                <button type="submit" aria-label="حذف">حذف</button>
              </form>
            </li>
            <li>
                      <form action="/notifications_create" method="get">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="notification_id" value="<?= htmlspecialchars($campaign['notification_id']) ?>">
                        <button type="submit" aria-label="اشعار">اشعار</button>
                      </form>
                  </li>
          </ul>
        </nav>                
      </td>
      <td><?= htmlspecialchars($notification['content']) ?></td>
      <td><span><?= htmlspecialchars($notification['send_at']) ?></span></td>
    </tr>
  <?php endforeach; ?>
</tbody>
    </table>
      </div>

  </section>
</main>
<?php require('views/parts/footer.php') ?>