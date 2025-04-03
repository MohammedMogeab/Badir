<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
<div class="div_tbr3"> 
        <section class="donation-form">
            <h2>نموذج تقديم طلب التبرع</h2>
            <form id="donationForm" action="/charity_projects_store" method="POST" enctype="multipart/form-data">
                <!-- نوع الحالة -->
                <div class="form-group">
                    <label for="caseType">نوع الحالة:</label>
                    <select id="caseType" name="caseType" required>
                        <option value="">اختر نوع الحالة</option>
                        <option value="سجين">سجين</option>
                        <option value="أرملة">أرملة</option>
                        <option value="مريض">مريض</option>
                        <option value="كفالة يتيم">كفالة يتيم</option>
                        <option value="مشرد">مشرد</option>
                    </select>
                </div>

                   <!--  اضافة حقول مخفيه كي تظابق قاعدة البيانات  -->
                   <input type="hidden" name="category_id" value="0">
                   <input type="hidden" name="partner_id" value="0">
                    <input type="hidden" name="state" value="0">
  
                <!-- الاسم الكامل -->
                <div class="form-group">
                    <label for="fullName">الاسم الكامل:</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>

                <!-- العمر -->
                <div class="form-group">
                    <label for="age">العمر:</label>
                    <input type="number" id="age" name="age" min="1" max="120" required>
                </div>

                <!-- الظروف -->
                <div class="form-group">
                    <label for="circumstances">الظروف:</label>
                    <textarea id="circumstances" name="circumstances" rows="4" required></textarea>
                </div>

                <!-- المبلغ المطلوب -->
                <div class="form-group">
                    <label for="amount">المبلغ المطلوب:</label>
                    <input type="number" id="amount" name="amount" min="1" required>
                </div>

                <!-- المستندات الداعمة -->
                <div class="form-group">
                    <label for="documents">المستندات الداعمة:</label>
                    <input type="file" id="documents" name="documents" multiple required>
                </div>

                <!-- صور البطاقة الشخصية -->
                <div class="form-group">
                    <label for="idFront">صورة البطاقة الشخصية (من الأمام):</label>
                    <input type="file" id="idFront" name="idFront" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="idBack">صورة البطاقة الشخصية (من الخلف):</label>
                    <input type="file" id="idBack" name="idBack" accept="image/*" required>
                </div>

                <!-- معلومات الحساب -->
                <div class="form-group">
                    <label for="accountNumber">رقم الحساب:</label>
                    <input type="text" id="accountNumber" name="accountNumber" required>
                </div>
                <div class="form-group">
                    <label for="bankName">اسم البنك:</label>
                    <input type="text" id="bankName" name="bankName" required>
                </div>
                <div class="form-group">
                    <label for="accountType">نوع الحساب:</label>
                    <input type="text" id="accountType" name="accountType" required>
                </div>

                <!-- زر التأكيد -->
                <div class="form-group">
                    <button type="submit">تقديم الطلب</button>
                </div>
            </form>
        </section>

        <!-- عرض حالة الطلب -->
        </div>
   
   <section class="request-status">
    <div>
            <h2>حالة الطلب</h2>
            <p id="statusMessage" style=" color: var(--font-color-bl);">حالة الطلب: قيد الانتظار</p>
            <button id="editButton" disabled>تعديل البيانات (الوقت المتبقي: <span id="timer">24:00:00</span>)</button>
        </section>
        </div>
</main>
<?php require('views/parts/footer.php') ?>