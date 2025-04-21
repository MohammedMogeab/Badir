<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<?php //dd($campaigns) ?>

<main class="main_show_ch">
<label for="main-campaign-section" class="section-label visually-hidden"></label>
            <section id="main-campaign-section" class="card_islamic_endowments">
            <!-- <h3 style="color: var(--font-color-bh);
        font-size: var(--font-size-xl);">التفاصيل</h3> -->
            <div class="imgs">
            <img src="views/media/images/<?php  echo $campaigns['0']['photo'] ?? "11.png" ?>" alt="صورة الحملة المستهدفة" loading="lazy"></div>
            <p class="localshin">المنطقة تعز</p>
            <div>
            <h5> <?php  echo $campaigns['0']['name'] ?></h5>
            <p class="details_p"><?php  echo $campaigns['0']['short_description'] ?></p>
        </div>
            <h5>رقم الحملة : <?php  echo $campaigns['0']['category_id'] ?></h5>
            <div class="progress-bar">
                <div class="progress" style="width:<?= htmlspecialchars(($campaigns['0']['collected_money']/$campaigns['0']['cost'])*100) ?>% " ></div>
              </div>
              <div class="donation-details">
                
                  <p><strong style="display: inline;">SR <?= htmlspecialchars($campaigns['0']['collected_money']) ?>/</strong><?= htmlspecialchars($campaigns['0']['cost']) ?></p>
  
              </div>  
              <label for="donation-actions-section" class="section-label visually-hidden">إجراءات التبرع</label>

              <section id="donation-actions-section" class="bar_actions">
<div class="donation-box">
        <h2>مبلغ التبرع</h2>
        <div class="donation-min-box">
        <input type="number" id="customAmount" placeholder="قيمة المبلغ" oninput="updateDonateButton()" required min="0" max="<?= htmlspecialchars($campaign['0']['cost'] - $campaign['0']['collected_money']) ?>" >
        <a class="icon_cart" id="icon_nav_search" href=""><img class="icon_img" src="views/media/images/cart.png" alt="السلة" loading="lazy"></a>
        </div>
        <button id="donate" aria-label="التبرع">تبرع الآن</button>
    </div>
</section>





</section>
<!-- باقي البينات -->
<section class="card_islamic_endowments CIE2" id="card_islamic_endowments">

<!-- 
<div class="details_show_ch">
                <h5>تفاصيل تكاليف العمليات</h5>
                <p>الفحوصات الطبية</p>
                <p>العمليات الجراحية</p>
                <p>الادوية</p>
        </div> -->

        <div class="card_insid" id="card_insid">
        <div>
        <h6>نوع المشروع</h6>
        <p><?php  echo $categories[$campaigns['0']['category_id']]['name']?></p>
        <h6>المبلغ المستهدف</h6>
        <p> <?php  echo $campaigns['0']['cost'] ?>ر.س</p>

        </div>
        <div>
        <h6>عدد المستفيدين</h6>
        <p>1</p>
        <h6>الوقت المتبقي</h6>
        <p> <?php echo ceil((strtotime($campaigns['0']['end_at']) - strtotime($campaigns['0']['start_at'])) / (60 * 60 * 24)); ?>  يوم</p>
        </div>
        <div>
        <h6>المبلغ الذي تم جمعة</h6>
        <p><?php  echo $campaigns['0']['collected_money'] ?>  ر.س</p>
        <h6>عدد المتبرعين</h6>
        <p><?php  echo $campaigns['0']['donators_count'] ?></p>
        </div>
    </div>
    <!-- <div class="card_insid" id="card_insid2">
    <h5>مراحل المشروع</h5>

    <p>المرحلة الاولى :  </p>
    <p>المرحلة الثانية : </p>
    <p>المرحلة الثالثة :</p>
    </div> -->
    <div class="time">
        <p> تاريخ البدء  : <?php  echo $campaigns['0']['start_at'] ?> </p>
        <p>تاريخ الانتهاء : <?php  echo $campaigns['0']['end_at'] ?>  </p>
        </div>
    <div class="news" >
    <h5>اخبار المشروع</h5>
        <div><p>تم جمع <?= htmlspecialchars(($campaigns['0']['collected_money']/$campaigns['0']['cost'])*100) ?>%  من التبرعات</p></div>
        <!-- <div>30%<p>تم الانتهاء من المرحله الاولى </p></div> -->
    </div>






</section>

</main>



<?php require('views/parts/footer.php') ?>