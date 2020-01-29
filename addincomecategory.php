<?php
include"config.php";

session_start();
if(isset($_POST['save'])){
$name	=$_POST['name'];
$conn->exec("insert into income_categories(income_category)values('$name')");
header("location:income_category.php");
}?>
<?php
include"header.php";
?>
<div class="container-fluid">
	<h1 style="text-info">Income category form</h1>
	<div class="card shadow mb-4">
		<div class="card-header">
			<a href="income_category.php" class="btn btn-danger" role="button" style="float:right">Back</a>
		</div>
		<div class="card-body">
			<form action="#" method="post">
				<div class="form-group">
					<label for="name">Income category:</label>
					<input type="text" placeholder="enter the income category name" name="name" class="form-control">
				</div>
				<button type="submit"  class="btn btn-success"name="save">Submit</button>
			</form>
			
		</div>
	</div>
</div>
<?php include"footer.php";?>