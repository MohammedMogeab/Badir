<?php

use function PHPUnit\Framework\isEmpty;

 require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<?php  $donation['cost'] = $donation['cost'] != "" ? $donation['cost'] : 5 ?>
<main class="safha_error_container">

<label for="donation-section" class="section-label visually-hidden">تفاصيل التبرع</label>

     <section id="donation-section" class="risala_card">
        

        <div class="imgs">
        <img id="product-image" src="views/media/images/<?= $donation['image'] ?>" alt="صورة المنتج"  alt="عناصر الصور" loading="lazy">
        </div>
        <div>
            <h5 id="product-description"><?= $donation['description'] ?></h5>
           
        </div>
        <h5>الرقم  : </h5><h5 id="product_id"><?= $donation['product_id'] ?></h5>

        <label for="payment-section" class="section-label visually-hidden">خيارات الدفع</label>

        <section id="payment-sections" class="bar_actions">
            <div class="donation-box">
                <h2>مبلغ التبرع</h2>
                <div class="donation-min-box">

                   <H3 id="product-price"><?= htmlspecialchars($donation['cost'])  ?></H3>
                </div>
                <div id="paypal-button-container"></div>
            </div>
        </section> 


  
    <div id="paypal-button-container"></div>
        <p id="result-message"></p>
        <div id="donation_page" class="visually-hidden"><?= $donation['donation_page'] ?></div>
        <!-- PayPal JS SDK -->
         <?php  $pconfig = require "config.php"; ?>
        <script
            src="https://www.paypal.com/sdk/js?client-id=<?= $pconfig['paypal']['client_id'] ?>&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo,paylater,card"
            data-sdk-integration-source="developer-studio"></script>
        <script src="views/javascrept/checkout.js"></script>

</main>

<?php require('views/parts/footer.php') ?>