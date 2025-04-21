const money_zakatRate = 0.025;
const minerals_zakatRate = 0.2;

const gold_boundarie = 85 ; // 85 grams of gold is the minimum amount of gold that requires zakat
const silver_boundarie = 595  ; // 595 grams of silver is the minimum amount of silver that requires zakat


const goldPrice = 104.12; // Price of gold in $ per gram
const silverPrice = 1.03; // Price of silver in $ per gram





function calculate() {


    const money_amount = parseFloat(document.getElementById("money_amount").value);
    const money_gold_amount = parseFloat(document.getElementById("money_gold_amount").value);
    const money_silver_amount = parseFloat(document.getElementById("money_silver_amount").value);
    const minerals_amount = parseFloat(document.getElementById("minerals_amount").value);
    const minerals_gold_amount = parseFloat(document.getElementById("minerals_gold_amount").value);
    const minerals_silver_amount = parseFloat(document.getElementById("minerals_silver_amount").value);

    const result = document.getElementById("result");
  

    let money_zakat = 0 ;
    let money_gold_zakat = 0 ;
    let money_silver_zakat = 0 ;
    let minerals_zakat = 0 ;
    let minerals_gold_zakat = 0 ;
    let minerals_silver_zakat = 0 ;


    if (money_amount > (gold_boundarie * goldPrice)) {
      money_zakat =  money_amount * money_zakatRate
    }
    if (money_gold_amount > (gold_boundarie)) {
      money_gold_zakat =  money_gold_amount * goldPrice *  money_zakatRate
    }
    if (money_silver_amount > (silver_boundarie)) {
      money_silver_zakat =  money_silver_amount * silverPrice * money_zakatRate
    }
    
 alert(money_zakat);
    if (minerals_amount > (gold_boundarie * goldPrice)) {
      minerals_zakat =  minerals_amount * minerals_zakatRate
    }
    if (minerals_gold_amount > (gold_boundarie)) {
      minerals_gold_zakat =  minerals_gold_amount * goldPrice *  minerals_zakatRate
    }
    if (minerals_silver_amount > (silver_boundarie)) {
      minerals_silver_zakat =  minerals_silver_amount * silverPrice * minerals_zakatRate
    }



    const cresult = money_zakat + money_gold_zakat + money_silver_zakat + minerals_zakat + minerals_gold_zakat +minerals_silver_zakat;
    result.value = cresult.toFixed(2);
  }
  