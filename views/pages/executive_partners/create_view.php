<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section class="form_executive_partners">
  <div id="add-partner-modal" class="modal">
            <div class="modal-content">
                <h2>إضافة شريك جديد</h2>
                <form id="add-partner-form">
                    <div class="form-group">
                        <label for="partner-name">اسم الشريك:</label>
                        <input type="text" id="partner-name" required>
                    </div>
                    <div class="form-group">
                        <label for="partner-region">المدينة:</label>
                        <input type="text" id="partner-region" required>
                    </div>
                    <div class="form-group">
                        <label for="partner-email">البريد الإلكتروني:</label>
                        <input type="email" id="partner-email" required>
                    </div>
                    <div class="form-group">
                        <label for="partner-description">عرف نفسك:</label>
                        <textarea id="partner-description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="partner-contact">بيانات التواصل الإضافية:</label>
                        <textarea id="partner-contact" rows="4" required></textarea>
                    </div>
                    <button type="submit">إضافة</button>
                </form>
            </div>
            <div class="ash3t">
            <div class="form-group" id="form-group">
              <img src="" alt="">
                        <label for="partner-logo">الشعار:</label>
                        <input type="file" id="partner-logo" accept="image/*" required>
                    </div></div>
        </div>
    
  </section>
</main>
<?php require('views/parts/footer.php') ?>