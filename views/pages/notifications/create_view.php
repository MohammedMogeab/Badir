<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section class="form_notifications">
    <div class="image">
      <img class="image" src="" alt="">
      <div>
        <button class="btn_image" id="btn_image" name="btn_image">إضافةصورة</button>
        <img class="camera" id="camera" src="" alt="">
        <img class="folder" id="folder" src="" alt="">
      </div>
    </div>
    <div class="data">
      <form action="" method="">
        <label for="project_name">إسم المشروع</label>
        <input id="project_name" type="text" name="project_name" placeholder="أدخل إسم المشروع"><br>
        <label for="amount">المبلغ المستهدف</label>
        <input id="amount" type="number" name="amount" placeholder=""><br>
        <label for="duration">مدةالمشروع</label>
        <input id="duration" type="text" name="duration" placeholder=""><br>
        <label for="brief_explan">شرح مختصر</label>
        <input id="brief_explan" type="text" name="brief_explan" placeholder=""><br>
        <label for="full_explan">شرح مكتمل</label>
        <textarea id="full_explan" name="full_explan" ></textarea><br>
        <label for="implementing_agency">الجهةالمنفذة</label>
        <select name="implementing_agency" id="implementing_agency">
          <option value=""></option>
        </select>
        <label for="implement_stages">مراحل التنفيذ</label>
        <select name="implement_stages" id="implement_stages">
          <option value=""></option>
        </select>
        <label for="type_project">نوع المشروع</label>
        <input id="type_project" type="text" name="type_project" list="type_project_list" placeholder="">
          <datalist id="type_project_list">
            <option value=""></option>

          </datalist>
        <label for="project_location">موقع المشروع</label>
        <select name="project_location" id="project_location">
          <option value=""></option>
        </select>
        <label for="stage">المراحل التي يمر بها المشروع</label>
        <input id="stage" type="text" name="stage" list="stage_list" placeholder="">
          <datalist id="stage_list">
            <option value=""></option>

          </datalist>
          <button id="reporting" name="reporting">رفع التقارير</button>
      </form>
    </div>
    <div class="button">
      <button class="confirmation" id="confirmation" name="confirmation">تأكيد</button>
      <button class="cancel" id="cancel" name="cancel">إلغاء</button>
    </div>
    
  </section>
</main>
<?php require('views/parts/footer.php') ?>