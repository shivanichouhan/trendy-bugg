<?php
include"../include/database.php";
$obj=new database();

include("isvalid.php");
$filename=$_FILES['filename']['name'];
$type=$_FILES['filename']['type']; 
$path1="csv/";
$path=$path1.'1'.$_FILES['filename']['name'];
move_uploaded_file($_FILES['filename']['tmp_name'], $path);
$handle = fopen("$path", "r");
$i=0;
$u=0;
while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
{  
if($i!=0){
$a=$obj->fetchById($data[0],"postalcode","postalcode");
if($a)
{	
}
else
{
$aa=$obj->insertpostcode($data[0],$data[1],0);
}
				
}
$i++;
}

$_SESSION['msg']="Added";
header("location:bulkpostcode.php");

?>
