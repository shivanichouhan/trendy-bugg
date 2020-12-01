<?php
include"../include/database.php";
$obj=new database();
$id=$_POST['id'];
$title=$_POST['title'];
$product1=$_POST['product1'];
$product2=$_POST['product2'];
$product3=$_POST['product3'];
$product4=$_POST['product4'];
$rs=$obj->update_grid_product($title,$product1,$product2,$product3,$product4,$id);
if($rs)
{	
	
$_SESSION['msg']='Updated Successfully';
	
	header("location:add_grid_product.php");
}
else
{
	$_SESSION['msg']="Failed..";
	header("location:add_grid_product.php");
}


