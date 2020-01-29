<?php
include'config.php';
$date1=$_POST['expdate'];
$date=date('Y-m-d',strtotime($date1));
$query="select expenses.*,expenses_categories.expensecategory from expenses inner join expenses_categories on expenses_categories.id=expenses.category_id";
if($date){
  $query .=" where expense_date='$date'";
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
