<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section class="container_card_statistics">
    <div class="card_statistics_grup">
    <article class="card_statistics">
      <img src="" alt="">
      <p>
        إجمالي المبالغ التي تم تجميعها <br>
        ريال سعودي <?php echo $users_statistics['donates_sum'] ?>  
      </p>

    </article>
    <article class="card_statistics">
      <img src="" alt="">
      <p>
        العدد الكلي للمستفيدين <br>
        <?php echo $beneficiaries_project_campain['beneficiaries_count'] ?> مستفيد
      </p>

    </article>
    <article class="card_statistics">
      <img src="" alt="">
      <p>
        عدد الحملات <br> 
        <?php echo $campaigns_statistics['count']['count'] ?> حملة
      </p>
      

    </article>
    </div>
    <div class="card_statistics_grup">
    <article class="card_statistics">
      <img src="" alt="">
      <p>
        عدد المشاريع <br>
        <?php echo $projects_statistics['count']['count'] ?> مشروع
      </p>

    </article>
    <article class="card_statistics">
      <img src="" alt="">
      <p>
        عدد الشركاء <br>
        <?php echo $partners_statistics['count']['count'] ?? "0" ?> جمعية
      </p>
      

    </article>
    <article class="card_statistics">
      <img src="" alt="">
      <img src="" alt="">
      
      <p>
        مشاريع مكتملة <br>
        <?php echo $projects_statistics['completed']['completed']?? "0" ?> مشروع
      </p>

    </article>
    </div>
  </section>
</main>
<?php require('views/parts/footer.php') ?>