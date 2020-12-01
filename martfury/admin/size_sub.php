<?php
include"../include/database.php";
$obj=new database();
$size=$_POST['size'];


$row=$obj->add_size($size);
if($row)

{

$_SESSION['msg']="Added";

header("location:size.php");

}

else

{

$_SESSION['msg']="Not Added";

header("location:size.php");

}


?>