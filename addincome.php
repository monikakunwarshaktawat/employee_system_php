<html>
 <head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
</html>
<?php
include'config.php';

session_start();
$data=$conn->prepare("select * from income_categories");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
if(isset($_POST['save']))
            {
              $name=$_POST['name'];
              $date1=$_POST['date'];
$date=date('Y-m-d',strtotime($date1));
              $amount=$_POST['amount'];
              $category_id=$_POST['category_id'];
              $remarks=$_POST['remarks'];
              $conn->exec("insert into incomes(income_name,income_category_id,income_date,amount,remarks) values ('$name','$category_id','$date','$amount','$remarks')");
              header("location:income.php");
            }
?>
<?php include'header.php';?>

        <!-- Begin Page Content -->
        <div class="container">
  <h1>Income  Form:-</h1>
    <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="income.php" class="btn btn-warning pull-right" style="float: right" role="button"> Back</a>
             
             
            </div>
            
  <div class="card-body">
  <form  action="#" method="post">
    <div class="form-group">
      <label for="usr">Income:</label>
      <input type="text" class="form-control" placeholder="enter the income name" name="name" required="">
    </div>
     <div class="form-group">
      <label for="date">Income date:</label>
      <input type="text" class="form-control" placeholder="enter the income date" name="date" id="dates"required="">
    </div>
    <div class="form-group">
      <label for="amount">Income amount:</label>
      <input type="number" class="form-control" placeholder="enter the income amount" name="amount" required="">
    </div>

    <div class="form-group">
  <label for="sel1">Income Category:</label>
  <select class="form-control" id="sel1" name="category_id">
    <option value="">-Select Category-</option>
    <?php 
      foreach($result as $row){
        echo "<option value=$row->id>$row->income_category</option>";
      }
    ?>
  </select>
</div>
    <div class="form-group">
      <label>Remarks:</label>
      <textarea name="remarks" class="form-control" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-success " name="save">Submit</button>
  </form>
</div>
</div>
<?php include 'footer.php';?>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script >
$(function(){
  $("#dates").datepicker({
  dateFormat:'dd-M-yy'})
});
</script>