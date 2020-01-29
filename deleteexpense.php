<?php
include "config.php";
if(!empty($_GET['delid']))
{
	$id=$_GET['delid'];
	$conn->exec("delete from expenses where id='$id'");
	header("location:expenses.php");
}
?>