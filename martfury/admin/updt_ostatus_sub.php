<?php
include"../include/database.php";
$obj=new database();

$order_status=$_POST['order_status'];
$forder_id=$_POST['forder_id'];
$oid=$_POST['oid'];
$rs=$obj->updt_ordr_status1($order_status,$forder_id);

if($rs)

{

header("location:invoice.php?cart_id=$forder_id&id=$oid");
}

else

{

header("location:invoice.php?cart_id=$forder_id&id=$oid");

}

?>