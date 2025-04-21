<?php require('views/parts/head.php'); ?>
<?php require('views/parts/navgtion.php'); ?>
<?php $errors = ($_SESSION['errors'] ?? '');
unset($_SESSION['errors']); ?>
<?php
if (isset($_SESSION['ban_time']) && $_SESSION['ban_time'] > time()) {
  header("Location: /user_blocked_view");
  exit();
  // if the user is banned, redirect to the blocked view
}

?>

<main class="main_user MUC">

  <!-- انشاء حساب جديد -->
  <section class="user">

  <div class="modal-content">
    <!-- <h2>تسجيل مستخدم جديد</h2>
      <form id="register-user-form" action="/users_verification" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="username">اسم المستخدم:</label>
          <input type="text" id="username" name="username" required>
        </div> -->

    <h6 class="error_mseage"> <?= !empty($errors['username']) ? 'خطاء : ' . $errors['username'] : '' ?></h6>
    <!-- <section class="user"> -->

      <!-- <div class="modal-content"> -->
      <h1>تسجيل مستخدم جديد</h1>
      <form class="group" id="register-user-form" action="/users_verification" method="post" enctype="multipart/form-data">
        <div class="form-group box_h">
          <label for="username">اسم المستخدم:</label>
          <input type="text" id="username" name="username" required>
        </div>

        <!-- <div class="form-group">
              <label for="password">كلمة المرور:</label>
              <input type="password" id="password" name="password" required>
              <h6 class="error_mseage"> <?= !empty($errors['password']) ? 'خطاء : ' . $errors['password'] : '' ?></h6>
            </div> -->

        <div class="form-group box_h">
          <label for="password">كلمة المرور:</label>
          <input type="password" id="password" name="password" required>

        </div>

        <!-- 
            <div class="form-group">
              <label for="email">البريد الإلكتروني:</label>
              <input type="email" id="email" name="email" required>
              <h6 class="error_mseage"> <?= !empty($errors['email']) ? 'خطاء : ' . $errors['email'] : '' ?></h6>
            </div> -->

        <div class="form-group box_h">
          <label for="email">البريد الإلكتروني:</label>
          <input type="email" id="email" name="email" required>
          <h6 class="error_mseage"> <?= !empty($errors['email']) ? 'خطاء : ' . $errors['email'] : '' ?></h6>
        </div>

        <!-- 
            <div class="form-group">
              <label for="type">نوع المستخدم:</label>
              <select id="type" name="type">
                <option value="normal">عادي</option>
                <option value="admin">مسؤول</option>
                <option value="manager">مدير</option>
              </select>
              <h6 class="error_mseage"> <?= !empty($errors['type']) ? 'خطاء : ' . $errors['type'] : '' ?></h6>
            </div> -->

        <!-- <div class="form-group box_h">
          <label for="type">نوع المستخدم:</label>
          <select id="type" name="type">
            <option value="normal">عادي</option>
            <option value="admin">مسؤول</option>
            <option value="manager">مدير</option>
          </select>
        </div> -->

        <!-- 
            <div class="form-group">
              <label for="country">الدولة:</label>
              <input type="text" id="country" name="country" required>
              <h6 class="error_mseage"> <?= !empty($errors['country']) ? 'خطاء : ' . $errors['country'] : '' ?></h6>
            </div> -->

        <div class="form-group box_h">
          <label for="country">الدولة:</label>
          <input type="text" id="country" name="country" required>
        </div>


        <!-- <div class="form-group">
              <label for="city">المدينة:</label>
              <input type="text" id="city" name="city" required>
              <h6 class="error_mseage"> <?= !empty($errors['city']) ? 'خطاء : ' . $errors['city'] : '' ?></h6>

            </div> -->

        <div class="form-group box_h">
          <label for="city">المدينة:</label>
          <input type="text" id="city" name="city" required>
        </div>

        <!-- <div class="form-group">
              <label for="street">الشارع:</label>
              <input type="text" id="street" name="street" required>
              <h6 class="error_mseage"> <?= !empty($errors['street']) ? 'خطاء : ' . $errors['street'] : '' ?></h6>
            </div> -->

        <div class="form-group box_h">
          <label for="street">الشارع:</label>
          <input type="text" id="street" name="street" required>
        </div>

        <!-- 
            <div class="form-group">
              <label for="phone">رقم الهاتف:</label>
              <input type="text" id="phone" name="phone" required>
              <h6 class="error_mseage"> <?= !empty($errors['phone']) ? 'خطاء : ' . $errors['phone'] : '' ?></h6>
            </div> -->

        <div class="form-group box_h">
          <label for="phone">رقم الهاتف:</label>
          <input type="text" id="phone" name="phone" required>
        </div>

        <!-- <div class="form-group">
              <label for="photo">صورة المستخدم:</label>
              <input type="file" id="photo" name="photo" accept="image/*">
              <h6 class="error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : ' . $errors['photo'] : '' ?></h6>
            </div> -->

        <div class="form-group box_h">
          <label for="photo">صورة المستخدم:</label>
          <input type="file" id="photo" name="photo" accept="image/*">
        </div>

        <!-- <div class="form-group">
              <label for="notifications">استقبال الإشعارات:</label>
              <input type="checkbox" id="notifications" name="notifications" checked>
              <label for="notifications">نعم</label>
              <h6 class="error_mseage"> <?= !empty($errors['notifications']) ? 'خطاء : ' . $errors['notifications'] : '' ?></h6>

            </div> -->

        <div class="form-group box_h">
          <label for="notifications">استقبال الإشعارات:</label>
          <input type="checkbox" id="notifications" name="notifications" checked>
        </div>
        <div class="form-group box_h">
          <button type="submit" name="submit" aria-label="تسجيل مستخدم">تسجيل مستخدم</button>
        </div>
      </form>
      <!-- </div> -->

    </section>
</main>
<?php require('views/parts/footer.php') ?>