<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php $errors = ($_SESSION['errors'] ?? '' ) ; unset($_SESSION['errors']) ; ?>

  
<main class="main_create_chatity">
    <div class="div_tbr3"> 
  <section class="donation-form">
  <div class="modal-content">
    <h2>إضافة وقف جديد</h2>
    <form id="add-endowment-form" action="/islamic_endowments_store" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="category_id">فئة الحملة:</label>
            <select id="category_id" name="category_id" required>
                <!-- Dynamic Category List -->
                <!-- Example: -->
                <?php foreach ($categories as $category): ?>
                <option value="<?= $category['category_id']?>"><?=$category['name']; ?></option>
                <?php endforeach;?>
            </select>
            <h6 class = "error_mseage"> <?= !empty($errors['category_id']) ? 'خطاء : '. $errors['category_id'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="partner_id">الشريك:</label>
            <select id="partner_id" name="partner_id" required>
                <!-- Dynamic Partner List -->
                <!-- Example: -->
                <?php foreach ($partners as $partner): ?>
                <option value="<?= $partner['partner_id']?>"><?=$partner['name']; ?></option>
                <?php endforeach;?>
            </select>
            <h6 class = "error_mseage"> <?= !empty($errors['partner_id']) ? 'خطاء : '. $errors['partner_id'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="name">اسم الوقف:</label>
            <input type="text" id="name" name="name" required>
            <h6 class = "error_mseage"> <?= !empty($errors['name']) ? 'خطاء : '. $errors['name'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="short_description">وصف قصير:</label>
            <textarea id="short_description" name="short_description" rows="3" required></textarea>
            <h6 class = "error_mseage"> <?= !empty($errors['short_description']) ? 'خطاء : '. $errors['short_description'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="full_description">الوصف الكامل:</label>
            <textarea id="full_description" name="full_description" rows="5" required></textarea>
            <h6 class="error_mseage"> <?= !empty($errors['full_description']) ? 'خطاء : '. $errors['full_description'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="cost">التكلفة:</label>
            <input type="number" step="0.01" id="cost" name="cost" required>
            <h6 class = "error_mseage"> <?= !empty($errors['cost']) ? 'خطاء : '. $errors['cost'] : '' ?></h6>
        </div>
        <div class="form-group">
            <label for="photo">صورة الوقف:</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <h6 class = "error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : '. $errors['photo'] : '' ?></h6>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" aria-label="اضافة">إضافة الوقف</button>
        </div>
    </form>
</div>

  </section>
</div>
</main>
<?php require('views/parts/footer.php') ?>