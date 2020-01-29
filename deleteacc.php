<?php
include "config.php";
if(!empty($_GET['delid']))
{
	$id=$_GET['delid'];
	$conn->exec("delete from accounts where id='$id' ");
	header("location:account.php");
}
?>