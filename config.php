<?php
$hostname="localhost";
$dbname="task_db";
$dbpass="";
$dbuser="root";

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $dbuser, $dbpass);
}

catch(PDOException $e){
    echo $e->getMessage();
}
?>