<?php
include"../include/database.php";
$obj=new database();

$order_status=$_POST['order_status'];
$forder_id=$_POST['forder_id'];

$rs=$obj->updt_ordr_status($order_status,$forder_id);

if($rs)

{

header("location:invoice.php?id=$forder_id");
}

else

{

header("location:invoice.php?id=$forder_id");

}

?>