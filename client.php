<?php
include'config.php';

session_start();
$data=$conn->prepare("select * from clients");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);

?>
<?php include'header.php';?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


       
    
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800  font-weight-bold pull-right">Clients Details</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="addclients.php" class="btn btn-info pull-right" style="float: right" role="button">Add new Client</a>
             
             
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                     <th>Client Name</th>
                     <th>Email-Id</th>
                     <th>Contact</th>
                     <th>Remark</th>
                      <th>Due payment</th>
                      <th colspan="5">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                   <?php
                   $i=1;
        foreach($result as $row){
          echo"<tr>";
            
            echo "<td>$i</td>";
            echo "<td>$row->client_name</td>";
            echo "<td>$row->email_id</td>";
            echo "<td>$row->contact</td>";
            echo "<td>$row->remarks</td>";
          
            
          
             $id=$row->id;
  $data1=$conn->prepare("select * from clientworks where client_id='$id'");
  $data1->execute();
  $result1=$data1->fetchall(PDO::FETCH_OBJ);
  $data2=$conn->prepare("select * from clientpayments where clientid='$id'");
  $data2->execute();
  $result2=$data2->fetchall(PDO::FETCH_OBJ);
  $total1=0;
  $total2=0;
  foreach($result1 as $r2)
  {
    $total1=$total1+$r2->amount;
  }
  foreach ($result2 as$r3) {
    $total2=$total2+$r3->pay_amount;
  }
  $due=$total1-$total2;
  echo"<td> $due</td>";
  
   ?>       
 <td><a href="deleteclient.php?delid=<?php echo $row->id ?>" onclick="return confirm('Are you sure want to delete it')" class="btn btn-danger">Delete</a></td>
            <td><a href="editclient.php?editid=<?php echo $row->id ?>"  class="btn btn-warning">Edit</a></td>
            <td><a href="client_work.php?clientid=<?php echo $row->id ?>" class="btn btn-info" role="button">Work</a></td>
            <td><a href="client_payment.php?payid=<?php echo $row->id ?>" class="btn btn-success" role="button">Payment</a></td>
          
             <td><a href="client_view.php?viewid=<?php echo $row->id?>" class="btn btn-secondary" role="button">View</a></td>
              <?php echo"</tr>";
              $i++;
        }
          
        
        ?>
        
    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
 <?php include'footer.php';?>