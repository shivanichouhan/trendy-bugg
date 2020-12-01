<?php
include"../include/database.php";
$obj=new database();



$title=str_replace("'", "\'",$_POST['title']);
$title1=str_replace("'", "\'",$_POST['title1']);
$offer=str_replace("'", "\'",$_POST['offer']);
$pro_id=str_replace("'", "\'",$_POST['pro_id']);

$rs=$obj->insertpromotions($title,$title1,$offer,$pro_id);
if($rs)
{
	header("location:promotions.php");
}
else
{
	header("location:promotions.php");
}
?>