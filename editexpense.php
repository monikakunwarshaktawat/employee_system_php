<html>
 <head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
</html>
<?php
include'config.php';

session_start();
$data=$conn->prepare("select * from expenses_categories");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
?>

<?php
include'config.php';
$id=$_GET['editid'];
$data=$conn->prepare("select * from expenses where id='$id'");
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
              $conn->exec("update expenses set expense='$name',expense_date='$date',amount='$amount',category_id='$category_id' where id='$id'");
              header("location:expenses.php");
            }

?>
<?php

 include'header.php';?>

        <!-- Begin Page Content -->
        <div class="container">
  <h1> Expense Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="expenses.php" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             <br>
            </div>
            
  <div class="card-body">
  <form  action="#" method="post" autocomplete="off">
    <div class="form-group">
      <label for="usr">Expense:</label>
      <input type="text" class="form-control" placeholder="enter the expense name" name="name" required="" value="<?= $row->expense?>">
    </div>
     <div class="form-group">
      <label for="date">Expense date:</label>
      <input type="text" class="form-control" placeholder="enter the expense date" name="date" required="" id="date1" value="<?= $row->expense_date?>">
    </div>
    <div class="form-group">
      <label for="amount">Expense amount:</label>
      <input type="text" class="form-control" placeholder="enter the expense amount" name="amount" required="" value="<?= $row->amount?>">
    </div>
    <div class="form-group">
  <label for="sel1">Expense Category:</label>
  <select class="form-control" id="sel1" name="category_id">
    <?php 
      foreach($result as $rrow){
        if($row->category_id==$rrow->id){
          $selected="selected";
        }
        else{
          $selected="";
        }
        echo "<option value=$rrow->id $selected>$rrow->expensecategory</option>";
      }
    ?>
  </select>
</div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
 <?php include'footer.php';?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script >
  $(function(){
    $("#date1").datepicker({
      dateFormat:'dd-M-yy'
    });
  });
</script>