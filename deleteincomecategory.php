<?php
include"config.php";
if(!empty($_GET['delid'])){
$id=$_GET['delid'];
$conn->exec("delete from income_categories where id='$id'");
header("location:income_category.php");
}