<?php
include"../include/database.php";
$obj=new database();



$title=str_replace("'", "\'",$_POST['title']);
$icon=str_replace("'", "\'",$_POST['icon']);
$content=str_replace("'", "\'",$_POST['content']);

$rs=$obj->insertblog($title,$content,$icon);
if($rs)
{
	header("location:blog.php");
}
else
{
	header("location:blog.php");
}
?>