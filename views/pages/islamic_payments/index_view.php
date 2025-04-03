<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section class="container">
    <div class="nav_links">
      <a class="zakat" href="">الزكاة</a>
      <a class="charity" href="">الصدقة</a>
      <a class="ransom" href="">الفدية</a>
      <a class="atonement" href="">الكفارة و النذور</a>
      <a class="aqeeqah" href="">العقيقة</a>
    </div>
    <!-- الصدقه -->
    <div class="crad_islamic_payments">
      <img  src="" alt="">
      <p class="modern">
        :قال النبي صلى الله عليه وسلم<br>
        "الصدقه تطفئ الخطيئة كمايطفئ الماء النار"<br>
        .(رواه الترمذي)
      </p>
      <form action="" method="">
        <label for="charity">إدخل الصدقة</label>
        <input id="charity" type="number" name="charity" placeholder="المبلغ ريال">
        <button class="push" type="submit" name="btn_push">ادفع الصدقة الان <img src="" alt=""></button>
        <button class="add" type="submit" name="ptn_add">إضافةإلى السلة <img src="" alt=""></button>
      </form>
      <p class="foter">
        محتوى عن الصدقة وأحكامها:
الصدقة هي العطاء المالي أو العيني الذي يقدمه المسلم طواعية، طلبًا للأجر من الله.
أحكام الصدقة:
1. حكمها: مستحبة في كل وقت، ومندوبة بشدة عند الحاجة.
2. أنواعها:
صدقة واجبة: مثل زكاة المال والكفارات والنذور.
صدقة مستحبة: كل ما يُعطى ابتغاء مرضاة الله، مثل إطعام الطعام، كفالة الأيتام، وبناء المساجد.
3. فضلها: قال النبي ﷺ: "ما نقص مال من صدقة" (رواه مسلم).
    </p>

    </div>
    <!-- الكفاره -->
    <div class="crad_islamic_payments">
      <img src="" alt="">
      <p>قال الله تعالى: ﴿لَا يُؤَاخِذُكُمُ اللَّهُ بِاللَّغْوِ فِي أَيْمَانِكُمْ وَلَكِن يُؤَاخِذُكُم بِمَا عَقَّدتُّمُ الْأَيْمَانَ فَكَفَّارَتُهُ إِطْعَامُ عَشَرَةِ مَسَاكِينَ﴾ (المائدة: 89).</p>
      <form action="" method="">
        <label for="atonement">إدخل المبلغ</label>
        <input id="atonement" type="number" name="atonement" placeholder="المبلغ ريال">
        <button class="push" type="submit" name="btn_push">ادفع  الان <img src="" alt=""></button>
        <button class="add" type="submit" name="btn_add">إضافةإلى السلة <img src="" alt=""></button>
        
        
      </form>
      <p>محتوى عن الكفارات والنذور وأحكامها: الكفارات: هي أعمال تُفرض على المسلم لتكفير ذنب معين، ومنها: 1. كفارة اليمين: إطعام عشرة مساكين، أو كسوتهم، أو صيام ثلاثة أيام. 2. كفارة الصيام: عتق رقبة، أو صيام شهرين متتابعين، أو إطعام ستين مسكينًا. 3. كفارة القتل الخطأ: تحرير رقبة، فإن لم يستطع فصيام شهرين متتابعين، ودفع الدية.</p>
      <p>النذور: هو التزام المسلم بعبادة معينة إن تحقق له أمر معين. حكمه: الوفاء به واجب إن كان نذر طاعة. كفارته: إذا عجز عن الوفاء به، فعليه كفارة يمين.</p>
      

    </div>
    <!-- العقيقه -->
    <div class="crad_islamic_payments">
      <img src="" alt="">
      <p>قال النبي ﷺ: "كل غلام مرتهن بعقيقته تذبح عنه يوم سابعه، ويحلق، ويسمى" (رواه أبو داود).</p>
      <form action="" method="">
        <label for="aqeeqah">إدخل المبلغ</label>
        <input id="aqeeqah" type="number" name="aqeeqah" placeholder="المبلغ ريال">
        <label for="gender_baby"> نوع المولود</label>
        <select name="gender_baby" id="gender_baby" >
          <option value=""></option>
        </select>
        <button class="" type="submit" name="btn_push">ادفع  الان <img src="" alt=""></button>
        <button class="" type="submit" name="btn_add">إضافةإلى السلة <img src="" alt=""></button>
      </form>
      <p>محتوى عن العقيقة وأحكامها: العقيقة هي الذبيحة التي تُذبح عن المولود في اليوم السابع من ولادته شكرًا لله. أحكام العقيقة: 1. حكمها: سنة مؤكدة. 2. عدد الذبائح: للذكر: شاتان. للأنثى: شاة واحدة. 3. وقت الذبح: اليوم السابع، وإن تأخر فلا بأس. 4. التوزيع: يُستحب توزيعها على الفقراء، ويمكن للأهل أن يأكلوا منها.</p>

    </div>
    <!-- الزكاة -->
    <div class="crad_islamic_payments">
      <img src="" alt="">
      <p>
        قال الله تعالى: ﴿خُذْ مِنْ أَمْوَالِهِمْ صَدَقَةً تُطَهِّرُهُمْ وَتُزَكِّيهِم بِهَا وَصَلِّ عَلَيْهِمْ إِنَّ صَلَاتَكَ سَكَنٌ لَّهُمْ﴾ (التوبة: 103).
      </p>
      <form action="" method="">
        <label for="zakat">إدخل الزكاة</label>
        <input id="zakat" type="number" name="zakat" placeholder="المبلغ ريال">
        <button class="push" type="submit" name="btn_push">ادفع الزكاة الان <img src="" alt=""></button>
        <button class="add" type="submit" name="btn_add">إضافةإلى السلة <img src="" alt=""></button>
        <button class="calc" type="submit" name="btn_calc"> حاسبة الزكاة <img src="" alt=""></button>
        
      </form>
      <p>محتوى عن الزكاة وأحكامها:
