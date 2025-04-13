<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
    <section class="form_executive_partners">
        <form action="/executive_partners_store" method="post" enctype="multipart/form-data">
            <div id="add-partner-modal" class="modal">

                <div class="modal-content">
                    <h2>إضافة شريك جديد</h2>

                    <form id="add-partner-form" action="/executive_partners_store" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">اسم الشريك:</label>
                        <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                        <label for="description">الوصف:</label>
                        <textarea id="description" name="description" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                        <label for="more_information">معلومات إضافية:</label>
                        <textarea id="more_information" name="more_information" rows="2"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="email">البريد الإلكتروني:</label>
                        <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                        <label for="directorate">المديرية:</label>
                        <input type="text" id="directorate" name="directorate" required>
                        </div>
                        <div class="form-group">
                        <label for="country">الدولة:</label>
                        <input type="text" id="country" name="country" required>
                        </div>
                        <div class="form-group">
                        <label for="city">المدينة:</label>
                        <input type="text" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                        <label for="street">الشارع:</label>
                        <input type="text" id="street" name="street" required>
                        </div>
                        <div class="form-group">
                        <label for="phone">رقم الهاتف:</label>
                        <input type="text" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                        <label for="photo">صورة الشريك:</label>
                        <input type="file" id="photo" name="photo" accept="image/*" required>
                        </div>
                        <div class="form-group">
                        <button type="submit" name="submit">إضافة شريك</button>
                        </div>
                    </form>
</div>
    </section>
</main>
<?php require('views/parts/footer.php') ?>