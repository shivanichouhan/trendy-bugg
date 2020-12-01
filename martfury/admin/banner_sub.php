<?php
include"../include/database.php";
$obj=new database();


$m_id=$_POST['m_id'];
$title=str_replace("'", "\'",$_POST['title']);
$link=str_replace("'", "\'",$_POST['link']);
$content=str_replace("'", "\'",$_POST['content']);
$path="upload/";
$img=$_FILES['image']['name'].time(); move_uploaded_file($_FILES['image']['tmp_name'],$path.$img); 

$rs=$obj->insertbanner($title,$content,$img,$link,$m_id);
if($rs)
{
	header("location:banner.php");
}
else
{
	header("location:banner.php");
}
?>