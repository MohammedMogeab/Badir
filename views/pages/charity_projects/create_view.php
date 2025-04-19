<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php $errors = ($_SESSION['errors'] ?? '' ) ; unset($_SESSION['errors']) ; ?>


<style>
    .phases-section {
    font-family: 'Arial', sans-serif;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.phases-section h2 {
    color: #2c3e50;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
    text-align: center;
}

.phase-input-container {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

#phaseInput {
    flex: 1;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    transition: border 0.3s;
}

#phaseInput:focus {
    border-color: #3498db;
    outline: none;
}

#addPhaseBtn {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    width: fit-content;
    height: inherit;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

#addPhaseBtn:hover {
    background-color: #2980b9;
}

.phases-list {
    margin-top: 20px;
}

.phase-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 15px;
    background-color: white;
    border: 1px solid #eee;
    border-radius: 4px;
    margin-bottom: 10px;
    animation: fadeIn 0.3s ease-out;
}

.phase-item:hover {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.phase-content {
    display: flex;
    align-items: center;
    flex: 1;
}

.phase-number {
    background-color: #3498db;
    color: white;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 10px;
    font-size: 14px;
}

.phase-text {
    flex: 1;
    color: #333;
}

.remove-phase {
    background-color: #e74c3c;
    color: white;
    border: none;
    width: fit-content;
    height: inherit;
    padding: 5px;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s;
}

.remove-phase:hover {
    background-color: #c0392b;
}

.no-phases {
    text-align: center;
    padding: 20px;
    color: #7f8c8d;
    border: 1px dashed #ddd;
    border-radius: 4px;
}

#phasesData {
    display: none;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

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
                             <?php foreach($partners as $partner):?>
                            <option value="<?= $partner['partner_id'] ?>"><?= $partner['name'] ?></option>
                            <?php endforeach?>
                            <!-- <option value="2">Partner 2</option> -->
                        </select>
                        <h6 class = "error_mseage"> <?= !empty($errors['partner_id']) ? 'خطاء : '. $errors['partner_id'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="category_id">الفئة:</label>
                        <select id="category_id" name="category_id" required>
                            <!-- Dynamic Category List -->
                            <!-- Example: -->
                             <?php foreach($categories as $category):?>
                            <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach?>
                            <!-- <option value="2">Category 2</option> -->
                        </select>
                        <h6 class = "error_mseage"> <?= !empty($errors['category_id']) ? 'خطاء : '. $errors['category_id'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="name">اسم المشروع:</label>
                        <input type="text" id="name" name="name" required>
                        <h6 class = "error_mseage"> <?= !empty($errors['name']) ? 'خطاء : '. $errors['name'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="beneficiaries_count">عدد المستفيدين:</label>
                        <input type="number" id="beneficiaries_count" name="beneficiaries_count" required>
                        <h6 class = "error_mseage"> <?= !empty($errors['beneficiaries_count']) ? 'خطاء : '. $errors['beneficiaries_count'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="short_description">وصف قصير:</label>
                        <textarea id="short_description" name="short_description" rows="3" required></textarea>
                        <h6 class = "error_mseage"> <?= !empty($errors['short_description']) ? 'خطاء : '. $errors['short_description'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="full_description">الوصف الكامل:</label>
                        <textarea id="full_description" name="full_description" rows="5" required></textarea>
                        <h6 class = "error_mseage"> <?= !empty($errors['full_description']) ? 'خطاء : '. $errors['full_description'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="cost">التكلفة:</label>
                        <input type="number" step="0.01" id="cost" name="cost" required>
                        <h6 class = "error_mseage"> <?= !empty($errors['cost']) ? 'خطاء : '. $errors['cost'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="country">الدولة:</label>
                        <input type="text" id="country" name="country" required>
                        <h6 class = "error_mseage"> <?= !empty($errors['country']) ? 'خطاء : '. $errors['country'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="city">المدينة:</label>
                        <input type="text" id="city" name="city" required>
                        <h6 class = "error_mseage"> <?= !empty($errors['city']) ? 'خطاء : '. $errors['city'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="street">الشارع:</label>
                        <input type="text" id="street" name="street" required>
                        <h6 class = "error_mseage"> <?= !empty($errors['street']) ? 'خطاء : '. $errors['street'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <h2>مراحل المشروع</h2>
                        <div class="phase-input-container">
                            <input type="text" id="phaseInput" placeholder="أدخل اسم المرحلة">
                            <button type="button" id="addPhaseBtn">إضافة مرحلة</button>
                        </div>
                        <div class="phases-list" id="phasesList">
                            <div class="no-phases">لا توجد مراحل مضافة بعد</div>
                        </div>
                        <!-- حقل مخفي لتخزين البيانات -->
                        <input type="hidden" id="phasesData" name="levels">

                    </div>
                    <div class="form-group">
                        <label for="level">المرحلة الحالية:</label>
                        <select id="levelselect" name="level">
                        </select>
                        <h6 class = "error_mseage"> <?= !empty($errors['level']) ? 'خطاء : '. $errors['level'] : '' ?></h6>
                    </div>

                    <div class="form-group">
                        <label for="photo">صورة المشروع:</label>
                        <input type="file" id="photo" name="photo" accept="image/*">
                        <h6 class = "error_mseage"> <?= !empty($errors['photo']) ? 'خطاء : '. $errors['photo'] : '' ?></h6>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" aria-label="اضافة">إضافة المشروع</button>
                    </div>
                </form>
            </div>

        </section>
        
        <!-- عرض حالة الطلب -->
    </div>

    </div>
</main>
<script src="views/javascrept/levels.js"></script>
<?php require('views/parts/footer.php') ?>