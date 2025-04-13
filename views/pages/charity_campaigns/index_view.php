<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<?php //dd($campaigns) ?>


  <h1 style="  text-align: center;
    color: var(--font-color-bh);
    margin: var(--margin-xl);">حملات التبرع المتاحة</h1>

  <section class="container_card">
  <?php foreach ($campaigns as $campaign): ?>
          <div class="donation-card">
            <a href="/charity_campaigns_show?campaign_id=<?= htmlspecialchars($campaign['campaign_id']) ?>">
              <img src="views/media/images/<?= htmlspecialchars($campaign['photo'] ?? "11.png") ?>" alt="مشروع نور السعودية" loading="lazy">
            </a>
            <div class="donation-info">
              <div class="aghtha">
                <h6>بادر</h6>
                <h5>رقم الحملة : <?= htmlspecialchars($campaign['campaign_id']) ?></h5>
                <a href=""><img src="" alt=""></a>
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
                <form action="/charity_campaigns_donate" method="post" class="donate-section">
                  <input class="inp" type="number" name="cost" placeholder="$" required >
                  <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                  <button type="submit" class="donate-btn">تبرع الأن</button>
                </form>
                <form action="/charity_campaigns_addcart" method="post" >
                  <input type="hidden" name="campaign_id" value="<?= htmlspecialchars($campaign['campaign_id']) ?>">
                  <button type="submit" class="donate_cart"><img src="views/media/images/cart.png" alt="" ></button>
                </form>
              </div>
              <div class="details">
                <a href="/charity_campaigns_show?campaign_id=<?= htmlspecialchars($campaign['campaign_id']) ?>">عرض التفاصيل</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </section>
      <section class="bar_action">

      </section>
</main>
<?php require('views/parts/footer.php') ?>