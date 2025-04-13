<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<?php //dd($projects) 
?>


<main>
  <!-- شريط التنقل -->
  <!-- <section class="bar_navigation">
    <div  class="button">
      <a class="public_projects" id="public_projects" href="">مشاريع عامة</a>
      <a class="sponsoring_orphans" id="sponsoring_orphans" href="">مشاريع عامة</a>
      <a class="mosque_care" id="mosque_care" href="">مشاريع عامة</a>
    </div>
    <form action="" method="">
      <input id="search" type="text" name="search">
      <button id="btn_search" type="submit" name="btn_search"><img src="views/media/images/search.png" alt=""></button>
    </form>
    <p>انضموا الينا في تقديم فرص تبرع تؤثر بشكل واسع وتدعم المجتمعات المحتاجة مع ضمان تحقيق نتائج طويلة الأمد</p>
  
  </section> -->

  <!-- حاوية الكروت -->

  <!-- حاوية البطاقات -->


  <main class="main_cart">
    <section class="container_card">
      <?php foreach ($projects as $project): ?>

        <div class="donation-card">
        <a href="/charity_projects_show?project_id=<?= htmlspecialchars($project['project_id']) ?>">
          <img src="views/media/images/<?= htmlspecialchars($project['photo'] ?? "11.png") ?>" alt="مشروع نور السعودية" loading="lazy">
        </a>
          <div class="donation-info">
            <div class="aghtha">
              <h6><?= htmlspecialchars($project['type']) ?></h6>
              <h5>رقم الحملة : <?= htmlspecialchars($project['project_id']) ?></h5>
              <a href=""><img src="" alt=""></a>
            </div>
            <h3> <?= htmlspecialchars($project['name']) ?> </h3>
            <div class="progress-bar">
              <div class="progress" style="width:<?= htmlspecialchars(($project['collected_money'] / $project['cost']) * 100) ?>% "></div>
            </div>
            <div class="donation-details">
              <div>
                <p><strong style="display: inline;">SR <?= htmlspecialchars($project['cost']) ?>/</strong><?= htmlspecialchars($project['collected_money']) ?></p>
              </div>
            </div>
            <div class="donate-section">
              <form action="/charity_projects_donate" method="post" class="donate-section">
                <input class="inp" type="number" name="cost" placeholder="$" required>
                <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                <button type="submit" class="donate-btn">تبرع الأن</button>
              </form>
              <form action="/charity_projects_addcart" method="post">
                <input type="hidden" name="project_id" value="<?= htmlspecialchars($project['project_id']) ?>">
                <button type="submit" class="donate_cart"><img src="views/media/images/cart.png" alt=""></button>
              </form>
            </div>
            <div class="details">
              <a href="/charity_projects_show?project_id=<?= htmlspecialchars($project['project_id']) ?>">عرض التفاصيل</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </section>
    <section class="bar_action">

    </section>
  </main>




</main>
<?php require('views/parts/footer.php') ?>