<?php
include'config.php';

session_start();
$data=$conn->prepare("select * from expenses_categories");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
?>
<?php include'header.php';?>

        <!-- Begin Page Content -->
        <div class="container-fluid">


       
    
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800  font-weight-bold pull-right">Expenses Category</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header ">
              <a href="addcategory.php" class="btn btn-info btn-lg" style="float: right" role="button"><i class="fa fa-plus"></i></a>
             
             
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.no.</th>
                     <th>Category Name</th>
                      
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                   <?php
                   $i=1;
        foreach($result as $row){
          echo"<tr>";
            
            echo "<td>$i</td>";
            echo "<td>$row->expensecategory</td>";?>
           
 <td><a href="deletecategory.php?delid=<?php echo $row->id ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
            <td><a href="editcategory.php?editid=<?php echo $row->id ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
          
             
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