<?php
include"config.php";
$id=$_GET['acc_id'];
session_start();
if(isset($_POST['save'])){
	$amount=$_POST['amount'];
	$date1=$_POST['adddate'];
    $date=date('Y-m-d',strtotime($date1));
    $remark=$_POST['remark'];
    $conn->exec("insert into add_balance(acc_id,add_date,add_amount,remarks)values('$id','$date','$amount','$remark')");
    header("location:account.php");

}
include"header.php";
?>

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="container-fluid">
	<div class="card shadow-mb-4">
		<div class="card-header">
			<a href="account.php" class="btn btn-danger" style="float: right">Back</a>
		</div>
		<div class="card-body">
			<form action="#" method="post">
				<div class="form-group">
					<label>Amount:-</label>
					<input type="number" name="amount" class="form-control" placeholder="enter the amount to be added" required="">
				</div>
				<div class="form-group">
					<label>Date:-</label>
					<input type="text" id="date" name="adddate" value="" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Remarks</label>
					<textarea name="remark" rows="2" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn btn-success" name="save">Submit</button>
			</form>
		</div>
	</div>
</div>
<?php 
include"footer.php";
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
	$(function() {
  $("#date").daterangepicker({
  	
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),12)
  }).datepicker("setDate",'now');
});
</script>