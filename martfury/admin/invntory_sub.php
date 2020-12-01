<?php
include"../include/database.php";
$obj=new database();
$pid=$_POST['pid'];
$color=$_POST['color'];
$size=$_POST['size'];
$inv=$_POST['inv'];
$i=0;

$mid=0;

foreach($inv as $qua)
{

 $rscheck=$obj->fetch_productsizebypid($size[$i],$color[$i],$pid);
 if($rscheck){
 $upinve=$obj->update_inven($size[$i],$color[$i],$pid,$qua);
 }
 else{
$obj->add_inventory($pid,$mid,$color[$i],$size[$i],$qua);
}
$i++;
}
$_SESSION['msg']="Added Sucssesfully";
header("location:manage_product.php");
?>