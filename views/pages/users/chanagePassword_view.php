<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>

<main class="main_user">
  <!-- عرض حساب المستخدم -->
  <section  class="user" id="show_user">
    <h1>تغير كلمة المرور</h1>
    <div class="group">
      
      <form action="/users_changePassword" method="POST">
      <div class="box_h">
        <div class="box_h">
        <label for="email">البريدالإلكتروني :</label>
        <input id="email" type="email" name="email" placeholder="البريدالإلكتروني"  require>
       </div>
        <div class="box_h">
        <label for="new_password">كلمة المرور الجديدة</label>
        <input id="phone_number" type="text" name="new_password" placeholder=" كلمة المرور الجديدة" require >
        </div>
        <div>
        <label for="confirm_password"> تاكيد كلمة المرور</label>
        <input id="name" type="text" name="confirm_password" placeholder=" تاكيد كلمة المرور" require></div>
        </div>
        <button class="btn_chang_password" id="btn_chang_password" name="btn_chang_password" aria-label="تغيير كلمة المرور">تغيير كلمة المرور </button>
        </form>
    
      
    </div>
    </div>

    



  </section>
</main>

<?php require('views/parts/footer.php') ?>