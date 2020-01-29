<?php
include"config.php";

session_start();
$id=$_GET['editid'];
$data=$conn->prepare("select * from income_categories where id='$id'");
$data->execute();
$row=$data->fetch(PDO::FETCH_OBJ);
if(isset($_POST['save']))
{
	$name=$_POST['name'];
	$conn->exec("update income_categories set income_category='$name' where id='$id'");
	header("location:income_category.php");
}
include 'header.php';
?>
<div class="container">
	<h1 style="text-info">Income category form</h1>
	<div class="card shadow mb-4">
		<div class="card-header">
			<a href="income_category.php" class="btn btn-danger" role="button" style="float: right">Back</a>
		</div>
		<div class="card-body">
			<form action="#" method="post">
		
				<div class="form-group">
					<label>Income category</label>
					<input type="text" value="<?= $row->income_category?>" name="name" class="form-control">
				</div>
				<button type="submit"  class="btn btn-success"name="save">Submit</button>
			</form>
			
		</div>
	</div>
</div>