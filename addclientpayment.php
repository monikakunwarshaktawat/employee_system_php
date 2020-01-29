<?php 
session_start();
include "config.php";
$id=$_GET['pay_id'];
if(isset($_POST['save']))
{
  $date=$_POST['date'];
  $amount=$_POST['amount'];
  $remarks=$_POST['remarks'];
  $conn->exec("insert into clientpayments (clientid,pay_date,pay_amount,remarks) values('$id','$date','$amount','$remarks')");
  header("location:client_payment.php?payid=$id");
  }
?>

       <?php 
       include"header.php";?>
        <!-- Begin Page Content -->
        <div class="container">
  <h1>Client Payment Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="client_payment.php?payid=<?php echo $id?>" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
  <div class="card-body">
  <form action="#" method="post">
    <div class="form-group">
      <label for="date">Payment date:</label>
      <input type="date" class="form-control" placeholder="enter the payment date" name="date">
    </div>
     <div class="form-group">
      <label for="amount"> Payment Amount</label>
      <input type="number" class="form-control" placeholder="enter the payment amount" name="amount">
    </div>
     
     <div class="form-group">
      <label for="remarks">Remarks</label>
      <textarea class="form-control",rows="4" name="remarks"></textarea>
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>