<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_manage">
  <section class="section_manage">
    <a class="add-link" href="/islamic_endowments_create">إضافة</a>

    <!-- جدول الحملات الحالية -->

    <h2>الاوقاف  </h2>
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
          <th>اسم الوقف</th>
          <th>وصف الوقف</th>
          <th>نوع الوقف</th>
          <th>المبلغ المجموع</th>
          <!-- <th>التقارير</th> -->
          <!-- <th>الخيارات</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($islamic_endowments as $endowment): ?>
          <tr>
            <td><input type="checkbox" class="select-endowment"></td>
            <td><img src="views/media/images/<?= htmlspecialchars($endowment['photo'] ?? "default.png") ?>" alt="شعار الوقف" class="endowment-logo" loading="lazy"></td>
            <td><?= htmlspecialchars($endowment['name']) ?>
              <nav class="options">
                <ul>
                  <li>
                    <form action="/islamic_endowments_show" method="get">
                      <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($endowment['endowment_id']) ?>">
                      <button type="submit" aria-label="عرض">عرض</button>
                    </form>
                  </li>
                  <li>
                    <form action="/islamic_endowments_edit" method="get">
                      <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($endowment['endowment_id']) ?>">
                      <button type="submit" aria-label="تعديل">تعديل</button>
                    </form>
                  </li>
                  <li>
                    <form action="/islamic_endowments_destroy" method="post">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($endowment['endowment_id']) ?>">
                      <button type="submit" aria-label="حذف">حذف</button>
                    </form>
                  </li>
                  <li>
                      <form action="/notifications_create" method="get">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($campaign['endowment_id']) ?>">
                        <button type="submit" aria-label="اشعار">اشعار</button>
                      </form>
                  </li>
                </ul>
              </nav>
            </td>
            <td><?= htmlspecialchars($endowment['short_description']) ?></td>
            <td>وقف خيري</td> <!-- Adjust this field if there's a "type" column for endowments -->
            <td><span><?= htmlspecialchars($endowment['cost']) ?>$</span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
      </div>

  </section>
</main>
<?php require('views/parts/footer.php') ?>