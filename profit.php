<?php

session_start();
include"header.php";
?>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class= "container">
	<div class="card shadow mb-4">
		<div class="card-header">
      <div class="row">
        <div class="col-md-5  select-outline">
			<input type="text" class="form-control" id="date"></div>
      </div>
		</div>
	</div>
</div>
		<div id="result"></div>

<?php include"footer.php";?>
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
  	var date_1=$(this).val()
  	$.ajax({
  		url:'getprofit.php',
  		type:'post',
  		data:{'date1':date_1,},
  		success:function(data){
  			$("#result").html(data);
  		}
  	})
  });
</script>