<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_manage">

       
      <section class="section_manage">
        <!-- جدول الحملات الحالية -->
        <a class="add-link" href="/charity_projects_create">إضافة</a>

        <h2>المشاريع الخيريه </h2>
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
              <th>اسم الحملة</th>
              <th>وصف الحملة</th>
              <th>نوع الحملة</th>
              <th>المبلغ المستهدف / المجموع</th>
              <th>تاريخ التسجيل/ الانتهاء</th>
              <!-- <th>التقارير</th> -->
              <!-- <th>الخيارات</th> -->
            </tr>
          </thead>
          <tbody>

          <?php  foreach ($projects as $project): ?>

            <tr>
              <td><input type="checkbox" class="select-campaign"></td>
              <td><img src="views/media/images/<?= htmlspecialchars($project['photo'] ?? "11.png") ?>" alt="شعار الحملة" class="campaign-logo" loading="lazy"></td>
              <td><?= htmlspecialchars($project['name']) ?>
              <nav class="options">
                <ul>
                    <li>
                      <form action="/charity_projects_show" method="get" >
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                        <button type="submit" aria-label="عرض">عرض</button>
                      </form>
                  </li>
                  <li>
                      <form action="/charity_projects_edit" method="get">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                        <button type="submit" aria-label="تعديل">تعديل</button>
                      </form>
                  </li>
                  <li>
                      <form action="/charity_projects_destroy" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                        <button type="submit" aria-label="حذف">حذف</button>
                      </form>
                  </li>
                  <li>
                      <form action="/notifications_create" method="get">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="project_id" value="<?= htmlspecialchars($campaign['project_id']) ?>">
                        <button type="submit" aria-label="اشعار">اشعار</button>
                      </form>
                  </li>
                </ul>
              </nav>
              </td>
              <td><?= htmlspecialchars($project['short_description']) ?></td>
              <td>إغاثة</td>
              <td><span><?= htmlspecialchars($project['cost']) ?>$</span> / <span><?= htmlspecialchars($project['collected_money']) ?>$</span></td>
              <td><span><?= htmlspecialchars($project['start_at']) ?></span> - <span><?= htmlspecialchars($project['end_at']) ?></span></td>
            </tr>

            <?php endforeach; ?>


          </tbody>
        </table>
        </section>
      </main>
<?php require('views/parts/footer.php') ?>


