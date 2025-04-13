<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_create_chatity">
    <div class="div_tbr3">
        <section class="donation-form">
            <div class="modal-content">
                <h2>إضافة مشروع جديد</h2>
                <form id="add-project-form" action="/charity_projects_store" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="partner_id">الشريك:</label>
                        <select id="partner_id" name="partner_id" required>
                            <!-- Dynamic Partner List -->
                            <!-- Example: -->
                            <option value="1">Partner 1</option>
                            <option value="2">Partner 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">الفئة:</label>
                        <select id="category_id" name="category_id" required>
                            <!-- Dynamic Category List -->
                            <!-- Example: -->
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">اسم المشروع:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="short_description">وصف قصير:</label>
                        <textarea id="short_description" name="short_description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="full_description">الوصف الكامل:</label>
                        <textarea id="full_description" name="full_description" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="cost">التكلفة:</label>
                        <input type="number" step="0.01" id="cost" name="cost" required>
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
                        <label for="photo">صورة المشروع:</label>
                        <input type="file" id="photo" name="photo" accept="image/*">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit">إضافة المشروع</button>
                    </div>
                </form>
            </div>

        </section>

        <!-- عرض حالة الطلب -->
    </div>

    </div>
</main>
<?php require('views/parts/footer.php') ?>