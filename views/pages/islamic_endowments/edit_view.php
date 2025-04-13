<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_create_chatity">
  <div class="div_tbr3"> 
    <section class="donation-form">
      <div class="modal-content">
        <h2>إضافة وقف جديد</h2>
        <form id="add-endowment-form" action="/islamic_endowments_update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="notification_id" value="<?= htmlspecialchars($endowment['notification_id']) ?>">
          <div class="form-group">
            <label for="category_id">الفئة:</label>
            <select id="category_id" name="category_id" required>
              <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['category_id']) ?>"
                  <?= $endowment['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($category['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="partner_id">الشريك:</label>
            <select id="partner_id" name="partner_id" required>
              <?php foreach ($partners as $partner): ?>
                <option value="<?= htmlspecialchars($partner['partner_id']) ?>"
                  <?= $endowment['partner_id'] == $partner['partner_id'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($partner['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="name">اسم الوقف:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($endowment['name'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="short_description">وصف قصير:</label>
            <textarea id="short_description" name="short_description" rows="3" required><?= htmlspecialchars($endowment['short_description'] ?? '') ?></textarea>
          </div>
          <div class="form-group">
            <label for="full_description">الوصف الكامل:</label>
            <textarea id="full_description" name="full_description" rows="5" required><?= htmlspecialchars($endowment['full_description'] ?? '') ?></textarea>
          </div>
          <div class="form-group">
            <label for="cost">التكلفة:</label>
            <input type="number" step="0.01" id="cost" name="cost" value="<?= htmlspecialchars($endowment['cost'] ?? '') ?>" required>
          </div>
          <div class="form-group">
            <label for="photo">صورة الوقف:</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <?php if (!empty($endowment['photo'])): ?>
              <img src="uploads/<?= htmlspecialchars($endowment['photo']) ?>" alt="صورة الوقف" width="100">
            <?php endif; ?>
          </div>
          <div class="form-group">
            <button type="submit" name="submit">إضافة الوقف</button>
          </div>
        </form>
      </div>
    </section>
  </div>
</main>

<?php require('views/parts/footer.php') ?>