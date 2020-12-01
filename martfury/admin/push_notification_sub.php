<?php
include"../include/database.php";
$obj=new database();
$web=$obj->fetchByIdTable("`website_details`");
$address1=$web['address'];
$sphone=$web['phone'];
$semail=$web['email'];
$logo=$web['logo'];
$facebook=$web['facebook'];
$google=$web['google'];
$twitter=$web['twitter'];
$web_name=$web['web_name'];
$email_admin=$web['email'];





     $title=$_POST['title']; 
   
    @$discription=$_POST['discription'];

   @$date=date('Y-m-d');
   

  
 $rs1=$obj->insertlatest_update($title,$discription,$date); 
if($rs1)
{
    
       	$rs=$obj->fetchAllDetail("register");
					if($rs)
					{$i=0;
					while($row=mysqli_fetch_assoc($rs))
					{$i++;
        				// $ex[$x];
        			
        			$fcm_token=	$row['fcm_token'];
        		
                 #API access key from Google API's Console
            define( 'API_ACCESS_KEY', ':' );
            $registrationIds = $fcm_token;
        #prep the bundle
             $msg = array
                  (
        		'body' 	=> $discription,
        		'title'	=> $title,
                     	'icon'	=> 'https://indorse.co.in/admin/upload/'.$logo,/*Default Icon*/
                      	'sound' => 'mySound'/*Default sound*/
                  );
        	$fields = array
        			(
        				'to'		=> $registrationIds,
        				'notification'	=> $msg
        			);
        	
        	$headers = array
        			(
        				'Authorization: key=' . API_ACCESS_KEY,
        				'Content-Type: application/json'
        			);
        #Send Reponse To FireBase Server	
        		$ch = curl_init();
        		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        		curl_setopt( $ch,CURLOPT_POST, true );
        		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        		$result = curl_exec($ch );
        		curl_close( $ch );
        #Echo Result Of FireBase Server
        
        echo $result;

        					    
            }}
  
    
            		
	echo ("<script LANGUAGE='JavaScript'>
          window.alert('');
          window.location.href='push_notification.php';
       </script>");
     
  
}
else
{ 
    	echo ("<script LANGUAGE='JavaScript'>
          window.alert('');
          window.location.href='push_notification.php';
       </script>");
    
}
	
?>