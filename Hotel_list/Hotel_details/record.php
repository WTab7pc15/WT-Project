<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="INSERT into bookings (Time,Statement,Price) VALUES ('".$_POST['time'] ."','".$_POST['statement']."',".$_POST['price'].");";
$result = $db_handle->runQuery($query);
?>