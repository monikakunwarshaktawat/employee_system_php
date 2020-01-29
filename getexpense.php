<?php
include'config.php';


$catval=$_POST['catid'];
$date1=$_POST['inc_date'];
$var=explode('-',$date1);
$startdate=$var[0];
$enddate=$var[1];
$start_date=date('Y-m-d',strtotime($startdate));
$end_date=date('Y-m-d',strtotime($enddate));

$query="select expenses.*,expenses_categories.expensecategory from expenses inner join expenses_categories on expenses_categories.id=expenses.category_id";
if($catval && $start_date && $end_date){
  $query .=" where category_id='$catval' and expense_date between '$start_date' and '$end_date'";
}
$data=$conn->prepare($query);
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
?>
                  <thead>
                    <tr>
                     <th>S.no</th>
                      <th>Expenses Category </th>
                      <th>Expenses </th>
                      <th>Expenses date </th>
                      <th>Expenses Amount</th>
                    
                      <th colspan="2">Action</th>
                   </tr>
                  </thead>
                  
                  <tbody>

                   <?php
                   $i=1;
                   foreach($result as $row)
                   {
                    
                    echo"<tr>";
                    echo"<td>$i</td>";
                    echo"<td>$row->expensecategory</td>";
                    echo"<td>$row->expense</td>";
                   $date2=date('d-M-Y',strtotime($row->expense_date));
                    echo"<td>$date2</td>";
                    echo"<td>$row->amount</td>";
                    ?>
                    <td><a href="deleteexpense.php?delid=<?=$row->id?>" class="btn btn-danger" role="button">Delete</a></td>
                    <td><a href="editexpense.php?editid=<?=$row->id?>" class="btn btn-warning" role="button">Edit</a></td>
                    <?php
                    echo"</tr>";
                   $i++;
                 }
                   ?>
                  </tbody>
