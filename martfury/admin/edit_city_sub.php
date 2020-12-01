<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];

$rs=$obj->updatecity($city,$state,$country,$id);
if($rs)
{
	header("location:city.php");
}
else
{
	header("location:city.php");
}
?>