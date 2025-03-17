<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

  <main>
    <div >
            <!-- عرض الرسائل -->
      <section calss="form_contact">
          
            <h1>الشكاوي والاقتراحات</h1>
            <div>
              <form action="" method="">
                <label for="type">:النوع</label><br>
                <div class="group_type">
                  <select name="" id=""></select>
                </div>
                <label for="address">:العنوان</label><br>
                <input id="address" type="text" name="address"><br>
                <label for="descripe_problem">:وصف المشكلة</label><br>
                <textarea name="descripe_problem"  id="descripe_problem"></textarea><br>
                <button class="button_send" id="button_send" type="submit">إرسال</button>
              </form>
            </div>
          

        

      </section>
      <!-- الاسئله الشائعه -->
      <section calss="form_contact">
        <h1>:الأسئلة الشائعة</h1>
          <div class="questu=ions">
            <h3>كيف يمكنني تعديل مساهمتي؟.</h3>
            <p>يمكنك تعديل مساهمتك من خلال صفحة التبرعات</p>
          </div>

      </section>
    </div>

  </main>
  <?php require('views/parts/footer.php') ?>