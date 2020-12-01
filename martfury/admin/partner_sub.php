<?php
include"../include/database.php";
$obj=new database();



$link=str_replace("'", "\'",$_POST['link']);
$path="upload/";
$img=$_FILES['image']['name'].time(); move_uploaded_file($_FILES['image']['tmp_name'],$path.$img); 

$rs=$obj->insertpartner($img,$link);
if($rs)
{
	header("location:partner.php");
}
else
{
	header("location:partner.php");
}
?>