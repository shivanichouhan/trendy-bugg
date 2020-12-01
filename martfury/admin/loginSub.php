<?php
include"../include/database.php";
$obj=new database();

$username=$_POST['username'];
$password=$_POST['password'];

$rs=$obj->login($username,$password,"admin","user_name","password","status","1");
if($rs)
{
	$_SESSION['admin_id']=$rs['id'];
	header("location:profile.php");
}
else
{
	$_SESSION['msg']="Invalid username & password!";
	header("location:index.php");
}	

?>