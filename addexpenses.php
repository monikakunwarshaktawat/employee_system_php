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
if(isset($_POST['save']))
            {
              $name=$_POST['name'];
              $date1=$_POST['date'];
              $date=date('Y-m-d',strtotime($date1));
              $amount=$_POST['amount'];
              $category_id=$_POST['category_id'];
              $conn->exec("insert into expenses(expense,category_id,expense_date,amount) values ('$name','$category_id','$date','$amount')");
              header("location:expenses.php");
            }
?>
<?php include'header.php';?>

        <!-- Begin Page Content -->
        <div class="container">
  <h1>Expenses  Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="expenses.php" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
            
  <div class="card-body">
  <form  action="#" method="post">
    <div class="form-group">
      <label for="usr">Expense:</label>
      <input type="text" class="form-control" placeholder="enter the expense name" name="name" required="">
    </div>
     <div class="form-group">
      <label for="date">Expense date:</label>
      <input type="text" class="form-control" placeholder="enter the expense date" id="date1" name="date" required="">
    </div>
    <div class="form-group">
      <label for="amount">Expense amount:</label>
      <input type="number" class="form-control" placeholder="enter the expense amount" name="amount" required="">
    </div>
    
    <div class="form-group">
  <label for="sel1">Expense Category:</label>
  <select class="form-control" id="sel1" name="category_id">
    <option value="">-Select Category-</option>
    <?php 
      foreach($result as $row){
        echo "<option value=$row->id>$row->expensecategory</option>";
      }
    ?>
  </select>
</div>
    
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div><?php include"footer.php";
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script >
  $(function(){
    $("#date1").datepicker({
      dateFormat:'dd-M-yy'
    });
  });
</script>