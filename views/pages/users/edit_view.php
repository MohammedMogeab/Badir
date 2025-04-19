<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php $errors = ($_SESSION['errors'] ?? '' ) ; unset($_SESSION['errors']) ; ?>

<main class="main_user">

  <!-- انشاء حساب جديد -->
  <!-- <section class="user" > -->
  <?php // dd($users);
  ?>
  <div class="modal-content">
    <h2>تعديل بيانات المستخدم</h2>
    <form id="register-user-form" action="/users_update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($users['user_id']) ?>">
      <div class="form-group">
        <label for="username">اسم المستخدم:</label>
        <input type="text" id="username" name="username" required value="<?= htmlspecialchars($users['username'] ?? '') ?>">
        <h6 class="error_mseage"> <?= !empty($errors['username']) ? 'خطاء : ' . $errors['username'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="password">كلمة المرور:</label>
        <input type="password" id="password" name="password" required>
        <h6 class="error_mseage"> <?= !empty($errors['password']) ? 'خطاء : ' . $errors['password'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required value="<?= htmlspecialchars($users['email'] ?? '') ?>">
        <h6 class="error_mseage"> <?= !empty($errors['email']) ? 'خطاء : ' . $errors['email'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="type">نوع المستخدم:</label>
        <select id="type" name="type">
          <option value="normal" <?= ($users['type'] ?? '') === 'normal' ? 'selected' : '' ?>>عادي</option>
          <option value="admin" <?= ($users['type'] ?? '') === 'admin' ? 'selected' : '' ?>>مسؤول</option>
          <option value="manager" <?= ($users['type'] ?? '') === 'manager' ? 'selected' : '' ?>>مدير</option>
        </select>
        <h6 class="error_mseage"> <?= !empty($errors['type']) ? 'خطاء : ' . $errors['type'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="country">الدولة:</label>
        <input type="text" id="country" name="country" required value="<?= htmlspecialchars($users['country'] ?? '') ?>">
        <h6 class="error_mseage"> <?= !empty($errors['country']) ? 'خطاء : ' . $errors['country'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="city">المدينة:</label>
        <input type="text" id="city" name="city" required value="<?= htmlspecialchars($users['city'] ?? '') ?>">
        <h6 class="error_mseage"> <?= !empty($errors['city']) ? 'خطاء : ' . $errors['city'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="street">الشارع:</label>
        <input type="text" id="street" name="street" required value="<?= htmlspecialchars($users['street'] ?? '') ?>">
        <h6 class="error_mseage"> <?= !empty($errors['street']) ? 'خطاء : ' . $errors['street'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="phone">رقم الهاتف:</label>
        <input type="text" id="phone" name="phone" required value="<?= htmlspecialchars($users['phone'] ?? '') ?>">
        <h6 class="error_mseage"> <?= !empty($errors['phone']) ? 'خطاء : ' . $errors['phone'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="photo">صورة المستخدم:</label>
        <input type="file" id="photo" name="photo" accept="image/*">
        <?php if (!empty($users['photo'])): ?>
          <img src="uploads/<?= htmlspecialchars($users['photo']) ?>" alt="User Photo" width="100">
        <?php endif; ?>
        <h6 class="error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : ' . $errors['photo'] : '' ?></h6>
      </div>

      <div class="form-group">
        <label for="notifications">استقبال الإشعارات:</label>
        <input type="checkbox" id="notifications" name="notifications" <?= isset($users['notifications']) && $users['notifications'] ? 'checked' : '' ?>>
        <label for="notifications">نعم</label>
        <h6 class="error_mseage"> <?= !empty($errors['notifications']) ? 'خطاء : ' . $errors['notifications'] : '' ?></h6>
      </div>

      <div class="form-group">
        <button type="submit" name="submit" aria-label="حفظ التحديثات">حفظ التحديثات</button>
      </div>
    </form>

  </div>

  </section>
</main>
<?php require('views/parts/footer.php') ?>