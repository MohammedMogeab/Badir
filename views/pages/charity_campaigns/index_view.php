<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<?php //dd($campaigns) 
?>


<h1 class="titel">حملات التبرع المتاحة</h1>

<section class="container_card">
  <?php if (isset($campaigns)): foreach ($campaigns as $campaign): ?>
      <div class="donation-card">
        <a href="/charity_campaigns_show?campaign_id=<?= htmlspecialchars($campaign['campaign_id']) ?>">
          <img src="views/media/images/<?= htmlspecialchars($campaign['photo'] ?? "11.png") ?>" alt="حملة" loading="lazy">
        </a>
        <div class="donation-info">
          <div class="aghtha">
            <h6>بادر</h6>
            <h5>رقم الحملة : <?= htmlspecialchars($campaign['campaign_id']) ?></h5>
            <!-- <a href=""><img src="" alt=""></a> -->
          </div>
          <h3><?= htmlspecialchars($campaign['name']) ?></h3>
          <div class="progress-bar">
            <div class="progress" style="width:<?= htmlspecialchars(($campaign['collected_money'] / $campaign['cost']) * 100) ?>% "></div>
          </div>
          <div class="donation-details">
            <div>
              <p><strong style="display: inline;">$ <?= htmlspecialchars($campaign['collected_money']) ?>/</strong><?= htmlspecialchars($campaign['cost']) ?></p>
            </div>
          </div>
          <div class="donate-section">
            <?php if (isset($_SESSION['user_id'])): ?>
              <!-- إذا كان المستخدم مسجل الدخول -->
              <form action="/charity_campaigns_checkout" method="get" class="donate-section">
                <input class="inp" type="number" name="cost" placeholder="$" required min="0" max="<?= htmlspecialchars($campaign['cost'] - $campaign['collected_money']) ?>">
                <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                <button type="submit" class="donate-btn" aria-label="التبرع">تبرع الأن</button>
              </form>
              <form action="/charity_campaigns_addcart" method="post">
                <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                <button type="submit" class="donate_cart"><img src="views/media/images/cart.png" alt="السلة" loading="lazy" aria-label="السلة"></button>
              </form>
            <?php else: ?>
              <!-- إذا لم يكن المستخدم مسجل الدخول -->
              <form action="/users_index" method="get" class="donate-section">
                <input class="inp" type="number" name="cost" placeholder="$" required min="0" max="<?= htmlspecialchars($campaign['cost'] - $campaign['collected_money']) ?>">
                <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                <button type="submit" class="donate-btn" aria-label="التبرع">تبرع الأن</button>
              </form>
              <form action="/users_index" method="post">
                <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                <button type="submit" class="donate_cart"><img src="views/media/images/cart.png" alt="السلة" loading="lazy" aria-label="التبرع"></button>
              </form>
            <?php endif; ?>


          </div>
          <div class="details">
            <a href="/charity_campaigns_show?campaign_id=<?= htmlspecialchars($campaign['campaign_id']) ?>">عرض التفاصيل</a>
          </div>
        </div>
      </div>
  <?php endforeach;
  endif; ?>
      </section>

<div style="display: flex; justify-content: space-around; width: 100%;">
  <div style="display: flex; width: 50%; justify-content: space-around; ; height:20px; padding: 40px; align-self:center; align-items: center; text-align: center;">
    <a href="/charity_campaigns_index?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] - 1 : 1 ?>" style="<?php echo  $_GET['page_number'] - 1 <= 0 ? 'pointer-events: none; cursor: default;opacity: 0.3;' : 'pointer-events: auto; cursor: pointer' ?>"><img src="views/media/images/left.png" alt="previous" loading="lazy" heigh= "50px" width= "50px"></a>
    <div style="height: inherit; width: auto; font-size: larger; font-family: 'Times New Roman', Times, serif;" >
      <div style="display: flex; flex-direction: row; justify-content: space-around; width: 100%;">
        <div style="width: fit-content;"><?php echo (isset($_GET['page_number'])? $_GET['page_number'] - 1 : 0) . " . . . " ; ?></div>
        <div style="color: blue; width: fit-content;"><?php echo "   " . isset($_GET['page_number'])? $_GET['page_number'] : 1 . "   "; ?></div>
        <div style="width: fit-content;"><?php echo " . . . " . (isset($_GET['page_number'])? $_GET['page_number'] + 1: 2 ); ?></div>
      </div>
    </div>
    <a href="/charity_campaigns_index?page_number=<?= isset($_GET['page_number']) ? $_GET['page_number'] + 1 : 2 ?>"style="<?php echo  $_GET['page_number'] + 1 > $pages_count['campaigns']? 'pointer-events: none; cursor: default;opacity: 0.3; ' : 'pointer-events: auto; cursor: pointer' ?>"><img src="views/media/images/next.png" alt="next" loading="lazy" heigh= "50px" width= "50px" ></a>
  </div>
</div>
<section class="bar_action">
</section>

</main>
<?php require('views/parts/footer.php') ?>