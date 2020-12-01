<?php
include"../include/database.php";
$obj=new database();

$seller_type=$_POST['seller_type'];

 $rs=$obj->insertseller_type($seller_type);
if($rs)
{
	header("location:seller_type.php");
}
else
{
	header("location:seller_type.php");
}
?>