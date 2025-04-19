<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php $errors = ($_SESSION['errors'] ?? '' ) ; unset($_SESSION['errors']) ; ?>


<main>
    <section class="form_executive_partners">
        <div id="add-partner-modal" class="modal">
            <div class="modal-content">
                <h2><?= isset($partner) ? "تعديل الشريك" : "إضافة شريك جديد" ?></h2>

                <form id="add-partner-form" action="/executive_partners_update" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                    <!-- Hidden Field for Partner ID if Editing -->
                    <?php if (isset($partner)): ?>
                        <input type="hidden" name="partner_id" value="<?= htmlspecialchars($partner['partner_id']) ?>">
                        <h6 class="error_mseage"> <?= !empty($errors['partner_id']) ? 'خطاء : '. $errors['partner_id'] : '' ?></h6>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="name">اسم الشريك:</label>
                        <input type="text" id="name" name="name" required value="<?= isset($partner) ? htmlspecialchars($partner['name']) : '' ?>">
                        <h6 class="error_mseage"> <?= !empty($errors['name']) ? 'خطاء : '. $errors['name'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="description">الوصف:</label>
                        <textarea id="description" name="description" rows="2" required><?= isset($partner) ? htmlspecialchars($partner['description']) : '' ?></textarea>
                        <h6 class="error_mseage"> <?= !empty($errors['description']) ? 'خطاء : '. $errors['description'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="more_information">معلومات إضافية:</label>
                        <textarea id="more_information" name="more_information" rows="2"><?= isset($partner) ? htmlspecialchars($partner['more_information']) : '' ?></textarea>
                        <h6 class="error_mseage"> <?= !empty($errors['more_information']) ? 'خطاء : '. $errors['more_information'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني:</label>
                        <input type="email" id="email" name="email" required value="<?= isset($partner) ? htmlspecialchars($partner['email']) : '' ?>">
                        <h6 class="error_mseage"> <?= !empty($errors['email']) ? 'خطاء : '. $errors['email'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="directorate">المديرية:</label>
                        <input type="text" id="directorate" name="directorate" required value="<?= isset($partner) ? htmlspecialchars($partner['directorate']) : '' ?>">
                        <h6 class="error_mseage"> <?= !empty($errors['directorate']) ? 'خطاء : '. $errors['directorate'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="country">الدولة:</label>
                        <input type="text" id="country" name="country" required value="<?= isset($partner) ? htmlspecialchars($partner['country']) : '' ?>">
                        <h6 class="error_mseage"> <?= !empty($errors['country']) ? 'خطاء : '. $errors['country'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="city">المدينة:</label>
                        <input type="text" id="city" name="city" required value="<?= isset($partner) ? htmlspecialchars($partner['city']) : '' ?>">
                        <h6 class="error_mseage"> <?= !empty($errors['city']) ? 'خطاء : '. $errors['city'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="street">الشارع:</label>
                        <input type="text" id="street" name="street" required value="<?= isset($partner) ? htmlspecialchars($partner['street']) : '' ?>">  
                        <h6 class ="error_mseage"> <?= !empty($errors['street']) ? 'خطاء : '. $errors['street'] : '' ?></h6>    
                    </div>

                    <div class="form-group">
                        <label for="phone">رقم الهاتف:</label>
                        <input type="text" id="phone" name="phone" required value="<?= isset($partner) ? htmlspecialchars($partner['phone']) : '' ?>">
                        <h6 class="error_mseage"> <?= !empty($errors['phone']) ? 'خطاء : '. $errors['phone'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="photo">صورة الشريك:</label>
                        <input type="file" id="photo" name="photo" accept="image/*">
                        <?php if (isset($partner['photo']) && !empty($partner['photo'])): ?>
                            <img src="uploads/<?= htmlspecialchars($partner['photo']) ?>" alt="Partner Photo" width="100">
                        <?php endif; ?>
                        <h6 class="error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : '. $errors['photo'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" aria-label="اضافة"><?= isset($partner) ? "تحديث الشريك" : "إضافة شريك" ?></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php require('views/parts/footer.php') ?>