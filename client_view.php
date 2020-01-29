<?php
include"config.php";

session_start();
$id=$_GET['viewid'];
$data1=$conn->prepare("select * from clients where id='$id'");
$data1->execute();
$result1=$data1->fetch(PDO::FETCH_OBJ);
$data2=$conn->prepare("select * from clientworks where client_id='$id'");
$data2->execute();
$result2=$data2->fetchall(PDO::FETCH_OBJ);
$data3=$conn->prepare("select * from clientpayments where clientid='$id'");
$data3->execute();
$result3=$data3->fetchall(PDO::FETCH_OBJ);
	?>
	<?php
	
	include'header.php';
	?>
<div class="container">
	
	
	<div class="card shadow mb-4"> <div class="card-header">
	<a href="client.php" class="btn btn-danger" role="button" style="float: right">Back</a>
	<h1 class="text-primary">Client-Information</h1>
</div></div>
<div class="card shadow mb-4">
	<div class="card-header"><h2 class="text-info">Client -detail</h2></div>
	<div class="card-body">
	<p><b>Client Name:</b><?= $result1->client_name?></p>	
	
	<p><b>Email-ID:</b><?= $result1->email_id?></p>	
	<p><b>Contact:</b><?= $result1->contact?></p>	
	
	</div>
</div>
<div class="card-deck">
	<div class="card shadow mb-4">
		<div class="card-header" ><h2 class="text-warning" class="text-center">Works</h2>
<a href="addclientwork.php?client_id=<?php echo $id?>" role="button" class="btn btn-warning" style="float: right">Add new work</a>
		</div>
		<div class="card-body">
		<?php 
		$i=1;
		foreach($result2 as $row)
		{
			echo "$i ";
			echo"<b>Work Name:</b>$row->workname";
			echo"     ";
			echo" <b>Amount:</b>$row->amount";
			echo "<br>";
			echo"<b>Work Start date:</b>$row->work_start_date";echo"<br>";
			echo"<br>";
			$i++;
		}
		$total1=0;
		foreach($result2 as $row)
		{
			$total1=$total1+$row->amount;
		}
		
		?>
	
	<b class="text-warning">Total work amount:<?= $total1?></b>	
	</div>
		<hr>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header"><h2 class="text-success">Payments</h2>
<a href="addclientpayment.php?pay_id=<?php echo $id?>" class="btn btn-success" role="button" style="float:right">Add new payment</a>
		</div>
	<div class="card-body">
		<?php 
		$i=1;
		foreach($result3 as $row)
		{
			echo"$i ";
			echo"<b>Payment date:</b>$row->pay_date   ";
			echo"    ";
			echo"<b>  Payment Amount:</b>$row->pay_amount";echo"<br>";
			
			echo"<br>";
			$i++;
		}
		$total2=0;
		foreach($result3 as $row)
		{
			$total2=$total2+$row->pay_amount;
		}?>
		<b class="text-success">Total payment:-<?=$total2?></b>
		
		
	</div>
		
	</div>
	
</div>
<div class="card shadow mb-4">
	<div class="card-header" ><h4 class="text-danger" style="float: center">Due payment=<?= $total1-$total2?></h4></div>
</div>
</div>