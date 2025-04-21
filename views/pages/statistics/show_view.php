<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<style>
  body {
    margin: 0;
    font-family: 'Cairo', sans-serif;
    background-color: #ffffff;
    color: #0f2f3f;
  }

  .container {
    max-width: 1000px;
    margin: 40px auto;
    background-color: #d7e4e4;
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #9bb7b7;
    text-align: center;
  }

  .header {
    font-size: 18px;
    margin-bottom: 20px;
  }

  .filters {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
  }

  select {
    background-color: #2c5d63;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
  }

  .pie-chart {
    width: 300px;
    height: 300px;
    margin: 0 auto 20px;
    border-radius: 50%;
    background: conic-gradient(
      rgba(67, 12, 12, 0.5) 50% 50%,
      rgba(179, 37, 37, 0.5)  50% 50%
    );
  }

  .legend {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .legend-item {
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .color-box {
    width: 15px;
    height: 15px;
    border-radius: 3px;
  }

  .summary {
    background-color: #d7e4e4;
    border: 1px solid #6b8e8e;
    padding: 15px;
    border-radius: 12px;
    display: inline-block;
  }

  .summary-icon {
    font-size: 24px;
    margin-left: 10px;
    background-color: rgba(65, 6, 6, 0.36);
  }
</style>

<main>
  <section>
    <input type="hidden" id="statistics-from-php" value="<?= htmlspecialchars(json_encode(json_encode($statisticsAll)),ENT_QUOTES , 'UTF-8') ?>">
    <div class="container">
      <div class="header">إحصاءات عامة</div>
      <div class="filters">
        <select id="categoryFilter">
          <option value="all">الاحصائيات جميع</option>
          <option value="projects">المشاريع</option>
          <option value="endowments">الاوقاف</option>
          <option value="campaigns">الحملات الخيريه</option>
          <option value="islamic_payments">المصاريف الاسلامية</option>
        </select>
      </div>
      <div style="display: flex; width: 100%; justify-content: space-around;">
        <div>
          <h3>العدد الاجمالي</h3>
          <div id="items-count-chart" class="pie-chart"></div>
        </div>
        <div>
          <h3>اجمالي التبرعات</h3>
          <div id="payments-sum-chart" class="pie-chart"></div>
        </div>
      </div>
      <div class="legend">
        <div class="legend-item"><div class="color-box" id="color-box-projects" style="background:#80cbc4;"></div>المشاريع </div>
        <div class="legend-item"><div class="color-box" id="color-box-endowments"style="background:#1a237e;"></div> الاوقاف</div>
        <div class="legend-item"><div class="color-box" id="color-box-campaigns"style="background:#3949ab;"></div> الحملات الخيريه</div>
        <div class="legend-item"><div class="color-box" id="color-box-islamic-payments"style="background:rgb(143, 156, 132);"></div> المصاريف الاسلامية</div>
      </div>

      


      <div class="summary" id="summaryBox">
        <span class="summary-icon">📊</span>
        <div id="summaryTitle">أجمالي عدد التبرعات</div>
        <div id="summaryValue"><?= $statisticsAll['all']['sum'] ?></div>
      </div>
    </div>
  </section>
</main>
<script src="views/javascrept/statistics.js"></script>




<?php require('views/parts/footer.php') ?>