const meal_price = 3 ;
const  dyah = 300000/meal_price ;




function calculate(kafara) {

    const result = document.getElementById("result");
    const countInput = document.getElementById("count");
    const count = parseInt(countInput.value);
    let peopleToFeed = 0;

    // التحقق إذا لم يُدخل العدد أو أدخل عدد غير صحيح
    if (!count || count < 1) {
      alert("يرجى إدخال عدد صحيح للكفارات المطلوبة.");
      countInput.focus();
      return; // نوقف التنفيذ
    }


    switch (kafara) {
      case "yamin": // كفارة يمين
        peopleToFeed = 10;
        break;
      case "nother": // كفارة يمين
        peopleToFeed = 10;
        break;
      case "ramadan": // إفطار متعمد في رمضان
        peopleToFeed = 60;
        break;
      case "qatal": // القتل غير العمد
        peopleToFeed = dyah;
        break;

      case "zihar": // الظهار (إذا لم يوجد عتق وصيام)
        peopleToFeed = 60;
        break;

      default:
        peopleToFeed = 0;
        return;
    }


    const price =  meal_price * peopleToFeed * count ;
    result.value = price.toFixed(2);
  }
  