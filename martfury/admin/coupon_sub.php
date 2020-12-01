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

$title=str_replace("'", "\'",$_POST['title']);
$code=$_POST['code'];
$type=str_replace("'", "\'",$_POST['type']);
$discount=str_replace("'", "\'",$_POST['discount']);
$minimum_amount=str_replace("'", "\'",$_POST['minimum_amount']);
$start_date=str_replace("'", "\'",$_POST['start_date']);
$end_date=str_replace("'", "\'",$_POST['end_date']);
$m_id=$_POST['m_id'];


$rs=$obj->insertcoupon($title,$code,$type,$discount,$minimum_amount,$start_date,$end_date,$code,$m_id);
if($rs)
{
	
			
$url='https://indorse.co.in/';
$usr=$obj->fetchDetailById(1,"register","status");
if($usr)
{
	while($usr1=mysqli_fetch_assoc($usr))
	{
	$email=$usr1['email'];
	$phone=$usr1['phone'];
	
	 $subject = "indorse Offer"; 
$msg='<table bgcolor="" cellpadding="10"  style="padding:20px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; line-height:1; width:100%;  border:3px solid #ccc;" >

	<tr>
			<td height="30px">
			<img src="'.$url.'admin/upload/'.$logo.'">
		</td>
		<td align="right">
			<p><b>Email: '.$email.'</b></p>
			<p><b>Phone: '.$phone.'</b></p>
		</td>
	</tr>
	
		<tr bgcolor="#FF9900" >
			<td  height="50px" colspan="2" align="center">
				<p style="color:#fff; font-size:24px; font-weight:bold; ">Offer  Before '.$end_date.'</p>
			</td>
		</tr>
		
		
		<tr bgcolor="#fff">
			
				<td align="center" colspan="2">
				<h1 style="color:#F3C200"><i>'.$discount.' % Off</i></h1>
				<h3>On Client Packages</h3>
				<p style="color:#1359A0"><b>Promo Code: '.$code.'</b></p>
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
								<p>@Copyright 2020 indorse</p>

			</td>
		</tr>
	
	
</table>';

    //$subject = "Shopatnow"; 
      $from = "noreply@indorse.co.in";
	$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .="From:".$from;
	$a=mail($email,$subject,$msg,$headers);
	
	} }
	
	header("location:coupon.php");
}
else
{
	header("location:coupon.php");
}
?>