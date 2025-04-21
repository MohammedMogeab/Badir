<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<?php //dd($campaigns) 
?>


<h1 class="titel">حملات التبرع المتاحة</h1>




<label for="campaigns-section" class="section-label"></label>
<section id="campaigns-section" class="container_card">

  <?php if (isset($campaigns)): foreach ($campaigns as $campaign): ?>
      <div class="donation-card">
        <a href="/charity_campaigns_show?campaign_id=<?= htmlspecialchars($campaign['campaign_id']) ?>">
          <img src="views/media/images/<?= htmlspecialchars($campaign['photo'] ?? "11.png") ?>" alt="مشروع نور اليمن" loading="lazy">
        </a>
        <div class="donation-info">
          <div class="aghtha">
            <h6><?= htmlspecialchars($categories[$campaign['category_id']]['name']) ?></h6>
            <h5>رقم الحملة : <?= htmlspecialchars($campaign['campaign_id']) ?></h5>
            <!-- <a href=""><img src="" alt=""></a> -->
          </div>
          <h3><?= htmlspecialchars($campaign['name']) ?></h3>
          <div class="progress-bar">
            <div class="progress" style="text-align: left; width:<?= htmlspecialchars(($campaign['collected_money'] / $campaign['cost']) * 100) ?>% ">%<?= htmlspecialchars((int)(($campaign['collected_money'] / $campaign['cost']) * 100)) ?></div>
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

      <?php if(! $filtered):include('views/parts/pagination.php'); endif?>

<section class="bar_action">


</section>

</main>
<?php require('views/parts/footer.php') ?>