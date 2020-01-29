<?php
include "config.php";

session_start();
$id=$_GET['editid'];
$cid=$_GET['id1'];
$data=$conn->prepare("select * from clientworks where id='$id'");
$data->execute();
$result=$data->fetch(PDO::FETCH_OBJ);
if(isset($_POST['save'])){
   $name=$_POST['name'];
  $amount=$_POST['amount'];
  $date=$_POST['date'];
  $note=$_POST['note'];
  $conn->exec("update clientworks set workname='$name',amount='$amount',work_start_date='$date',note='$note' where id='$id'");
  header("location:client_work.php?clientid=$cid");
}
?>
<?php 
       include"header.php";?>
        <!-- Begin Page Content -->
        <div class="container">
  <h1>Client work Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="client_work.php?clientid=<?php echo $cid ?>" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
  <div class="card-body">
  <form action="#" method="post">
    <div class="form-group">
      <label for="usr"> Name of Work:</label>
      <input type="text" class="form-control" value="<?= $result->workname?>" name="name"> 
    </div>
     <div class="form-group">
      <label for="amount">Amount</label>
      <input type="number" class="form-control" value="<?= $result->amount?>"name="amount">
    </div>
     <div class="form-group">
      <label for="date">Contact:</label>
      <input type="date" class="form-control" value="<?= $result->work_start_date?>"name="date">
    </div>
     <div class="form-group">
      <label for="note">NOTE</label>
      <textarea class="form-control",rows="4" name="note"><?= $result->note ?></textarea>
    </div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>