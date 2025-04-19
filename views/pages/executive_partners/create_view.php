<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php $errors = ($_SESSION['errors'] ?? '' ) ; unset($_SESSION['errors']) ; ?>


<main>
    <section class="form_executive_partners">
        <form action="/executive_partners_store" method="post" enctype="multipart/form-data">
            <div id="add-partner-modal" class="modal">

                <div class="modal-content">
                    <h1>إضافة شريك جديد</h1>

                    <div id="group">
                        <form id="add-partner-form" action="/executive_partners_store" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="partner_id">الشريك:</label>
                                <select id="partner_id" name="partner_id" required>
                                    <!-- Dynamic Partner List -->
                                    <!-- Example: -->
                                    <?php foreach ($partners as $partner): ?>
                                        <option value="<?= $partner['partner_id'] ?>"><?= $partner['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <h6 class="error_mseage"> <?= !empty($errors['partner_id']) ? 'خطاء : ' . $errors['partner_id'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="description">الوصف:</label>
                                <textarea id="description" name="description" rows="2" required></textarea>
                                <h6 class="error_mseage"> <?= !empty($errors['description']) ? 'خطاء : ' . $errors['description'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="more_information">معلومات إضافية:</label>
                                <textarea id="more_information" name="more_information" rows="2"></textarea>
                                <h6 class="error_mseage"> <?= !empty($errors['more_information']) ? 'خطاء : ' . $errors['more_information'] : '' ?></h6>
                            </div>

                            <div class="form-group">
                                <label for="email">البريد الإلكتروني:</label>
                                <input type="email" id="email" name="email" required>
                                <h6 class="error_mseage"> <?= !empty($errors['email']) ? 'خطاء : ' . $errors['email'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="directorate">المديرية:</label>
                                <input type="text" id="directorate" name="directorate" required>
                                <h6 class="error_mseage"> <?= !empty($errors['directorate']) ? 'خطاء : ' . $errors['directorate'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="country">الدولة:</label>
                                <input type="text" id="country" name="country" required>
                                <h6 class="error_mseage"> <?= !empty($errors['country']) ? 'خطاء : ' . $errors['country'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="city">المدينة:</label>
                                <input type="text" id="city" name="city" required>
                                <h6 class="error_mseage"> <?= !empty($errors['city']) ? 'خطاء : ' . $errors['city'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="street">الشارع:</label>
                                <input type="text" id="street" name="street" required>
                                <h6 class="error_mseage"> <?= !empty($errors['street']) ? 'خطاء : ' . $errors['street'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="phone">رقم الهاتف:</label>
                                <input type="text" id="phone" name="phone" required>
                                <h6 class="error_mseage"> <?= !empty($errors['phone']) ? 'خطاء : ' . $errors['phone'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <label for="photo">صورة الشريك:</label>
                                <input type="file" id="photo" name="photo" accept="image/*" required>
                                <h6 class="error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : ' . $errors['photo'] : '' ?></h6>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" aria-label="اضافة">إضافة شريك</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</main>
<?php require('views/parts/footer.php') ?>