<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>

<main class="main_user">
  <section class="user" id="form_login">
    <h1>تسجيل الدخول</h1>
      <form class="group" action="/sessions_store" method="post">
      <div class="box_h">
        <label for="email"> : البريدالإلكتروني</label>
        <input id="email" type="text" name="email" placeholder="البريدالالكتروني" require>
      </div>
      <div class="box_h">
        <label for="password">ادخل كلمة المرور : </label>
        <input id="password" type="password" name="password" placeholder="كلمة المرور" require>
      </div>
        <button class="btn_log_in" id="btn_log_in" aria-label="تسجيل دخول" require >تسجيل دخول</button>
        <div class="link_forgot_password_link_log_in">
      </div>
      </form>
        
        <a class="link_forgot_password" id="link_forgot_password" href="/users_changePassword_view">هل نسيت كلمةالمرور ؟</a>
        <a class="link_log_in" id="link_log_in" href="/users_create">انشاءحساب</a>
  
  </section>
</main>
<?php require('views/parts/footer.php') ?>

