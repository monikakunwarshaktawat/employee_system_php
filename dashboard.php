<?php
include"config.php";
session_start();
include'header.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
       <div class="container-fluid">

       
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">
          	<div class="col-md-5 mb-4">
          		<input type="text"  id="date" class="form-control">
          	</div>
          
          
      </div>
      <div class="row"></div>
          <div  id="work">

            <!-- Earnings (Monthly) Card Example -->
            </div>
          </div>


              
        <!-- /.container-fluid -->
<script src="theme/vendor/jquery/jquery.min.js"></script>
  <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="theme/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="theme/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="theme/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="theme/js/demo/chart-area-demo.js"></script>
  <script src="theme/js/demo/chart-pie-demo.js"></script>

      
     

<?php include'footer.php';?>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  

 <script >
  
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#date').html(start.format('D-MMMM-YYYY') + ' to ' + end.format('D-MMMM-YYYY'));
    }

    $('#date').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
$("#date").on('change',function(){
	var date=$(this).val();
	$.ajax({
		url:'getdata.php',
		type:'post',
		data:{'date1':date},
		success:function(data){
			$('#work').html(data);
		}
	})
});
</script>