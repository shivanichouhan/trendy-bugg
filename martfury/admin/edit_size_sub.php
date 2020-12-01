<?php
include"../include/database.php";
$obj=new database();
$size=$_POST['size'];

$id=$_POST['id'];

$row=$obj->update_size($size,$id);
if($row)

{

$_SESSION['msg']="update";

header("location:size.php");

}

else

{

$_SESSION['msg']="Not update";

header("location:size.php");

}

?>