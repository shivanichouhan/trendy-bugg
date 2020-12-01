<?php
include"../include/database.php";
$obj=new database();



$name=str_replace("'", "\'",$_POST['name']);
$path="upload/";
$img=$_FILES['image']['name'].time(); move_uploaded_file($_FILES['image']['tmp_name'],$path.$img); 

$rs=$obj->insertbrand($name,$img);
if($rs)
{
	header("location:brand.php");
}
else
{
	header("location:brand.php");
}
?>