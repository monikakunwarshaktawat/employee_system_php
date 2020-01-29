<?php
if(isset($_POST['save'])){
	include'config.php';
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$data=$conn->prepare("select * from eusers where username='$email' and password='$pwd'");
	$data->execute();
	$row=$data->fetch(PDO::FETCH_OBJ);
	if($row){
		session_start();
		$_SESSION['yeslogin']=1;
		
		$_SESSION['userid']=$row->id;
		$_SESSION['name']=$row->name;
		header("location:index.php");
	}
	else{
		header("location:register.php");
	}

}
else{
	header("location:register.php");
}
?>