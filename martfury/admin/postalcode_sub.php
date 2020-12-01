<?php
include"../include/database.php";
$obj=new database();

$postalcode=$_POST['postalcode'];
$sla_days=$_POST['sla_days'];

 $rs=$obj->insertpostcode($postalcode,$sla_days,0);
if($rs)
{
	header("location:postalcode.php");
}
else
{
	header("location:postalcode.php");
}
?>