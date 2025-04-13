<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_user">

  <!-- انشاء حساب جديد -->
  <!-- <section class="user" > -->
  <?php // dd($users);
  ?>
  <div class="modal-content">
    <h2>تسجيل مستخدم جديد</h2>
    <form id="register-user-form" action="/users_update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($users['user_id']) ?>">
      <div class="form-group">
        <label for="username">اسم المستخدم:</label>
        <input type="text" id="username" name="username" required value="<?= htmlspecialchars($users['username'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label for="password">كلمة المرور:</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required value="<?= htmlspecialchars($users['email'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label for="type">نوع المستخدم:</label>
        <select id="type" name="type">
          <option value="normal" <?= ($users['type'] ?? '') === 'normal' ? 'selected' : '' ?>>عادي</option>
          <option value="admin" <?= ($users['type'] ?? '') === 'admin' ? 'selected' : '' ?>>مسؤول</option>
          <option value="manager" <?= ($users['type'] ?? '') === 'manager' ? 'selected' : '' ?>>مدير</option>
        </select>
      </div>

      <div class="form-group">
        <label for="country">الدولة:</label>
        <input type="text" id="country" name="country" required value="<?= htmlspecialchars($users['country'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label for="city">المدينة:</label>
        <input type="text" id="city" name="city" required value="<?= htmlspecialchars($users['city'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label for="street">الشارع:</label>
        <input type="text" id="street" name="street" required value="<?= htmlspecialchars($users['street'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label for="phone">رقم الهاتف:</label>
        <input type="text" id="phone" name="phone" required value="<?= htmlspecialchars($users['phone'] ?? '') ?>">
      </div>

      <div class="form-group">
        <label for="photo">صورة المستخدم:</label>
        <input type="file" id="photo" name="photo" accept="image/*">
        <?php if (!empty($users['photo'])): ?>
          <img src="uploads/<?= htmlspecialchars($users['photo']) ?>" alt="User Photo" width="100">
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="notifications">استقبال الإشعارات:</label>
        <input type="checkbox" id="notifications" name="notifications" <?= isset($users['notifications']) && $users['notifications'] ? 'checked' : '' ?>>
      </div>

      <div class="form-group">
        <button type="submit" name="submit">تسجيل مستخدم</button>
      </div>
    </form>

  </div>

  </section>
</main>
<?php require('views/parts/footer.php') ?>