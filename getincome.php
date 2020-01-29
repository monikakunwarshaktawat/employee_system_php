<?php
include'config.php';
$catval=$_POST['cat_id'];
$date1=$_POST['incdate'];
$inc_date=date('Y-m-d',strtotime($date1));
$query="select incomes.*,income_categories.income_category from incomes inner join income_categories on income_categories.id=incomes.income_category_id";
if($catval && $inc_date){
  $query .=" where income_category_id='$catval' and income_date='$inc_date'";
}

$data=$conn->prepare($query);
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
?>
                  <thead>
                    <tr>
                     <th>S.no</th>
                      <th>Income Category </th>
                      <th>Income </th>
                      <th>Income date </th>
                      <th>Income Amount</th>
                      <th>Remarks</th>
                    
                      <th colspan="2">Action</th>
                   </tr>
                  </thead>
                  
                  <tbody>

                   <?php
                   $i=1;
                   $total=0;
                   foreach($result as $row)
                   {
                    
                    echo"<tr>";
                    echo"<td>$i</td>";
                    echo"<td>$row->income_category</td>";
                    echo"<td>$row->income_name</td>";
                    $total=$total+($row->amount);
                    $date2=date('d-M-Y',strtotime($row->income_date));
                    echo"<td>$date2</td>";
                    echo"<td>$row->amount</td>";
                    echo"<td>$row->remarks</td>";
                    ?>
                    <td><a href="deleteincome.php?delid=<?=$row->id?>" class="btn btn-danger" role="button" onclick="return confirm('do you want to delete it?')">Delete</a></td>
                    <td><a href="editincome.php?editid=<?=$row->id?>" class="btn btn-warning" role="button">Edit</a></td>
                    <?php
                    echo"</tr>";
                   $i++;
                 }
                   ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      
                      <th colspan="8">
                      <?php echo "Total income =$total"?></th>
                    </tr>
                  </tfoot>