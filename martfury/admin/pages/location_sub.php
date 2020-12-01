<?php
include"../include/database.php";
$obj=new database();

$builder_id=$_POST['builder_id'];
$pname=$_POST['pname'];
$paddress=str_replace("'", "\'",$_POST['paddress']);

$pstate=$_POST['pstate'];
$pcity=$_POST['pcity'];
$plocation=$_POST['plocation'];
$ppost_code=$_POST['ppost_code'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];



$rs=$obj->addproject($pname,$paddress,$pstate,$pcity,$plocation,$ppost_code,$builder_id,$sdate,$edate);
if($rs)
{
	header("location:location.php");
}
else
{
	header("location:location.php");
}
?>