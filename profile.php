<?php
include'config.php';

session_start();
$id=$_SESSION['userid'];
$data=$conn->prepare("select * from eusers where id='$id'");
$data->execute();
$row=$data->fetch(PDO::FETCH_OBJ);?>
<?php
if(isset($_POST['save'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];
  
$conn->exec("update eusers set name='$name',password='$pwd',username='$email'where id='$id' ");
  
  header("location:login.php");}
  
include"header.php";
?>
<div class="container">
  
    <div class="card shadow mb-4">
            <div class="card-header ">
             <a href="index.php" class="btn btn-danger" role="button" style="float: right">Back</a>
             <h1>User Detail</h1>
             
            </div>
  <div class="card-body">
  <form action="#" method="post">
    <div class="form-group">
      <label for="name">User Name:</label>
      <input type="text" class="form-control" value="<?= $row->name?>" name="name">
    </div>
     <div class="form-group">
      <label for="email"> Payment Amount</label>
      <input type="email" class="form-control" value="<?= $row->username?>" name="email">
    </div>
     
     <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" name="pwd" class="form-control" value="<?= $row->password?>">
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Update</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>