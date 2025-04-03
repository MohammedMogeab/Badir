<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_cart_view">
        <!-- قائمة المشاريع -->
        <h2>سلة التبرعات</h2>

         <div class="div_cart_view">
        <section class="projects-list">
            <h2>المشاريع المتاحة</h2>
            <div class="project">
                <img src="project1.jpg" alt="مشروع 1">
                <div class="project-details">
                    <h3>مشروع بناء مدرسة</h3>
                    <p>وصف قصير عن المشروع الأول.</p>
                    <p><strong>نوع المشروع:</strong> تعليمي</p><div class="input_delet">

                    <input type="number" class="amount" placeholder="المبلغ (بالريال)" min="1">
                    <button class="add-to-cart">ازاله</button></div>
                </div>
            </div>

            <div class="project">
                <img src="project2.jpg" alt="مشروع 2">
                <div class="project-details">
                    <h3>مشروع علاج طفل</h3>
                    <p>وصف قصير عن المشروع الثاني.</p>
                    <p><strong>نوع المشروع:</strong> صحي</p>
                    <div class="input_delet">
                    <input type="number" class="amount" placeholder="المبلغ (بالريال)" min="1">
                    <button class="add-to-cart">ازاله</button>
                    </div>
                </div>
            </div>

            <div class="project">
                <img src="project3.jpg" alt="مشروع 3">
                <div class="project-details">
                    <h3>مشروع إغاثة عاجلة</h3>
                    <p>وصف قصير عن المشروع الثالث.</p>
                    <p><strong>نوع المشروع:</strong> إغاثة</p><div class="input_delet">

                    <input type="number" class="amount" placeholder="المبلغ (بالريال)" min="1">
                    <button class="add-to-cart">ازاله</button></div>
                </div>
            </div>
        </section>
        </div>

        <!-- سلة التبرعات -->
         <div class="center-cart">
        <section class="donation-cart">
            <div id="cart-items">
                <!-- العناصر المضافة إلى السلة تظهر هنا -->
            </div>
            <div class="total-amount">
                <label for="total">المبلغ الإجمالي:</label>
                <input type="text" id="total" value="0 ريال" readonly>
            </div>
            <div class="cart-actions">
                <button id="donate-now">تبرع الآن</button>
                <button id="clear-cart">إفراغ السلة</button>
            </div>
        </section>
        </div>
    </main>


<?php require('views/parts/footer.php') ?>