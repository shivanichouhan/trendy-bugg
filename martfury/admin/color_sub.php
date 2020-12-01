<?php
include"../include/database.php";
$obj=new database();
$color=$_POST['color'];
$color_code=$_POST['color_code'];


$row=$obj->add_color($color,$color_code);
if($row)

{

$_SESSION['msg']="Added";

header("location:color.php");

}

else

{

$_SESSION['msg']="Not Added";

header("location:color.php");

}


?>