<?php
include"../include/database.php";
$obj=new database();

 $id=$_POST['id'];

 $name=$_POST['name']; 
$email=$_POST['email'];
$phone=$_POST['phone'];
$postcode=$_POST['postcode'];
$postcode1=@$_POST['postcode1'];
$postcode2=@$_POST['postcode2'];
$img=@$_POST['limg'];


$rs=$obj->marchentupdate($name,$email,$phone,$postcode,$postcode1,$postcode2,$img,$id);
if($rs)
{
	header("location:marchent.php");
}
else
{
	header("location:marchent.php");
}
?>