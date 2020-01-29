<?php
include"config.php";

session_start();
$data=$conn->prepare("select * from income_categories ");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
include"header.php";
?>
<div class="container-fluid">
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 >Income Category</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="addincomecategory.php" class="btn btn-info btn-lg" role="button" style="float:right"><i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Income-Category</th>
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
                    	echo"<td>$row->income_category</td>";?>
<td><a href="deleteincomecategory.php?delid=<?php echo $row->id?> "class="btn btn-danger" role="button" onclick="return confirm('do you want to delete it?')"><i class="fa fa-trash"></i></a></td>
<td><a href="editincomecategory.php?editid=<?php echo $row->id?> "class="btn btn-warning" role="button"><i class="fa fa-edit"></i></a></td>
<?php
echo"</tr>";
$i++;
                    }?>
                    
                     </tbody>
                </table>
              </div>
            </div>
          </div>
</div>
</div>
        <?php
        include"footer.php"?>