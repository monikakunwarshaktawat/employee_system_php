  <?php
include"config.php";

session_start();
$id=$_GET['editid'];
$data=$conn->prepare("select * from clients where id='$id'");
$data->execute();
$result=$data->fetch(PDO::FETCH_OBJ);
if(isset($_POST['save']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $remark=$_POST['remark'];
  $conn->exec("update clients set client_name='$name',email_id='$email',contact='$contact',remarks='$remark'where id='$id'");
  header("location:client.php");
}
  ?> <?php 
  
       include"header.php";?>
        <!-- Begin Page Content -->
        <div class="container">
  <h1>Client Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="client.php" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
  <div class="card-body">
  <form action="#" method="post">
    <div class="form-group">
      <label for="usr">Client Name:</label>
      <input type="text" class="form-control"  value="<?= $result->client_name?>" name="name">
    </div>
     <div class="form-group">
      <label for="email">Email-Id</label>
      <input type="email" class="form-control"  value="<?= $result->email_id?>" name="email">
    </div>
     <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="number" class="form-control"  value="<?= $result->contact?>" name="contact">
    </div>
     <div class="form-group">
      <label for="remark">Remarks</label>
      <textarea class="form-control",rows="4" name="remark"><?= $result->remarks?></textarea>
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>