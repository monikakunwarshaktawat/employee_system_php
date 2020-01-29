<?php
include'config.php';
if(!empty($_GET['delid'])){
	$id=$_GET['delid'];
	$conn->exec("delete from incomes where id='$id'");
	header("location:income.php");
}
?>