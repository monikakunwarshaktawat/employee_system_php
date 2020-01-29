<?php
include 'config.php';

session_start();
$id=$_GET['editid'];
$data=$conn->prepare("select * from expenses_categories where id='$id' ");
$data->execute();
$row=$data->fetch(PDO::FETCH_OBJ);
if(isset($_POST['save'])){
	$name=$_POST['name'];
	
$conn->exec("update expenses_categories set expensecategory='$name'where id='$id'");
	header("location:expenses_category.php");
}
?>
<?php include'header.php';?>

        <!-- Begin Page Content -->
        <div class="container">
  <h1>Expenses category Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="expenses_category.php" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
  <div class="card-body">
  <form action="#" method="post">
    <div class="form-group">
      <label for="usr">Expenses Category:</label>
      <input type="text" class="form-control" value="<?=$row->expensecategory?>" name="name">
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>