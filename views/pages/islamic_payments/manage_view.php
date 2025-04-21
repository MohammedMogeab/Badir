<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_manage">
  <section class="section_manage">
    <a class="add-link" href="/islamic_payments_create">إضافة</a>

    <!-- جدول الحملات الحالية -->
    <h2>المدفوعات الاسلاميه </h2>
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
          <th>اسم المصرف الاسلامي</th>
          <th>وصف المصرف الاسلامي</th>
          <th>نوع المصرف الاسلامي</th>
          <th>المبلغ المجموع</th>
          <!-- <th>التقارير</th> -->
          <!-- <th>الخيارات</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($islamic_payments as $payment): ?>
          <tr>
            <td><input type="checkbox" class="select-payment"></td>
            <td><img src="views/media/images/<?= htmlspecialchars($payment['photo'] ?? "default.png") ?>" alt="شعار المصرف" class="payment-logo" loading="lazy"></td>
            <td><?= htmlspecialchars($payment['name']) ?>
              <nav class="options">
                <ul>
                  <li>
                    <form action="/islamic_payments_show" method="get">
                      <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($payment['islamic_payment_id']) ?>">
                      <button type="submit" aria-label="عرض">عرض</button>
                    </form>
                  </li>
                  <li>
                    <form action="/islamic_payments_edit" method="get">
                      <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($payment['islamic_payment_id']) ?>">
                      <button type="submit" aria-label="تعديل">تعديل</button>
                    </form>
                  </li>
                  <li>
                    <form action="/islamic_payments_destroy" method="post">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($payment['islamic_payment_id']) ?>">
                      <button type="submit" aria-label="حذف">حذف</button>
                    </form>
                  </li>
                  <li>
                      <form action="/notifications_create" method="get">
                        <input type="hidden" name="" value="">
                        <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($campaign['islamic_payment_id']) ?>">
                        <button type="submit" aria-label="اشعار">اشعار</button>
                      </form>
                  </li>
                </ul>
                
              </nav>
            </td>
            <td><?= htmlspecialchars($payment['short_description']) ?></td>
            <td>زكاة / صدقة</td> <!-- Replace this if there's a column for the type -->
            <td><span><?= htmlspecialchars($payment['cost']) ?>$</span></td>
          </tr>
        <?php endforeach; ?>
      </tbody>


    </table>
      </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>