<?php
include'config.php';
$date=$_POST['date1'];
$var=explode('-',$date);
$start=$var[0];
$end=$var[1];
$sdate=date('Y-m-d',strtotime($start));
$edate=date('Y-m-d',strtotime($end));
$query1="select sum(amount) as amount from expenses where expense_date between '$sdate' and '$edate'";

$data1=$conn->prepare($query1);
$data1->execute();
$epxres=$data1->fetch(PDO::FETCH_OBJ);
$expense=$epxres->amount;
$query2="select sum(amount) as incamount from incomes where income_date between'$sdate'and'$edate'";

$data2=$conn->prepare($query2);
$data2->execute();
$result2=$data2->fetch(PDO::FETCH_OBJ);
$income=$result2->incamount;

$profit=$income-$expense;
$exp=($expense/$income)*100;
$pro=round(($profit/$income)*100);
?>
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="income.php">Total Income</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" ><?= $income."Rs."?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="expenses.php">Total Expenses</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $expense."Rs"?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Balance</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $profit."Rs."?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Expense
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Profit
                    </span>
                   
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php


$query1="select sum(amount) as amounts from incomes where MONTH(income_date)=01 ";

$data1=$conn->prepare($query1);
$data1->execute();
$jan=$data1->fetch(PDO::FETCH_OBJ);
$Jan=$jan->amounts;
$query2="select sum(amount) as amounts from incomes where MONTH(income_date)=02 ";

$data2=$conn->prepare($query2);
$data2->execute();
$feb=$data2->fetch(PDO::FETCH_OBJ);
$Feb=$feb->amounts;
$query3="select sum(amount) as amounts from incomes where MONTH(income_date)=03 ";

$data3=$conn->prepare($query3);
$data3->execute();
$mar=$data3->fetch(PDO::FETCH_OBJ);
$Mar=$mar->amounts;
$query4="select sum(amount) as amounts from incomes where MONTH(income_date)=04 ";

$data4=$conn->prepare($query4);
$data4->execute();
$apr=$data4->fetch(PDO::FETCH_OBJ);
$Apr=$apr->amounts;
$query5="select sum(amount) as amounts from incomes where MONTH(income_date)=05 ";

$data5=$conn->prepare($query5);
$data5->execute();
$may=$data5->fetch(PDO::FETCH_OBJ);
$May=$may->amounts;
$query6="select sum(amount) as amounts from incomes where MONTH(income_date)=06 ";

$data6=$conn->prepare($query6);
$data6->execute();
$jun=$data6->fetch(PDO::FETCH_OBJ);
$Jun=$jun->amounts;
$query7="select sum(amount) as amounts from incomes where MONTH(income_date)=07 ";

$data7=$conn->prepare($query7);
$data7->execute();
$jul=$data7->fetch(PDO::FETCH_OBJ);
$Jul=$jul->amounts;
$query8="select sum(amount) as amounts from incomes where MONTH(income_date)=08 ";

$data8=$conn->prepare($query8);
$data8->execute();
$aug=$data8->fetch(PDO::FETCH_OBJ);
$Aug=$aug->amounts;
$query9="select sum(amount) as amounts from incomes where MONTH(income_date)=09 ";

$data9=$conn->prepare($query9);
$data9->execute();
$sep=$data9->fetch(PDO::FETCH_OBJ);
$Sep=$sep->amounts;
$query10="select sum(amount) as amounts from incomes where MONTH(income_date)=10 ";

$data10=$conn->prepare($query10);
$data10->execute();
$oct=$data10->fetch(PDO::FETCH_OBJ);
$Oct=$oct->amounts;
$query11="select sum(amount) as amounts from incomes where MONTH(income_date)=11 ";

$data11=$conn->prepare($query11);
$data11->execute();
$nov=$data11->fetch(PDO::FETCH_OBJ);
$Nov=$nov->amounts;
$query12="select sum(amount) as amounts from incomes where MONTH(income_date)=12";

$data12=$conn->prepare($query12);
$data12->execute();
$dec=$data12->fetch(PDO::FETCH_OBJ);
$Dec=$dec->amounts;
?>
            <script src="theme/vendor/jquery/jquery.min.js"></script>
  <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="theme/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="theme/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="theme/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
  	Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");

var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Expense", "Profit"],
    datasets: [{
      data: [<?= $exp?> ,<?= $pro?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

  </script>

      
 <script >
 	// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?= $Jan?>,<?= $Feb?>,<?= $Mar?>,<?= $Apr?>,<?= $May?>,<?= $Jun?>,<?= $Jul?>,<?= $Aug?>,<?= $Sep?>,<?= $Oct?>,<?= $Nov?>,<?= $Dec?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rs.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rs.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

 </script>    