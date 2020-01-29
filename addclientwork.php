<?php 

session_start();
include "config.php";
$id=$_GET['client_id'];
if(isset($_POST['save']))
{
  $name=$_POST['name'];
  $amount=$_POST['amount'];
  $date=$_POST['date'];
  $note=$_POST['note'];
  
  $conn->exec("insert into clientworks(client_id,workname,amount,work_start_date,note) values('$id','$name','$amount','$date','$note')");
  header("location:client_work.php?clientid=$id");
}
?>

       <?php 
       include"header.php";?>
        <!-- Begin Page Content -->
        <div class="container">
  <h1>Client work Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="client_work.php?clientid=<?php echo $id?>" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
  <div class="card-body">
  <form action="#" method="post">
    <div class="form-group">
      <label for="usr"> Name of Work:</label>
      <input type="text" class="form-control" placeholder="enter the work" name="name">
    </div>
     <div class="form-group">
      <label for="amount">Amount</label>
      <input type="number" class="form-control" placeholder="enter the work amount" name="amount">
    </div>
     <div class="form-group">
      <label for="date">Work Start date:</label>
      <input type="date" class="form-control" placeholder="enter the work start date" name="date">
    </div>
     <div class="form-group">
      <label for="note">NOTE</label>
      <textarea class="form-control",rows="4" name="note"></textarea>
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>