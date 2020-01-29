<?php
include"config.php";
if(!empty($_GET['delid']))
{
	$id=$_GET['delid'];
	$cid=$_GET['id1'];
	$conn->exec("delete from clientworks where id='$id'");
	header("location:client_work.php?clientid=$cid");
}
?>
