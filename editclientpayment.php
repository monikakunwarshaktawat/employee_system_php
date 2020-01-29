<?php
include"config.php";

session_start();
$id=$_GET['editid'];
$pay_id=$_GET['id1'];
$data=$conn->prepare("select * from clientpayments where id='$id'");
$data->execute();
$row=$data->fetch(PDO::FETCH_OBJ);
if(isset($_POST['save']))
{
	$date=$_POST['date'];
  $amount=$_POST['amount'];
  $remarks=$_POST['remarks'];
  $conn->exec("update clientpayments set pay_date='$date',pay_amount='$amount',remarks='$remarks' where id='$id'");
  header("location:client_payment.php?payid=$pay_id");
}
?>
<?php 
       include"header.php";?>
        <!-- Begin Page Content -->
        <div class="container">
  <h1>Client Payment Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="client_payment.php?payid=<?php echo $pay_id?>" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
  <div class="card-body">
  <form action="#" method="post">
    <div class="form-group">
      <label for="date">Payment date:</label>
      <input type="date" class="form-control" value="<?=$row->pay_date?>" name="date">
    </div>
     <div class="form-group">
      <label for="amount"> Payment Amount</label>
      <input type="number" class="form-control" value="<?=$row->pay_amount?>" name="amount">
    </div>
     
     <div class="form-group">
      <label for="remarks">Remarks</label>
      <textarea class="form-control",rows="4" name="remarks"><?= $row->remarks?></textarea>
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>