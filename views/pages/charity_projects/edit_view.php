<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_create_chatity">
    <div class="div_tbr3">
        <section class="donation-form">
            <div class="modal-content">
                <h2><?= isset($project) ? "تعديل المشروع" : "إضافة مشروع جديد" ?></h2>
                <form id="add-project-form" action="/charity_projects_update" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                    <!-- If editing an existing project, include the project_id as a hidden field -->
                    <?php if (isset($project)): ?>
                        <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="partner_id">الشريك:</label>
                        <select id="partner_id" name="partner_id" required>
                            <?php foreach ($partners as $partner): ?>
                                <option value="<?= $partner['partner_id'] ?>"
                                    <?= isset($project) && $project['partner_id'] == $partner['partner_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($partner['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category_id">الفئة:</label>
                        <select id="category_id" name="category_id" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['category_id'] ?>"
                                    <?= isset($project) && $project['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">اسم المشروع:</label>
                        <input type="text" id="name" name="name" required value="<?= isset($project) ? htmlspecialchars($project['name']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="short_description">وصف قصير:</label>
                        <textarea id="short_description" name="short_description" rows="3" required><?= isset($project) ? htmlspecialchars($project['short_description']) : '' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="full_description">الوصف الكامل:</label>
                        <textarea id="full_description" name="full_description" rows="5" required><?= isset($project) ? htmlspecialchars($project['full_description']) : '' ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="cost">التكلفة:</label>
                        <input type="number" step="0.01" id="cost" name="cost" required value="<?= isset($project) ? htmlspecialchars($project['cost']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="country">الدولة:</label>
                        <input type="text" id="country" name="country" required value="<?= isset($project) ? htmlspecialchars($project['country']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="city">المدينة:</label>
                        <input type="text" id="city" name="city" required value="<?= isset($project) ? htmlspecialchars($project['city']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="street">الشارع:</label>
                        <input type="text" id="street" name="street" required value="<?= isset($project) ? htmlspecialchars($project['street']) : '' ?>">
                    </div>

                    <div class="form-group">
                        <label for="photo">صورة المشروع:</label>
                        <input type="file" id="photo" name="photo" accept="image/*">
                        <?php if (isset($project['photo']) && !empty($project['photo'])): ?>
                            <img src="uploads/<?= htmlspecialchars($project['photo']) ?>" alt="Project Photo" width="100">
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit"><?= isset($project) ? "تحديث المشروع" : "إضافة المشروع" ?></button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</main>



<?php require('views/parts/footer.php') ?>