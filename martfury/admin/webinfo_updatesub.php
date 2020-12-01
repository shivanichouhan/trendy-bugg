<?php
include"../include/database.php";
$obj= new database();

 $id=$_POST['id']; 
$wname=$_POST['wname'];
$wtit=$_POST['wtit'];
$about_company=$_POST['about_company'];
$sdesc=$_POST['sdesc'];
$skey=$_POST['skey'];
$smeta=$_POST['smeta'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$address=$_POST['address'];
$facebook=$_POST['facebook'];
$twitter=$_POST['twitter'];
$google=$_POST['google'];
$linked=$_POST['play_store'];
$ios=$_POST['ios'];
$path="upload/";
if($_FILES['file']['name']=="") { $img=$_POST['limg']; } else { $img=$_FILES['file']['name'].time(); move_uploaded_file($_FILES['file']['tmp_name'],$path.$img); }
if($_FILES['file1']['name']=="") { $img1=$_POST['limg1']; } else { $img1=$_FILES['file1']['name'].time(); move_uploaded_file($_FILES['file1']['tmp_name'],$path.$img1); }


$prepAddr = str_replace(' ','+',$address);
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
 
$output= json_decode($geocode);
 
 $clat = $output->results[0]->geometry->location->lat;
 $clong = $output->results[0]->geometry->location->lng;

$rs=$obj->website_update($wname,$wtit,$skey,$smeta,$sdesc,$phone,$fax,$email,$address,$facebook,$twitter,$google,$linked,$img,$ios,$id,$img1,$about_company,$clat,$clong);
if($rs)
{
	$_SESSION['msg']="Updated Sucessfully";
header("location:home.php");

}
else
{
	$_SESSION['msg']="Not Updated Sucessfully";
header("location:home.php");
}
?>