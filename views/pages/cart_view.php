<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_cart_view">
    <div class="div_cart_view">

    <label for="donation-cart" class="section-label visually-hidden">سلة التبرعات</label>

        <section id="donation-cart" class="projects-list">
            <!-- قائمة المشاريع -->
            <h2>سلة التبرعات</h2>
            <h1>الحملات:</h1>
            <?php foreach ($campaigns as $campaign): ?>
                <div class="project">
                    <img src="views/media/images/<?= htmlspecialchars($campaign['photo'] ?? "11.png") ?>" alt=" حملة " loading="lazy">
                    <div class="project-details">
                        <h3>رقم الحملة :<?= htmlspecialchars($campaign['campaign_id']) ?></h3>
                        <h3>اسم الحمله :<?= htmlspecialchars($campaign['name']) ?></h3>
                        <p>وصف الحملة : <?= htmlspecialchars($campaign['short_description']) ?></p>
                        <p><strong>نوع المشروع:</strong> تعليمي</p>
                        <div class="input_delet">
                            <div class="donate-section">
                                <form action="/charity_campaigns_donate" method="post">
                                    <input class="inp" type="number" name="cost" placeholder="$">
                                    <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                                    <button type="submit" aria-label="تبرع الان">تبرع الأن</button>
                                </form>
                                <form action="/charity_campaigns_removcart" method="post">
                                    <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                                    <button type="submit" aria-label="ازالة">ازاله</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <h1>المشاريع:</h1>
            <?php foreach ($projects as $project): ?>
                <div class="project">
                <img src="views/media/images/<?= htmlspecialchars($project['photo'] ?? "11.png") ?>" alt=" حملة " loading="lazy">
                    <div class="project-details">
                        <h3>رقم الحملة :<?= htmlspecialchars($project['project_id']) ?></h3>
                        <h3>اسم الحمله :<?= htmlspecialchars($project['name']) ?></h3>
                        <p>وصف الحملة : <?= htmlspecialchars($project['short_description']) ?></p>
                        <p><strong>نوع المشروع:</strong> تعليمي</p>
                        <div class="input_delet">
                            <div class="donate-section">
                                <form action="/charity_projects_donate" method="post">
                                    <input class="inp" type="number" name="cost" placeholder="$">
                                    <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                                    <button type="submit" aria-label="تبرع الان">تبرع الأن</button>
                                </form>
                                <form action="/charity_projects_removcart" method="post">
                                    <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                                    <button type="submit" aria-label="ازالة">ازاله</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <h1>الاوقاف:</h1>
            <?php foreach ($endowments as $endowment): ?>
                <div class="project">
                <img src="views/media/images/<?= htmlspecialchars($endowment['photo'] ?? "11.png") ?>" alt=" حملة " loading="lazy">
                    <div class="project-details">
                        <h3>رقم الحملة :<?= htmlspecialchars($endowment['endowment_id']) ?></h3>
                        <h3>اسم الحمله :<?= htmlspecialchars($endowment['name']) ?></h3>
                        <p>وصف الحملة : <?= htmlspecialchars($endowment['short_description']) ?></p>
                        <p><strong>نوع المشروع:</strong> تعليمي</p>
                        <div class="input_delet">
                            <div class="donate-section">
                                <form action="/charity_endowments_donate" method="post">
                                    <input class="inp" type="number" name="cost" placeholder="$">
                                    <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($endowment['endowment_id']) ?>">
                                    <button type="submit" aria-label="تبرع الان">تبرع الأن</button>
                                </form>
                                <form action="/islamic_endowments_removcart" method="post">
                                    <input type="hidden" name="endowment_id" value="<?= htmlspecialchars($endowment['endowment_id']) ?>">
                                    <button type="submit" aria-label="ازالة">ازاله</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <h1>المدفوعات الاسلاميه:</h1>
            <?php foreach ($islamic_payments as $islamic_payment): ?>
                <div class="project">
                <img src="views/media/images/<?= htmlspecialchars($islamic_payment['photo'] ?? "11.png") ?>" alt=" حملة " loading="lazy">
                    <div class="project-details">
                        <h3>رقم الحملة :<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?></h3>
                        <h3>اسم الحمله :<?= htmlspecialchars($islamic_payment['name']) ?></h3>
                        <p>وصف الحملة : <?= htmlspecialchars($islamic_payment['short_description']) ?></p>
                        <p><strong>نوع المشروع:</strong> تعليمي</p>
                        <div class="input_delet">
                            <div class="donate-section">
                                <form action="/charity_islamic_payments_donate" method="post">
                                    <input class="inp" type="number" name="cost" placeholder="$">
                                    <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?>">
                                    <button type="submit" aria-label="تبرع الان">تبرع الأن</button>
                                </form>
                                <form action="/islamic_payments_removcart" method="post">
                                    <input type="hidden" name="islamic_payment_id" value="<?= htmlspecialchars($islamic_payment['islamic_payment_id']) ?>">
                                    <button type="submit" aria-label="ازالة">ازاله</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>




            <!-- سلة التبرعات -->
            <div class="center-cart">
                <!-- <section class="donation-cart">
                    <div id="cart-items">
                    </div>
                    <div class="total-amount">
                        <label for="total">المبلغ الإجمالي:</label>
                        <input type="text" id="total" value="0 ريال" readonly>
                    </div>
                    <div class="cart-actions">
                        <button id="donate-now">تبرع الآن</button>
                        <button id="clear-cart">إفراغ السلة</button>
                    </div> 
                </section>-->
            </div>
</main>


<?php require('views/parts/footer.php') ?>