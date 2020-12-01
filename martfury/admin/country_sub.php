<?php
include"../include/database.php";
$obj=new database();

$country=$_POST['country'];

 $rs=$obj->insertcountry($country);
if($rs)
{
	header("location:country.php");
}
else
{
	header("location:country.php");
}
?>