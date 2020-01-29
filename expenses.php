 <html>
 <head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
</html>
 <?php
include'config.php';

session_start();
$datas=$conn->prepare("select * from expenses_categories");
$datas->execute();
$results=$datas->fetchall(PDO::FETCH_OBJ);


$data=$conn->prepare("select expenses.*,expenses_categories.expensecategory from expenses inner join expenses_categories on expenses_categories.id=expenses.category_id");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
       
    
  
 include'header.php';?>
<html>
<head>
       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
       </head></html>
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800  font-weight-bold pull-right">Expenses-Details</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header ">
             


             
            </div>
            <div class="card-body">
              
               
                <div class="row">
  <div class="col-md-4 select-outline">

    <select class="form-control" id="exp_cat">
  <option value="">Select expense category</option>
   <?php 
      foreach($results as $rows){
        echo "<option value=$rows->id>$rows->expensecategory</option>";
      }
    ?>
</select>
</div>
<div class="col-md-4 select-outline">
  <input type="text" class="form-control" id="date">
</div>
<div class="col-md-2 select-outline">
  <button class="btn btn-primary btn-lg" id="search"><i class="fas fa-search"></i></button>
</div>
<div class="col-md-2 mb-4 select-outline"><a href="addexpenses.php" class="btn btn-info btn-lg" role="button" style="float:right"><i class="fa fa-plus"></i></a></div>
              
            </div>   
<div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="mydata">
                  <thead>
                    <tr>
                     <th>S.no</th>
                      <th> Category </th>
                      <th>Expenses </th>
                      <th>Date </th>
                      <th> Amount [ <i class="fa fa-rupee-sign"></i> ]</th>
                    
                      <th colspan="2">Action</th>
                   </tr>
                  </thead>
                  
                  <tbody>

                   <?php
                   $i=1;
                   $expense=0;
                   foreach($result as $row)
                   {
                    
                    echo"<tr>";
                    echo"<td>$i</td>";
                    echo"<td>$row->expensecategory</td>";
                    echo"<td>$row->expense</td>";
                    $expense=$expense+$row->amount;
                    $date1=date('d-M-Y',strtotime($row->expense_date));
                    echo"<td>$date1</td>";
                    echo"<td>$row->amount</td>";
                    ?>
                    <td><a href="deleteexpense.php?delid=<?=$row->id?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a></td>
                    <td><a href="editexpense.php?editid=<?=$row->id?>" class="btn btn-warning" role="button"><i class="fa fa-edit"></i></a></td>
                    <?php
                    echo"</tr>";
                   $i++;
                 }
                   ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="7">Total expense= <i class="fa fa-rupee-sign"></i> <?= $expense." "?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
 <?php include'footer.php';?> 
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  

 <script >
  
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#date').html(start.format('D-MMMM-YYYY') + ' to ' + end.format('D-MMMM-YYYY'));
    }

    $('#date').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});

   
   $('#search').on('click',function(){
    var category_id=$('#exp_cat').val();
    var incdate=$('#date').val();
    $.ajax(
{
  url:'getexpense.php',
  type:'post',
  data:{'catid':category_id,'inc_date':incdate},
  success:function(data){
  $('#mydata').html(data);
  }
})
   });
    
 </script>
 