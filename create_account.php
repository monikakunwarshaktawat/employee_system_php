<?php
session_start();
include"config.php";
if(isset($_POST['save'])){
	$name=$_POST['name'];
	$number=$_POST['acc_no'];
	$conn->exec("insert into accounts(account_name,account_no) values('$name','$number')");
}
include"header.php";

?>
<div class="container-fluid">
	<h1>Create account:-</h1>
	<div class="card shadow mb-4">
	<div class="card-header">
	<a href="account.php" class="btn btn-danger" style="float:right">Back</a>
	</div>
	<div class="card-body">
		<form action="#" method="post">
			<div class="form-group">
				<label>Account name</label>
				<input type="text" name="name" class="form-control" required="" placeholder="enter the account name">
			</div>
			<div class="form-group">
				<label>Account number</label>
				<input type="number" name="acc_no" class="form-control" required="" placeholder="enter the account number">
			</div>
			<button type="submit" name="save" class="btn btn-success">Submit</button>
		</form>
	</div>
</div></div>