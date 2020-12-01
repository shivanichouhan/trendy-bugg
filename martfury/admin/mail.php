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

for ($i = 0; $i < count($_POST['mail']); $i++)
{
  $to=$_POST['mail'][$i];

 //$subject=$_POST['subject'];
 $descriptions=$_POST['description'];
   
		
$url='https://indorse.co.in/';
 $subject = "Newsletter";
$msg='<table bgcolor="#fff" cellpadding="10"  style="padding:20px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; line-height:2; width:100%; border:3px solid #ccc" >

	<tr style="border-bottom:2px solid #ccc;">
		<td height="30px">
			<img src="'.$url.'admin/upload/'.$logo.'">
		</td>
		<td align="right">
			<p><b>Email: '.$to.'</b></p>
		</td>
	</tr>
	
		<tr bgcolor="" >
			<td  height="50px" colspan="2" align="center">
				<p style="color:#555; font-size:24px; font-weight:bold; ">'.$subject.'</p>
			</td>
		</tr>
		
		
		<tr bgcolor="#eee" >
			
				<td  colspan="2" >
			
			
			
			<p>'.$descriptions.'</p>
			
			<a href="'.$url.'" style="border:#666 1px solid; padding:6px 10px; text-align:center; color:#fff; background:#666; text-decoration:none;">Continue</a>
			
			<p>If you have any questions about your account or any other matter , Please feel free to contact us at <a href="">'.$semail.' </a> or by phone at '.$sphone.' </p>
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
								<p>@Copyright 2020 Indorse</p>

			</td>
		</tr>
	
	
</table>';

//$msg1=htmlspecialchars($msg);

    //$subject = "Shopatnow"; 
		$from = "noreply@indorse.co.in";
	$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .="From:".$from;
	$a=mail($to,$subject,$msg,$headers);
 }

 if($a){
   $_SESSION['msg']="Sucess full Msg";
	header('location:subscriber.php');
 }
 else{
   $_SESSION['msg']="Failed";
 	header('location:subscriber.php');
 }
?>