<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php $errors = ($_SESSION['errors'] ?? '' ) ; unset($_SESSION['errors']) ; ?>

<main class="main_create_chatity">
    <div class="div_tbr3"> 
  <section class="donation-form">
  <div class="modal-content">
    <h1>إضافة دفعة إسلامية جديدة</h1>
    <div id="group">
    <form id="add-payment-form" action="/islamic_payments_store" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="type">نوع الدفعة:</label>
            <input type="number" id="type" name="type" required>
            <h6 class="error_mseage"> <?= !empty($errors['type']) ? 'خطاء : ' . $errors['type'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required>
            <h6 class="error_mseage"> <?= !empty($errors['name']) ? 'خطاء : ' . $errors['name'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="short_description">وصف المصرف:</label>
            <input type="text"  id="short_description" name="short_description" required>
            <h6 class="error_mseage"> <?= !empty($errors['short_description']) ? 'خطاء : ' . $errors['short_description'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="cost">التكلفة:</label>
            <input type="number" step="1" id="cost" name="cost" required>
            <h6 class="error_mseage"> <?= !empty($errors['cost']) ? 'خطاء : ' . $errors['cost'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="paid_cost">المبلغ المدفوع:</label>
            <input type="number"  id="paid_cost" name="paid_cost" required>
            <h6 class="error_mseage"> <?= !empty($errors['paid_cost']) ? 'خطاء : ' . $errors['paid_cost'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="payment_date">تاريخ الدفع:</label>
            <input type="datetime-local" id="payment_date" name="payment_date">
            <h6 class="error_mseage"> <?= !empty($errors['payment_date']) ? 'خطاء : ' . $errors['payment_date'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="user_id">معرف المستخدم:</label>
            <input type="number" id="user_id" name="user_id" required>
            <h6 class="error_mseage"> <?= !empty($errors['user_id']) ? 'خطاء : ' . $errors['user_id'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="photo">صورة الدفع:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
            <h6 class="error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : ' . $errors['photo'] : '' ?></h6>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" aria-label="اضافة">إضافة مدفع</button>
        </div>
    </form>
    </div>
</div>

  </section>
    </div>
</main>
<?php require('views/parts/footer.php') ?>