<?php
include"../include/database.php";
$obj=new database();

$status=$_GET['status'];
$id=$_GET['id'];
$fstatus=$_GET['fstatus'];
$table="product";
$field="pro_id";
$rs=$obj->updateStatus($id, $table, $fstatus, $status, $field);


?>