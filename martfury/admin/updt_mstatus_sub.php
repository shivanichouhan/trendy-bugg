<?php
include"../include/database.php";
$obj=new database();

$stype=$_POST['stype'];
$id=$_POST['id'];

$rs=$obj->updt_marchent_status($stype,$id);

if($rs)

{

header("location:marchent.php");
}

else

{

header("location:marchent.php");

}

?>