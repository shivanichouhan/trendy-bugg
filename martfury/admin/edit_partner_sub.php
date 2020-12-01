<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];

$link=str_replace("'", "\'",$_POST['link']);

$path="upload/";
if($_FILES['image']['name']=="") { $img=$_POST['limg']; } else { $img=$_FILES['image']['name'].time(); move_uploaded_file($_FILES['image']['tmp_name'],$path.$img); }

$rs=$obj->updatepartner($img,$link,$id);
if($rs)
{
	header("location:partner.php");
}
else
{
	header("location:partner.php");
}
?>