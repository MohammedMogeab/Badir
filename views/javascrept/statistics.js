document.addEventListener('DOMContentLoaded', function() {
    const php_statistics = document.getElementById('statistics-from-php');
    const items_count_charts = document.getElementById('items-count-chart');
    const payments_sum_chart = document.getElementById('payments-sum-chart');
    const categoryFilter = document.getElementById('categoryFilter');
    const color_box_projects = document.getElementById('color-box-projects');
    const color_box_endowments = document.getElementById('color-box-endowments');
    const color_box_campaigns = document.getElementById('color-box-campaigns');
    const color_box_islamic_payments = document.getElementById('color-box-islamic-payments');
    const summaryValue = document.getElementById('summaryValue');


    // تحميل البيانات من PHP
    const statisticss = JSON.parse(JSON.parse(php_statistics.value));


    function resetcolors(){
        statisticss.projects.color = "#80cbc4";
        statisticss.endowments.color = "#1a237e";
        statisticss.campaigns.color = "#ff9800";
        statisticss.islamic_payments.color = "rgb(143, 156, 132)";
    }
    const colors = ["#2c5d63","yellow"];
    resetcolors();

    function drawChart(element,element2, statistics, colors, categoryFilter = "all") {
        // Validate input
        if (!statistics.all || statistics.all.count === 0 || statistics.all.sum === 0) {
          console.error("Invalid statistics: missing 'all' data or count or sum is zero");
          return;
        }
      
        // Calculate percentages (ensure numeric values)
        //"{\"all\":{\"sum\":272171.5,\"count\":60},\"campaigns\":{\"sum\":\"2120.25\",\"count\":15},\"endowments\":{\"sum\":\"13610.50\",\"count\":15},\"projects\":{\"sum\":\"2190.75\",\"count\":15},\"islamic_payments\":{\"sum\":\"254250.00\",\"count\":15}}"
        const total = parseFloat(statistics.all.count);
        const projectsPercent = (parseFloat(statistics.projects.count) / total) * 100;
        const endowmentsPercent = projectsPercent + (parseFloat(statistics.endowments.count) / total) * 100;
        const campaignsPercent = endowmentsPercent + (parseFloat(statistics.campaigns.count) / total) * 100;
        const totaldonates = parseFloat(statistics.all.sum);
        const projectsdonatesPercent = (parseFloat(statistics.projects.sum) / totaldonates) * 100;
        const endowmentsdonatesPercent = projectsdonatesPercent + (parseFloat(statistics.endowments.sum) / totaldonates) * 100;
        const campaignsdonatesPercent = endowmentsdonatesPercent + (parseFloat(statistics.campaigns.sum) / totaldonates) * 100;
        resetcolors();

        if(categoryFilter != "all"){
            statistics.projects.color = categoryFilter == "projects" ? statistics.projects.color : colors[0];
            statistics.endowments.color = categoryFilter == "endowments" ? statistics.endowments.color : colors[0];
            statistics.campaigns.color = categoryFilter == "campaigns" ? statistics.campaigns.color : colors[0];
            statistics.islamic_payments.color = categoryFilter == "islamic_payments" ? statistics.islamic_payments.color : colors[0];
        }

        color_box_endowments.style.backgroundColor = statistics.endowments.color;
        color_box_campaigns.style.backgroundColor = statistics.campaigns.color;
        color_box_islamic_payments.style.backgroundColor = statistics.islamic_payments.color;
        color_box_projects.style.backgroundColor = statistics.projects.color;
        // Validate calculations
        if ([projectsPercent, endowmentsPercent, campaignsPercent].some(isNaN)) {
          console.error("Invalid percentage calculations");
          return;
        }
      
        // Generate gradient string
        const gradient = `conic-gradient(
          ${statistics.projects.color} 0% ${projectsPercent}%,
          ${statistics.endowments.color} ${projectsPercent}% ${endowmentsPercent}%,
          ${statistics.campaigns.color} ${endowmentsPercent}% ${campaignsPercent}%,
          ${statistics.islamic_payments.color} ${campaignsPercent}% 100%
        )`;
        const gradient2 = `conic-gradient(
          ${statistics.projects.color} 0% ${projectsdonatesPercent}%,
          ${statistics.endowments.color} ${projectsdonatesPercent}% ${endowmentsdonatesPercent}%,
          ${statistics.campaigns.color} ${endowmentsdonatesPercent}% ${campaignsdonatesPercent}%,
          ${statistics.islamic_payments.color} ${campaignsdonatesPercent}% 100%
        )`;
      
        // Apply to element
        element.style.background = gradient;
        element2.style.background = gradient2;
        summaryValue.innerHTML = statisticss[categoryFilter].sum;
      }
      categoryFilter.parentElement.addEventListener("change", function() {
        drawChart(items_count_charts,payments_sum_chart, statisticss,colors, categoryFilter.value);
      });
      color_box_campaigns.parentElement.addEventListener("mouseenter", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, "campaigns");
      });
      color_box_campaigns.parentElement.addEventListener("mouseleave", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, categoryFilter.value);
      });
      color_box_endowments.parentElement.addEventListener("mouseenter", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, "endowments");
      });
      color_box_endowments.parentElement.addEventListener("mouseleave", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, categoryFilter.value);
      });
      color_box_islamic_payments.parentElement.addEventListener("mouseenter", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, "islamic_payments");
      });
      color_box_islamic_payments.parentElement.addEventListener("mouseleave", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, categoryFilter.value);
      });
      color_box_projects.parentElement.addEventListener("mouseenter", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, "projects");
      });
      color_box_projects.parentElement.addEventListener("mouseleave", function() {
          drawChart(items_count_charts,payments_sum_chart, statisticss, colors, categoryFilter.value);
      });
      
      drawChart(items_count_charts,payments_sum_chart, statisticss, colors, categoryFilter.value);

    // تهيئة أولية
    // updateChart();
});