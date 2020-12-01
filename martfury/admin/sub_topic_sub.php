<?php
include"../include/database.php";
$obj=new database();


$category=str_replace("'", "\'",$_POST['category']);
$sub_category=str_replace("'", "\'",$_POST['sub_category']);
$sub_topic=str_replace("'", "\'",$_POST['sub_topic']);

$rs=$obj->insertsub_topic($category,$sub_category,$sub_topic);
if($rs)
{
	header("location:sub_topic.php");
}
else
{
	header("location:sub_topic.php");
}
?>