الزكاة هي الركن الثالث من أركان الإسلام، فرضها الله على المسلمين القادرين تطهيرًا لأموالهم، وتحقيقًا للتكافل الاجتماعي.
أحكام الزكاة:
1. حكمها: فرض عين على كل مسلم يملك النصاب ومرَّ عليه الحول.
2. النصاب: مقدار معين من المال تجب فيه الزكاة، وهو يعادل 85 جرامًا من الذهب.
3. الأنواع: تشمل زكاة المال، الذهب والفضة، الزروع والثمار، عروض التجارة، الأنعام، وزكاة الفطر.
4. المستحقون: كما ورد في سورة التوبة (60)، تشمل الفقراء، المساكين، العاملين عليها، المؤلفة قلوبهم، في الرقاب، الغارمين، في سبيل الله، وابن السبيل. </p>

    </div>
    <!-- الفديه -->
    <div class="crad_islamic_payments">
      <img src="" alt="">
      <p>قال الله تعالى: ﴿وَعَلَى الَّذِينَ يُطِيقُونَهُ فِدْيَةٌ طَعَامُ مِسْكِينٍ﴾ (البقرة: 184).</p>
      <form action="" method="">
        <label for="ransom">إدخل الفديه</label>
        <input id="ransom" type="number" name="ransom" placeholder="المبلغ ريال">
        <button class="push" type="submit" name="btn_push">ادفع  الان <img src="" alt=""></button>
        <button class="add" type="submit" name="btn_add">إضافةإلى السلة <img src="" alt=""></button>
        
        
      </form>
      <p>محتوى عن الفدية وأحكامها: الفدية هي مبلغ مالي أو إطعام مسكين يُخرجه المسلم عوضًا عن عبادة لم يستطع القيام بها. أحكام الفدية: 1. حكمها: واجبة على من عجز عن الصيام عجزًا دائمًا. 2. مقدارها: إطعام مسكين عن كل يوم يُفطر فيه، ويقدر بنحو نصف صاع (1.5 كجم تقريبًا). 3. حكم التأخير: يجوز إخراجها على مدار الشهر أو دفعة واحدة.</p>


    </div>

  </section>
</main>
<?php require('views/parts/footer.php') ?>