<?php
include"../include/database.php";
$obj=new database();

$id=$_POST['id'];
$country=$_POST['country'];
$state=$_POST['state'];


$rs=$obj->updatestate($country,$state,$id);
if($rs)
{
	header("location:state.php");
}
else
{
	header("location:state.php");
}
?>