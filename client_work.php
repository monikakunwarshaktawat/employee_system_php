<?php
include'config.php';

session_start();
$id=$_GET['clientid'];
$data=$conn->prepare("select * from clientworks where client_id=$id");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
$data1=$conn->prepare("select * from clients where id=$id");
$data1->execute();
$result1=$data1->fetch(PDO::FETCH_OBJ);
?>
<?php include'header.php';?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


       
    
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800  font-weight-bold pull-right"><?=$result1->client_name ." Works:-"?></h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="client.php" class="btn btn-danger" role="button" style="float: left">Back</a>
              <a href="addclientwork.php?client_id=<?php echo $id?>" class="btn btn-info pull-right" style="float: right" role="button">Add new Work</a>
             
             
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                  
                     <th>Work name</th>
                     <th>Amount</th>
                     <th>Work Start-date</th>
                     <th>Note</th>

                      
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                   <?php
                   $i=1;
        foreach($result as $row){
          echo"<tr>";
            
            echo "<td>$i</td>";
            echo "<td>$row->workname</td>";
            echo "<td>$row->amount</td>";
            echo "<td>$row->work_start_date</td>";
            echo "<td>$row->note</td>";
            ?>
           
 <td><a href="deleteclientwork.php?delid=<?php echo $row->id ?>&id1=<?php echo $id?>" onclick="return confirm('Are you sure want to delete it')" class="btn btn-danger">Delete</a></td>
            <td><a href="editclientwork.php?editid=<?php echo $row->id?>&id1=<?php echo $id?>"  class="btn btn-warning">Edit</a></td>
            
          
             
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