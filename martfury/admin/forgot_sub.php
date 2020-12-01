<?php
include"../include/database.php";
$obj=new database();

$web=$obj->fetchByIdTable("website_details");

$address1=$web['address'];
$sphone=$web['phone'];
$semail=$web['email'];
$logo=$web['logo'];
$facebook=$web['facebook'];
$google=$web['google'];
$twitter=$web['twitter'];
 $email=$_POST['email'];
 
$row=$obj->fetchById($email, "admin", "email");
if($row)
{
 $password=$row['password'];
$to=$email;


	$url='http://shopatnow.in/';
  $subject = "Forgot Password";
	$msg= '<table bgcolor="" cellpadding="10"  style="padding:20px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; line-height:1; width:100%;  border:3px solid #ccc;" >

	<tr>
		<td height="30px">
			<img src="'.$url.'admin/upload/'.$logo.'">
		</td>
		<td align="right">
			<p><b>Email: '.$email.'</b></p>
		
		</td>
	</tr>
	
		<tr bgcolor="#FF9900" >
			<td  height="50px" colspan="2" align="center">
				<p style="color:#fff; font-size:24px; font-weight:bold; ">Password</p>
			</td>
		</tr>
		
		
		<tr bgcolor="#fff">
			
				<td align="center" colspan="2">
				<h3>Your Password Is</h3>
				<p style="color:#1359A0"><b>'.$password.'</b></p>
				<br />
				<br />
			<a href="'.$url.'" style="border:#666 1px solid; padding:6px 10px; text-align:center; color:#fff; background:#666; text-decoration:none;">Continue</a>
<br>

			</td>
		
		</tr>
		
		
		<tr>
			<td colspan="2">
				<p>Please do not reply to this email. Email send to this address will not be answerd.</p>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<a href="'.$facebook.'" target="_blank"><img src="'.$url.'facebook_circle_color-256.png" width="30px"></a>
				<a href="'.$google.'" target="_blank"><img src="'.$url.'google_circle_color-512.png" width="30px"></a>
				<a href="'.$twitter.'" target="_blank"><img src="'.$url.'twitter-icon--basic-round-social-iconset--s-icons-0.png" width="30px"></a>
								<p>@Copyright 2017 Shopatnow</p>

			</td>
		</tr>
	
	
</table>';

	$from = "nearby@shopatnow.in";
	$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .="From:".$from;
	$a=mail($to,$subject,$msg,$headers);
	
	
	
	$_SESSION['msg']="Email Sent";
	header("location:index.php");
	
}
else
{
$_SESSION['msg']="This email id is invalid. Please use valid email id";
header("location:forgot.php");
}
?>