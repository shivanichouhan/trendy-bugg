<?php
include"../include/database.php";
$obj=new database();
$id=$_POST['id'];
$opass=$_POST['opass'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];

if($npass==$cpass)
{
 $fetch=$user=$obj->fetchById($id,"admin","id");
      $data_pwd=$fetch['password'];
      if($data_pwd==$opass)
        {
		$insert=$obj->passwordupdate($npass,$id);
      echo '<script type="text/javascript">alert("sucessfull");window.location=\'profile.php\';</script>';
        }
      else
        {
      echo '<script type="text/javascript">alert("Password not match");window.location=\'profile.php\';</script>';
        }
      }
	  else
	  {
	    echo '<script type="text/javascript">alert("Password not match");window.location=\'profile.php\';</script>';
	  }
      ?>


