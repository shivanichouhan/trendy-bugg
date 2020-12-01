<?php
include"../include/database.php";
$obj=new database();



$name=str_replace("'", "\'",$_POST['name']);


$rs=$obj->insertquantity($name);
if($rs)
{
	header("location:quantity.php");
}
else
{
	header("location:quantity.php");
}
?>