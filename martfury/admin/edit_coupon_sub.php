<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];
$m_id=$_POST['m_id'];
$title=str_replace("'", "\'",$_POST['title']);
$code=$_POST['code'];
$type=str_replace("'", "\'",$_POST['type']);
$discount=str_replace("'", "\'",$_POST['discount']);
$minimum_amount=str_replace("'", "\'",$_POST['minimum_amount']);
$start_date=str_replace("'", "\'",$_POST['start_date']);
$end_date=str_replace("'", "\'",$_POST['end_date']);


$rs=$obj->updatecoupon($title,$code,$type,$discount,$minimum_amount,$start_date,$end_date,$m_id,$id);
if($rs)
{
	header("location:coupon.php");
}
else
{
	header("location:coupon.php");
}
?>