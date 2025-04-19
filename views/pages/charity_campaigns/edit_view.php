<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php $errors = ($_SESSION['errors'] ?? '' ) ; unset($_SESSION['errors']) ; ?>



<main class="main_create_chatity">
    <div class="div_tbr3">
        <section class="donation-form">
            <div class="modal-content">
                <h2><?= isset($campaign) ? "تعديل الحملة" : "إضافة حملة جديدة" ?></h2>
                <form id="add-campaign-form" action="/charity_campaigns_update" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                    
                    <?php if (isset($campaign)): ?>
                        <input type="hidden" name="campaign_id" value="<?= $campaign['campaign_id'] ?>">
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label for="category_id">فئة الحملة:</label>
                        <select id="category_id" name="category_id" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['category_id'] ?>"
                                    <?= isset($campaign) && $campaign['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <h6 class = "error_mseage"> <?= !empty($errors['category_id']) ? 'خطاء : '. $errors['category_id'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="partner_id">الشريك:</label>
                        <select id="partner_id" name="partner_id" required>
                            <?php foreach ($partners as $partner): ?>
                                <option value="<?= $partner['partner_id'] ?>"
                                    <?= isset($campaign) && $campaign['partner_id'] == $partner['partner_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($partner['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <h6 class = "error_mseage"> <?= !empty($errors['partner_id']) ? 'خطاء : '. $errors['partner_id'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">اسم الحملة:</label>
                        <input type="text" id="name" name="name" required 
                            value="<?= htmlspecialchars($campaign['name'] ?? '') ?>">
                        <h6 class = "error_mseage"> <?= !empty($errors['name']) ? 'خطاء : '. $errors['name'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="short_description">وصف قصير:</label>
                        <textarea id="short_description" name="short_description" rows="2" required><?= htmlspecialchars($campaign['short_description'] ?? '') ?></textarea>
                        <h6 class = "error_mseage"> <?= !empty($errors['short_description']) ? 'خطاء : '. $errors['short_description'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="full_description">وصف كامل:</label>
                        <textarea id="full_description" name="full_description" rows="4" required><?= htmlspecialchars($campaign['full_description'] ?? '') ?></textarea>
                        <h6 class = "error_mseage"> <?= !empty($errors['full_description']) ? 'خطاء : '. $errors['full_description'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="cost">التكلفة:</label>
                        <input type="number" step="0.01" id="cost" name="cost" required 
                            value="<?= htmlspecialchars($campaign['cost'] ?? '') ?>">
                        <h6 class = "error_mseage"> <?= !empty($errors['cost']) ? 'خطاء : '. $errors['cost'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="state">حالة الحملة:</label>
                        <select id="state" name="state">
                            <option value="active" <?= isset($campaign) && $campaign['state'] === 'active' ? 'selected' : '' ?>>نشطة</option>
                            <option value="stop" <?= isset($campaign) && $campaign['state'] === 'stop' ? 'selected' : '' ?>>متوقفة</option>
                            <option value="pause" <?= isset($campaign) && $campaign['state'] === 'pause' ? 'selected' : '' ?>>مؤقتة</option>
                            <option value="end" <?= isset($campaign) && $campaign['state'] === 'end' ? 'selected' : '' ?>>منتهية</option>
                        </select>
                        <h6 class = "error_mseage"> <?= !empty($errors['state']) ? 'خطاء : '. $errors['state'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="photo">صورة الحملة:</label>
                        <input type="file" id="photo" name="photo" accept="image/*">
                        <?php if (!empty($campaign['photo'])): ?>
                            <img src="uploads/<?= htmlspecialchars($campaign['photo']) ?>" alt="Campaign Photo" width="100">
                        <?php endif; ?>
                        <h6 class = "error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : '. $errors['photo'] : '' ?></h6>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="submit" aria-label="اضافة"><?= isset($campaign) ? "تحديث الحملة" : "إضافة الحملة"  ?></button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</main>

<?php require('views/parts/footer.php') ?>