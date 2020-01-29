
<?php
include'config.php';
session_start();
$data=$conn->prepare("select * from income_categories");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
?>

<?php
include'config.php';
$id=$_GET['editid'];
$data=$conn->prepare("select * from incomes where id='$id'");
$data->execute();
$row=$data->fetch(PDO::FETCH_OBJ);
?>
<?php
if(isset($_POST['save']))
{
             $name=$_POST['name'];
              $date1=$_POST['date'];
              $date=date('Y-m-d',strtotime($date1));
              $amount=$_POST['amount'];
              $category_id=$_POST['category_id'];
              $remarks=$_POST['remarks'];
              $conn->exec("update incomes set income_name='$name',income_date='$date',amount='$amount',income_category_id='$category_id',remarks='$remarks' where id='$id'");
              header("location:income.php");
            }

?>
<?php include'header.php';?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Begin Page Content -->
        <div class="container">
  <h1> Income Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="income.php" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             <br>
            </div>
            
  <div class="card-body">
  <form  action="#" method="post">
    <div class="form-group">
      <label for="usr">Income Name:</label>
      <input type="text" class="form-control"  name="name" required="" value="<?= $row->income_name?>">
    </div>
     <div class="form-group">
      <label for="date">Income date:</label>
      <input type="text" class="form-control"  name="date" id="dates" required="" value="<?= $row->income_date?>">
    </div>
    <div class="form-group">
      <label for="amount">Income amount:</label>
      <input type="text" class="form-control" name="amount" required="" value="<?= $row->amount?>">
    </div>
    <div class="form-group">
  <label for="sel1">Income Category:</label>
  <select class="form-control" id="sel1" name="category_id">
    <?php 
      foreach($result as $rrow){
        if($row->income_category_id==$rrow->id){
          $selected="selected";
        }
        else{
          $selected="";
        }
        echo "<option value=$rrow->id $selected>$rrow->income_category</option>";
      }
    ?>
  </select>
</div>
    <div class="form-group">
      <label>Remarks:</label>
      <textarea name="remarks" class="form-control" rows="4"><?= $row->remarks?></textarea>
    </div>
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script >
  $(function(){
    $("#dates").datepicker({
      dateFormat:'dd-M-yy'
    });
  });
</script>