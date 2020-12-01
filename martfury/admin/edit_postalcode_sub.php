
<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$postalcode=$_POST['postalcode'];
$sla_days=$_POST['sla_days'];


$rs=$obj->updatepostalcode($postalcode,$sla_days,$id);
if($rs)
{
	header("location:postalcode.php");
}
else
{
	header("location:postalcode.php");
}
?>