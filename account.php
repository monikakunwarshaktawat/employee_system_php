<?php 
session_start();
include"config.php";
include"header.php";
$data=$conn->prepare("select * from accounts ");
$data->execute();
$result=$data->fetchall(PDO::FETCH_OBJ);
?>
<div class="container-fluid">
	
	<div class="card shadow mb-4">
		<div class="card-header">
			<a href="create_account.php" class="text-primary" style="float:right"><i class="fas fa-user-plus"> CreateNew account</i></a>
		</div>
		<div class="card-body">
			<div class="card-deck">
				<?php 
foreach($result as $row){
	$data1=$conn->prepare("select sum(add_amount) as amount1 from add_balance where acc_id='$row->id' ");
$data1->execute();
$result1=$data1->fetch(PDO::FETCH_OBJ);
$credit=$result1->amount1;
$data2=$conn->prepare("select sum(deduct_amount)as amount2 from deduct_balance where acc_id='$row->id' ");
$data2->execute();
$result2=$data2->fetch(PDO::FETCH_OBJ);
$debit=$result2->amount2;
$balance=$credit-$debit;
				?>
				<div class="card shadow mb-4">
                  
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">  <?=$row->account_name?></h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-primary-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item text-success"  href="addbalance.php?acc_id=<?php echo $row->id?>">Add balance</a>
                      <a class="dropdown-item text-danger" href="deductbalance.php?acc_id=<?php echo $row->id?>">Deduct balance</a>
                     
                    </div>
                  </div>
                </div>
                  <div class="card-body">
					<?php
                   
                    echo"  ";
                    echo "<b> $row->account_no</b>";
                    echo "<hr>";
                 ?>
                 <b><i class="fa fa-rupee-sign"></i> <?= $balance?></b>

<hr>
					<h4><a href="deleteacc.php?delid=<?php echo $row->id?>" onclick="return confirm('are you sure you want to delete it?')" class="text-danger"> <i class="fa fa-trash"> </i> </a>
					<a href="editacc.php?editid=<?php echo $row->id?>" class="text-warning"><i class="fa fa-edit"></i></a></h4>
					</div>
				</div>
				<?php
}
				?>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>