<?php
include"../include/database.php";
$obj=new database();

$table=$_GET['table'];
$id=$_GET['id'];
$field=$_GET['field'];
$page=$_GET['page'];

$rs=$obj->deleteById($id,$table,$field);
if($rs)
{
	header("location:$page.php");
}
else
{
	header("location:$page.php");
}
?>