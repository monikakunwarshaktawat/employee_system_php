<?php
include"config.php";
$date_1=$_POST['date1'];
$var=explode('-',$date_1);
$sdate=$var[0];
$edate=$var[1];
$date1=date('Y-m-d',strtotime($sdate));
$date2=date('Y-m-d',strtotime($edate));
$data=$conn->prepare("select * from incomes where income_date between '$date1' and '$date2'");
$data->execute();
$row1=$data->fetchall(PDO::FETCH_OBJ);
$data2=$conn->prepare("select * from expenses where expense_date between '$date1' and '$date2'");
$data2->execute();
$row2=$data2->fetchall(PDO::FETCH_OBJ);
?>

		<div class="card-deck">
			<div class="card shadow mb-4">
				<div class="card-header"><h2 class="text-center">Income</h2></div>
				<div class="card-body">
			<div class="table-responsive">
			<table class="table table-bordered"  width="50%" cellspacing="0">
				<thead>
					<tr>
						<td>S.no</td>
						<td>Income</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					$income=0;
					foreach($row1 as $r1)
						{
							echo"<tr>";
							echo"<td>$i</td>";
							echo"<td>$r1->amount</td>";
							echo"</tr>";
							$i++;
							$income=$income+$r1->amount;
						}?>
				</tbody>
			</table></div>
		</div>
		<div class="card-footer"><h4 class="text-info"> <b>Total income:- </b><i class="fa fa-rupee-sign"></i> <?= $income." "?></h4></div>
			</div>
<div class="card shadow mb-4">
				<div class="card-header"><h2 class="text-center"> Expenses</h2></div>
				<div class="card-body">
			<div class="table-responsive">
			<table class="table table-bordered"  width="50%" cellspacing="0">
				<thead>
					<tr>
						<td>S.no</td>
						<td>Expense</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$i=1;
					$expense=0;
					foreach($row2 as $r2)
						{
							echo"<tr>";
							echo"<td>$i</td>";
							echo"<td>$r2->amount</td>";
							echo"</tr>";
							$expense=$expense+$r2->amount;
							$i++;
						}?>
				</tbody>
				<?php
			$profit=$income-$expense;
			?>
			</table></div>
		</div>

		<div class="card-footer"><h4 class="text-danger"> <b>Total expense:- </b><i class="fa fa-rupee-sign"></i> <?= $expense." "?></h4></div>
			</div></div>
						<div class="card shadow mb-4"><div class="card-footer"><h4 class="text-success"><b>Profit:- </b><i class="fa fa-rupee-sign"></i> <?= $profit." "?></h4></div></div>
		
			
</div>
