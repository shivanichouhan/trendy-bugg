<?php
include"../include/database.php";
$obj=new database();

$country=$_POST['country'];
$state=$_POST['state'];

 $rs=$obj->insertstate($state,$country);
if($rs)
{
	header("location:state.php");
}
else
{
	header("location:state.php");
}
?>