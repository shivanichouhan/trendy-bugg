<?php
include"../include/database.php";
$obj=new database();

 $id=$_POST['id'];
 $country=$_POST['country']; 


$rs=$obj->updatecountry($country,$id);
if($rs)
{
	header("location:country.php");
}
else
{
	header("location:country.php");
}
?>