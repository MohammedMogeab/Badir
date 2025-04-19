<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main class="main_show_ch">
    <section class="card_islamic_endowments">
        <!-- <h3 style="color: var(--font-color-bh);
    font-size: var(--font-size-xl);">التفاصيل</h3> -->
        <div class="imgs">
            <img src="views/media/images/<?php  echo $projects['0']['photo'] ?? "11.png" ?>" alt=" " loading="lazy">
        </div>
        <p class="localshin">المنطقة تعز</p>
        <div>
            <h5> <?php  echo $projects['0']['name'] ?> </h5>
            <p class="details_p"><?php  echo $projects['0']['short_description'] ?></p>
        </div>
        <!-- <h5>رقم الحملة : <?php  echo $projects['0']['campaign_id'] ?></h5> -->
        <div class="progress-bar">
            <div class="progress" style="text-align: left;width:<?= htmlspecialchars(($projects['0']['collected_money']/$projects['0']['cost'])*100) ?>% " >%<?= htmlspecialchars((int)(($projects['0']['collected_money']/$projects['0']['cost'])*100)) ?></div>
        </div>
        <div class="donation-details">
            <p><strong style="display: inline;">SR <?= htmlspecialchars($projects['0']['collected_money']) ?>/</strong><?= htmlspecialchars($projects['0']['cost']) ?> </p>
        </div>
        <section class="bar_actions">
            <div class="donation-box">
                <h2>مبلغ التبرع</h2>
                <div class="donation-min-box">
                    <input type="number" id="customAmount" placeholder="قيمة المبلغ" oninput="updateDonateButton()" required min="0" max="<?= htmlspecialchars($project['0']['cost'] - $project['0']['collected_money']) ?>" >
                    <a class="icon_cart" id="icon_nav_search" href=""><img class="icon_img" src="views/media/images/cart.png" alt=""></a>
                </div>
                <button id="donate">تبرع الآن</button>
            </div>
        </section>
    </section>
<!-- باقي البينات -->
<label for="card_islamic_endowments" class="section-label visually-hidden">تفاصيل المشروع</label>

<section class="card_islamic_endowments" id="card_islamic_endowments">


    <!-- <div class="details_show_ch">
        <h5>تفاصيل تكاليف العمليات</h5>
        <p>الفحوصات الطبية</p>
        <p>العمليات الجراحية</p>
        <p>الادوية</p>
    </div> -->

    <div class="card_insid" id="card_insid">
        <div>
            <h6>نوع المشروع</h6>
            <p><?php  echo $categories[$projects['0']['category_id']]['name']?></p>
            <h6>المبلغ المستهدف</h6>
            <p>  <?php  echo $projects['0']['cost'] ?>  ر.س</p>
        </div>
        <div>
            <h6>عدد المستفيدين</h6>
            <p><?php  echo $projects['0']['beneficiaries_count']?></p>
            <h6>الوقت المتبقي</h6>
            <p> <?php echo ceil((strtotime($projects['0']['end_at']) - strtotime($projects['0']['start_at'])) / (60 * 60 * 24)); ?>  يوم </p>
        </div>
        <div>
            <h6>المبلغ الذي تم جمعة</h6>
            <p> <?php  echo $projects['0']['collected_money'] ?>  ر.س</p>
            <h6>عدد المتبرعين</h6>
            <p><?= $projects['0']['donators_count']?></p>
        </div>
    </div>
    <?php if(isset($levels)):?>
    <div class="card_insid" id="card_insid2">
        <h5>مراحل المشروع</h5>
        <ol type="1">
            <?php foreach($levels as $level):?>
            <li><p><?php  echo $level['name']; echo $projects['0']['level'] == $level['level_id'] ? "(المرحلة الحالية)" : " ";?></p></li>
            <?php endforeach; ?>
            <!-- <p>المرحلة الاولى :  </p>
            <p>المرحلة الثانية : </p>
            <p>المرحلة الثالثة :</p> -->
        </ol>
    </div>
    <?php endif; ?>
    <div class="time">
        <p> تاريخ البدء  : <?php  echo $projects['0']['start_at'] ?></p>
        <p>تاريخ الانتهاء : <?php  echo $projects['0']['end_at'] ?> </p>
        </div>
    <div class="news" >
    <h5>اخبار المشروع</h5>
        <div><p>تم جمع <?= htmlspecialchars((int)(($projects['0']['collected_money']/$projects['0']['cost'])*100)) ?>% من التبرعات</p></div>
        <!-- <div>30%<p>تم الانتهاء من المرحله الاولى </p></div> -->
    </div>






</section>

</main>

<?php require('views/parts/footer.php') ?>