<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$name=str_replace("'", "\'",$_POST['name']);

$path="upload/";
if($_FILES['image']['name']=="") { $img=$_POST['limg']; } else { $img=$_FILES['image']['name'].time(); move_uploaded_file($_FILES['image']['tmp_name'],$path.$img); }
$rs=$obj->updatebrand($name,$img,$id);
if($rs)
{
	header("location:brand.php");
}
else
{
	header("location:brand.php");
}
?>