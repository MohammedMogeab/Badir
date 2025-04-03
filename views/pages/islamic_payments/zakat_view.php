<?php require('views/parts/head.php') ?>
<?php require('views/parts/adminbar.php') ?>
<?php require('views/parts/navgtion.php') ?>
<?php require('views/parts/header.php') ?>

<main>
  <section class="form_zakat">
    <h1>حاسبة الزكاة</h1>
    <img src="" alt="">
    <p>"تجب الزكاة على المال إذا حال عليه الحول، 
      أي مر عليه عامٌ كامل وفق التقويم الهجري،
       وذلك في الأموال النقدية والذهب والفضة
       وعروض التجارة. أما الزروع والثمار،
       فتجب زكاتها عند الحصاد، لقوله تعالى:
       (وَآتُوا حَقَّهُ يَوْمَ حَصَادِهِ) [الأنعام: 141].
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

    <!-- زر الحساب -->
    <button class="calc-button" type="submit" nmae="calc_zakat">احسب الزكاة</button>
  </div>
  
  </section>
</main>
<?php require('views/parts/footer.php') ?>