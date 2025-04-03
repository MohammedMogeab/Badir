<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section>
    <h1>تسجيل الدخول</h1>
    <div class="log_in">
      <form action="" method="">
        <label for="email_or_name">:ادخل اسمك أو بريدك الالكتروني</label><br>
        <input id="email_or_name" type="text" name="email_log_in" placeholder="الاسم أوالبريدالالكتروني"><br>
        <label for="password">:ادخل كلمةالمرور</label><br>
        <input id="password" type="password" name="password" placeholder="كلمة المرور"><br>
        <button class="btn_log_in" id="btn_log_in" type="submit">تسجيل</button>
        <a class="link_forgot_password" id="link_forgot_password" href="">هل نسيت كلمةالمرور؟</a>
        <a class="link_log_in" id="link_log_in" href="">تسجيل الدخول</a>
        
      </form>
    </div>
  
  </section>
</main>
<?php require('views/parts/footer.php') ?>