<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$title=str_replace("'", "\'",$_POST['title']);
$title1=str_replace("'", "\'",$_POST['title1']);
$offer=str_replace("'", "\'",$_POST['offer']);
$pro_id=$_POST['pro_id'];

$rs=$obj->updatepromotions($title,$title1,$offer,$pro_id,$id);
if($rs)
{
	header("location:promotions.php");
}
else
{
	header("location:promotions.php");
}
?>