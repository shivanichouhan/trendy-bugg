<?php
include"../include/database.php";
$obj=new database();

$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];


 $rs=$obj->insertcity($city,$state,$country);
if($rs)
{
	header("location:city.php");
}
else
{
	header("location:city.php");
}
?>