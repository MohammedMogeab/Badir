const sheep_price = 125;

const  dyah = 300000/meal_price ;




function calculate(kafara) {
 alert(kafara);
    const result = document.getElementById("result");
    const countInput = document.getElementById("count");
    const count = parseInt(countInput.value);
    let aqiqah = 0;

    // التحقق إذا لم يُدخل العدد أو أدخل عدد غير صحيح
    if (!count || count < 1) {
      alert("يرجى إدخال عدد صحيح للكفارات المطلوبة.");
      countInput.focus();
      return; // نوقف التنفيذ
    }


    switch (kafara) {
      case "male": 
        aqiqah = 2;
        break;
      case "female": 
      aqiqah = 1;
        break;
      default:
        aqiqah = 0;
        return;
    }


    const price =  sheep_price * aqiqah * count ;
    result.value = price.toFixed(2);
  }
  