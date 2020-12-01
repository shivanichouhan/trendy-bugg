<?php
include"../include/database.php";
$obj=new database();

$id=$_POST['id'];

$username=$_POST['username'];
$email=$_POST['email'];
$path="upload/";
 if($_FILES['image']['name']=="") { $img=$_POST['limg']; } else { $img=$_FILES['image']['name'].time(); move_uploaded_file($_FILES['image']['tmp_name'],$path.$img); }



$rs=$obj->userupdate($username,$email,$img,$id);
if($rs)
{
	header("location:profile.php");
}
else
{
	header("location:profile.php");
}
?>