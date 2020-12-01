<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$category=str_replace("'", "\'",$_POST['category']);
$sub_category=str_replace("'", "\'",$_POST['sub_category']);


$rs=$obj->updatesub_category($category,$sub_category,$id);
if($rs)
{
	header("location:sub_category.php");
}
else
{
	header("location:sub_category.php");
}
?>