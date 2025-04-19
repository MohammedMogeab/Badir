<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>
<script src="views/javascrept/zakat.js"></script>

<main class="main_islamic_payments_zakat main_ZS">
  <section class="form_zakat">
    <!-- <h1>حاسبة الزكاة</h1>
    <img src="views/media/images/zkat.png" alt="">
    <p>"تجب الزكاة على المال إذا حال عليه الحول، 
      أي مر عليه عامٌ كامل وفق التقويم الهجري،
       وذلك في الأموال النقدية والذهب والفضة
       وعروض التجارة. أما الزروع والثمار،
       فتجب زكاتها عند الحصاد، لقوله تعالى:
      <span> (وَآتُوا حَقَّهُ يَوْمَ حَصَادِهِ) [الأنعام: 141].</span>
       لذا، احرص على متابعة أموالك ومحاصيلك
       لتؤدي حق الله فيها في الوقت المحدد."</p>
    <div class="container">
    <table>
      <thead>
        <tr>
          <th>نوع الزكاة</th>
          <th>الكمية المراد حساب زكاتها</th>
          <th>وحدة القياس</th>
          <th>الزكاة الواجبة</th>
          <th>ما يبقى من المال</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="zakat-type">زكاة المال</td>
          <td><input type="text" placeholder="أدخل المبلغ"></td>
          <td>
            <select>
              <option>ريال</option>
              <option>دولار</option>
              <option>يورو</option>
            </select>
          </td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة الفضة</td>
          <td><input type="text" placeholder="أدخل الكمية"></td>
          <td>جرام</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة الذهب</td>
          <td><input type="text" placeholder="أدخل الكمية"></td>
          <td>جرام</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة الإبل</td>
          <td><input type="text" placeholder="أدخل العدد"></td>
          <td>رأس</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">زكاة البقر</td>
          <td><input type="text" placeholder="أدخل العدد"></td>
          <td>رأس</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">الماشية (الأغنام والخرفان)</td>
          <td><input type="text" placeholder="أدخل العدد"></td>
          <td>رأس</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
        <tr>
          <td class="zakat-type">ما يخرج من الأرض</td>
          <td><input type="text" placeholder="أدخل الكمية"></td>
          <td>كيلو جرام</td>
          <td><input type="text" placeholder=" ادخل الكمية"></td>
          <td><input type="text" placeholder="ادخل الكمية"></td>
        </tr>
      </tbody>
    </table>

  
    <button class="calc-button" type="submit" nmae="calc_zakat">احسب الزكاة</button>
  </div> -->



    <img src="views/media/images/zkat.png" alt="">
    <h1 style="    color: var(--font-color-bh);">حاسبة الزكاة </h1>
    <br>
    <h3>زكات المال</h3>
    <div class="input-group">
      <label>المال , الأسهم , البضائع : دولار</label>
      <input type="number" placeholder="المبلغ" id="money_amount">
    </div>
    <div class="input-group">
      <label>الذهب:جرام</label>
      <input type="number" placeholder="وزن الذهب" id="money_gold_amount">
    </div>
    <div class="input-group">
      <label>الفضة:جرام</label>
      <input type="number" placeholder="وزن الفضة" id="money_silver_amount">
    </div>
    <br>

    <h3>زكات المعادن , الركاز(ما تم استخراجه)</h3>
    <div class="input-group">
      <label>المال , الركاز , الكنوز : دولار</label>
      <input type="number" placeholder="المبلغ" id="minerals_amount">
    </div>
    <div class="input-group">
      <label>الذهب:جرام</label>
      <input type="number" placeholder="وزن الذهب" id="minerals_gold_amount">
    </div>
    <div class="input-group">
      <label>الفضة:جرام</label>
      <input type="number" placeholder="وزن الفضة" id="minerals_silver_amount">
    </div>
    <br>


    <button onclick="calculate()" aria-label="حساب الزكاة">حساب الزكاة </button>



  <div class="donate-section">
    <form action="/islamic_payments_checkout" method="get" class="donate-section" required>
      <input class="inp" type="number" name="cost" placeholder="$" required id="result">
      <input type="hidden" name="islamic_payment_id" value="2">
      <button type="submit" class="donate-btn3" aria-label="تبرع الأن">تبرع الأن</button>
    </form>
    <form class="fromCart" action="/islamic_payments_addcart" method="post">
      <input type="hidden" name="islamic_payment_id" value="2">
      <button type="submit" class="donate_cart" aria-label="السله"><img src="views/media/images/cart.png" alt=""></button>
    </form>
  </div>

  

  </section>

  <label for="zakat-info" class="section-label visually-hidden">معلومات عن الزكاة</label>

  <section id="zakat-info" class="info-section">


    <div>

      <p>
        <strong style="    color: var(--font-color-gl); ">قال الله تعالى :</strong>
        (خُذْ مِنْ أَمْوَالِهِمْ صَدَقَةً تُطَهِّرُهُمْ وَتُزَكِّيهِم بِهَا وَصَلِّ عَلَيْهِمْ إِنَّ صَلَاتَكَ سَكَنٌ لَّهُمْ) [التوبة: 103]
      </p>


      <li style="    color: white; ">
        قال رسول الله صلى الله عليه وسلم:<strong>"اتقوا النار ولو بشقِّ تمرةٍ".</strong>رواه البخاري ومسلم.</li>
    </div>

    <div>
      <p>
        <strong style="    color: var(--font-color-gl); "> الزكاة وأحكامها:</strong><br>
        الزكاة هي الركن الثالث من أركان الإسلام، فرضها الله على المسلمين
        القادرين تطهيرا لأموالهم، وتحقيقًا للتكافل الاجتماعي.
        <br><strong style="    color: var(--font-color-gl); ">أحكام الزكاة:</strong><br>
        1.حكمها:فرض عين على كل مسلم يملك النصاب ومر عليه الحول .<br>
        2.النصاب:مقدار معين من المال تجب فيه الزكاة, وهو يعادل85 جراما من الذهب .<br>
        3.الأنواع:تشمل زكاة المال ,الذهب والفضة ,الزروع والثمار ,عروضالتجارة ,الأنعام ,وزكاة الفطر .<br>
        4.المستحقون:كما ورد في سورة التوبة(60),تشمل الفقراء,المساكين,العاملين عليها,
        .المؤلفة قلوبهم,في الرقاب,الغارمين,في سبيل الله,وبن السبيل
      </p>
    </div>

  </section>


  <label for="zakat-info" class="section-label visually-hidden">شروط زكاة بهيمة الانعام</label>

  <section id="zakat-info" class="info-section">
    <div>
      <p>
        <strong style="color: var(--font-color-gl);">شروط زكاة بهيمة الأنعام:</strong><br>
        - أن تبلغ النصاب من رؤوس فأكثر.<br>
        - أن تكون سائمة (ترعى من العشب الطبيعي معظم السنة).<br>
        - أن يمر عليها حول هجري كامل.
      </p>

      <p><strong style="color: var(--font-color-gl);">زكاة الغنم:</strong></p>
      <table style="color: white;">
        <thead>
          <tr>
            <th>عدد الغنم</th>
            <th>مقدار الزكاة</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>40 - 120</td>
            <td>1 شاة</td>
          </tr>
          <tr>
            <td>121 - 200</td>
            <td>2 شاة</td>
          </tr>
          <tr>
            <td>201 - 300</td>
            <td>3 شياه</td>
          </tr>
          <tr>
            <td>301 - 399</td>
            <td>4 شياه</td>
          </tr>
          <tr>
            <td>400 فأكثر</td>
            <td>عن كل 100: 1 شاة</td>
          </tr>
        </tbody>
      </table>

      <p><strong style="color: var(--font-color-gl);">زكاة البقر:</strong></p>
      <table style="color: white;">
        <thead>
          <tr>
            <th>عدد البقر</th>
            <th>مقدار الزكاة</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>30 - 39</td>
            <td>تبيع (عمره سنة)</td>
          </tr>
          <tr>
            <td>40 - 59</td>
            <td>مسنّة (عمرها سنتان)</td>
          </tr>
          <tr>
            <td>60</td>
            <td>2 تبيعان</td>
          </tr>
          <tr>
            <td>70</td>
            <td>تبيع + مسنّة</td>
          </tr>
          <tr>
            <td>80</td>
            <td>2 مسنّتان</td>
          </tr>
          <tr>
            <td>90</td>
            <td>3 تبيعات</td>
          </tr>
          <tr>
            <td>100</td>
            <td>2 تبيعان + مسنّة</td>
          </tr>
          <tr>
            <td>120</td>
            <td>4 تبيعات</td>
          </tr>
          <tr>
            <td>ثم بعد ذلك</td>
            <td>عن كل 30: تبيع، وعن كل 40: مسنّة</td>
          </tr>
        </tbody>
      </table>

      <p><strong style="color: var(--font-color-gl);">زكاة الإبل:</strong></p>
      <table style="color: white;">
        <thead>
          <tr>
            <th>عدد الإبل</th>
            <th>مقدار الزكاة</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>5 - 9</td>
            <td>1 شاة</td>
          </tr>
          <tr>
            <td>10 - 14</td>
            <td>2 شاة</td>
          </tr>
          <tr>
            <td>15 - 19</td>
            <td>3 شياه</td>
          </tr>
          <tr>
            <td>20 - 24</td>
            <td>4 شياه</td>
          </tr>
          <tr>
            <td>25 - 35</td>
            <td>1 بنت مخاض (أنثى عمرها سنة)</td>
          </tr>
          <tr>
            <td>36 - 45</td>
            <td>1 بنت لبون (أنثى عمرها سنتان)</td>
          </tr>
          <tr>
            <td>46 - 60</td>
            <td>1 حقة (أنثى عمرها 3 سنوات)</td>
          </tr>
          <tr>
            <td>61 - 75</td>
            <td>1 جذعة (أنثى عمرها 4 سنوات)</td>
          </tr>
          <tr>
            <td>76 - 90</td>
            <td>2 بنتا لبون</td>
          </tr>
          <tr>
            <td>91 - 120</td>
            <td>2 حقتان</td>
          </tr>
          <tr>
            <td>121 فأكثر</td>
            <td>عن كل 50: حقة، وعن كل 40: بنت لبون</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <label for="zakat-info" class="section-label visually-hidden">معلزمات عن زكاة الزروع والثمار</label>

  <section id="zakat-info" class="info-section">
    <div>
      <p>
        <strong style="color: var(--font-color-gl);">زكاة الزروع والثمار:</strong><br><br>

        <strong>ما تجب فيه الزكاة:</strong><br>
        - الحبوب: القمح، الشعير، الأرز، الذرة، إلخ.<br>
        - الثمار: التمر، الزبيب، الرطب، إلخ.<br>
        ❌ لا زكاة في الخضروات والفواكه (مثل التفاح، البرتقال...).<br><br>

        <strong style="    color: var(--font-color-gh);">نصاب الزروع:</strong><br>
        - 5 أوسق = 60 صاع × 5 = تقريبًا 612 كجم إلى 653 كجم.<br>
        ✅ إذا كان المحصول أقل من ذلك → لا تجب الزكاة.<br><br>

        <strong style="    color: var(--font-color-gh);">ملاحظات هامة:</strong><br>
        - لا يُشترط مرور الحول، بل تُخرج الزكاة عند الحصاد.<br>
        - قال الله تعالى: <i>"وآتوا حقه يوم حصاده"</i> [الأنعام: 141].<br>
        - الزكاة من نفس نوع المحصول إلا إذا دُفعت نقدًا.<br>
        - النصاب يُحسب على نصيب كل شريك إن وُجد.<br>
        - إذا تلف قبل الحصاد، فلا زكاة فيه.<br><br>

        <strong style="    color: var(--font-color-gh);">نسبة الزكاة حسب طريقة السقي:</strong>
      </p>

      <table style="color: white;">
        <thead>
          <tr>
            <th>طريقة السقي</th>
            <th>نسبة الزكاة</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>سقي طبيعي (مطر، نهر)</td>
            <td>10% (العُشر)</td>
          </tr>
          <tr>
            <td>سقي صناعي (مضخة، شراء ماء)</td>
            <td>5% (نصف العُشر)</td>
          </tr>
          <tr>
            <td>سقي مشترك</td>
            <td>7.5% (ثلاثة أرباع العُشر)</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

</main>
<?php require('views/parts/footer.php') ?>