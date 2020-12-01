<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$title=str_replace("'", "\'",$_POST['title']);
$content=str_replace("'", "\'",$_POST['content']);

$rs=$obj->updatecontent($title,$content,$id);
if($rs)
{
	header("location:content.php");
}
else
{
	header("location:content.php");
}
?>