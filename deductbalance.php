<?php
include"config.php";
session_start();
$id=$_GET['acc_id'];
if(isset($_POST['save'])){
	$amount=$_POST['amount'];
	$date1=$_POST['deductdate'];
    $date=date('Y-m-d',strtotime($date1));
    $remark=$_POST['remark'];
    $conn->exec("insert into deduct_balance(acc_id,deduct_date,deduct_amount,remarks)values('$id','$date','$amount','$remark')");
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
					<input type="number" name="amount" class="form-control" placeholder="enter the amount to be deducted" required="">
				</div>
				<div class="form-group">
					<label>Date:-</label>
					<input type="text" id="date" name="deductdate" class="form-control" required="">
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