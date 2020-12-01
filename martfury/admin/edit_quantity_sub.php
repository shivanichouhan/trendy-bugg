<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$name=str_replace("'", "\'",$_POST['name']);


$rs=$obj->updatequantity($name,$id);
if($rs)
{
	header("location:quantity.php");
}
else
{
	header("location:quantity.php");
}
?>