<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<main class="main_create_chatity">
  <div class="div_tbr3"> 
    <section class="donation-form">
      <div class="modal-content">
        <h2>إضافة دفعة إسلامية جديدة</h2>
        <form id="add-payment-form" action="/islamic_payments_update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($payment['islamic_payment_id']) ?>">
          <div class="form-group">
            <label for="type">نوع الدفعة:</label>
            <input type="text" id="type" name="type" value="<?= htmlspecialchars($payment['type'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($payment['name'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="short_description">وصف المصرف:</label>
            <input type="text" id="short_description" name="short_description" value="<?= htmlspecialchars($payment['short_description'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="cost">التكلفة:</label>
            <input type="number" id="cost" name="cost" step="1" value="<?= htmlspecialchars($payment['cost'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="paid_cost">المبلغ المدفوع:</label>
            <input type="number" id="paid_cost" name="paid_cost" step="1" value="<?= htmlspecialchars($payment['paid_cost'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="payment_date">تاريخ الدفع:</label>
            <input type="datetime-local" id="payment_date" name="payment_date" value="<?= htmlspecialchars($payment['payment_date'] ?? '') ?>">
          </div>
          <div class="form-group">
            <label for="user_id">معرف المستخدم:</label>
            <input type="text" id="user_id" name="user_id" value="<?= htmlspecialchars($payment['user_id'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="photo">صورة الدفع:</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <?php if (!empty($payment['photo'])): ?>
              <img src="/uploads/<?= htmlspecialchars($payment['photo']) ?>" alt="صورة الدفع" width="100">
            <?php endif; ?>
          </div>
          <div class="form-group">
            <button type="submit" name="submit">إضافة دفعة</button>
          </div>
        </form>
      </div>
    </section>
  </div>
</main>

<?php require('views/parts/footer.php') ?>