<?php
include"../include/database.php";
$obj=new database();

$id=$_POST['id'];
$pname=$_POST['pname'];
$paddress=str_replace("'", "\'",$_POST['paddress']);

$pstate=$_POST['pstate'];
$pcity=$_POST['pcity'];
$plocation=$_POST['plocation'];
$ppost_code=$_POST['ppost_code'];



$rs=$obj->projectupdate($pname,$paddress,$pstate,$pcity,$plocation,$ppost_code,$id);
if($rs)
{
	header("location:builder_detail.php");
}
else
{
	header("location:builder_detail.php");
}
?>