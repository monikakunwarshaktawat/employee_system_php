<?php
include "config.php";
if(!empty($_GET['delid']))
{
	$id=$_GET['delid'];
	$conn->exec("delete from expenses_categories where id='$id' ");
	header("location:expenses_category.php");
}
?>