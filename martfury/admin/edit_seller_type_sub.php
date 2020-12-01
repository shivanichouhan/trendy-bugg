<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$seller_type=$_POST['seller_type'];


$rs=$obj->updateseller_type($seller_type,$id);
if($rs)
{
	header("location:seller_type.php");
}
else
{
	header("location:seller_type.php");
}
?>