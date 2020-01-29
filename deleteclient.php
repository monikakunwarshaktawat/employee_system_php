<?php
include"config.php";
if(!empty($_GET['delid'])){
$id=$_GET['delid'];
$conn->exec("delete from clients where id='$id'");
header("location:client.php");
}
?>