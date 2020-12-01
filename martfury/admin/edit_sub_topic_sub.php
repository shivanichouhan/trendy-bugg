<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$category=str_replace("'", "\'",$_POST['category']);
$sub_category=str_replace("'", "\'",$_POST['sub_category']);
$sub_topic=str_replace("'", "\'",$_POST['sub_topic']);


$rs=$obj->updatesub_topic($category,$sub_category,$sub_topic,$id);
if($rs)
{
	header("location:sub_topic.php");
}
else
{
	header("location:sub_topic.php");
}
?>