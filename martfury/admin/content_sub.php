<?php
include"../include/database.php";
$obj=new database();



$title=str_replace("'", "\'",$_POST['title']);
$content=str_replace("'", "\'",$_POST['content']);

$rs=$obj->insertcontent($title,$content);
if($rs)
{
	header("location:content.php");
}
else
{
	header("location:content.php");
}
?>