<?php
include"../include/database.php";
$obj=new database();
$color=$_POST['color'];
$color_code=$_POST['color_code'];

$id=$_POST['id'];

$row=$obj->update_color($color,$color_code,$id);
if($row)

{

$_SESSION['msg']="update";

header("location:color.php");

}

else

{

$_SESSION['msg']="Not update";

header("location:color.php");

}

?>