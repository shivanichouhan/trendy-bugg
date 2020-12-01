<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$title=str_replace("'", "\'",$_POST['title']);
$icon=str_replace("'", "\'",$_POST['icon']);
 $content=str_replace("'", "\'",$_POST['content']);


$rs=$obj->updateblog($title,$content,$icon,$id);
if($rs)
{
	header("location:blog.php");
}
else
{
	header("location:blog.php");
}
?>