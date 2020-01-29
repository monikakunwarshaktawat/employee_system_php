<?php
include"config.php";
session_start();
$id=$_GET['editid'];
$data=$conn->prepare("select * from accounts where id='$id'");
$data->execute();
$result=$data->fetch(PDO::FETCH_OBJ);
if(isset($_POST['save']))
{
	$name=$_POST['name'];
	$number=$_POST['acc_no'];
	$conn->exec("update accounts set account_name='$name',account_no='$number' where id='$id'");
	header("location:account.php");
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
				<input type="text" name="name" class="form-control" required="" value="<?= $result->account_name?>">
			</div>
			<div class="form-group">
				<label>Account number</label>
				<input type="number" name="acc_no" class="form-control" required="" value="<?= $result->account_no?>">
			</div>
			<button type="submit" name="save" class="btn btn-success">Submit</button>
		</form>
	</div>
</div></div>