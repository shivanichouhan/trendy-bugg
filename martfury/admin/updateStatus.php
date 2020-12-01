<?php
include"../include/database.php";
$obj=new database();

$id=$_GET['id'];
$status=$_GET['status'];
$table=$_GET['table'];
$statusField=$_GET['statusField'];
$field=$_GET['field'];
$page=$_GET['page'];

$rs=$obj->updateStatus($id,$table,$statusField,$status,$field);
if($rs)
{
	header("location:$page.php");
}
else
{
	header("location:$page.php");
}
?>