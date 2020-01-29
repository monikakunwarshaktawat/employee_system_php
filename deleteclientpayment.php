<?php
include "config.php";
if(!empty($_GET['delid']))
{
	$id=$_GET['delid'];
	$pay_id=$_GET['id1'];
	$conn->exec("delete from clientpayments where id='$id'");
	header("location:client_payment.php?payid=$pay_id");
}
?>