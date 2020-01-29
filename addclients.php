<?php 


session_start();
include "config.php";
if(isset($_POST['save']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $remark=$_POST['remark'];
  
  $conn->exec("insert into clients(client_name,email_id,contact,remarks) values('$name','$email','$contact','$remark')");
  header("location:client.php");
}
?>

       <?php 
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
      <input type="text" class="form-control" placeholder="enter the client name" name="name">
    </div>
     <div class="form-group">
      <label for="email">Email-Id</label>
      <input type="email" class="form-control" placeholder="enter the Email-Id" name="email">
    </div>
     <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="text" class="form-control" placeholder="enter the contact number" name="contact">
    </div>
     <div class="form-group">
      <label for="remark">Remarks</label>
      <textarea class="form-control",rows="4" name="remark"></textarea>
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>