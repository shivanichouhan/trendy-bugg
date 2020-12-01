<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$sellerid=str_replace("'", "\'",$_POST['sellerid']);
$path="upload/";


$rs=$obj->updateseller($sellerid,$id);
if($rs)
{
	header("location:marchent.php");
}
else
{
	header("location:marchent.php");
}
?>