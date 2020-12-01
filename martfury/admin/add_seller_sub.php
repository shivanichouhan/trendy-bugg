<?php
include"../include/database.php";
$obj=new database();

$fname=$_POST['name'];

$email=$_POST['email'];
$phone=$_POST['phone'];
$postcode=$_POST['postcode'];
$password=$_POST['password'];
$seller_id=$_POST['seller_id'];
$status=1;
$type=2;
$image="user.png";


	 $check=$obj->fetchById($email, "marchent_register", "email");
if($check['email'])
{
	 $_SESSION['msg']="Email Already Exist";
	header("location:add_seller.php");
}
else
{

$rs=$obj->marchentInsert($email,$password,$fname,$phone,$status,$image,$type,addslashes($postcode),addslashes($seller_id));
if($rs)
{	
	
$_SESSION['msg']='Added Successfully';
	
	header("location:add_seller.php");
}
else
{
	$_SESSION['msg']="Failed..";
	header("location:add_seller.php");
}
}

