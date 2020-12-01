<?php
include"../include/database.php";
$obj=new database();

$title=str_replace("'", "\'",$_POST['title']);


$content=str_replace("'", "\'",$_POST['content']);

$category=$_POST['category'];
$sub_category=$_POST['sub_category'];
$sub_topic=$_POST['sub_topic'];
$price1=$_POST['price'];
$price=implode(",",$price1);

$pquantity1=$_POST['pquantity'];
$pquantity=implode(",",$pquantity1);
$size_id1=$_POST['size_id'];
$size_id=implode(",",$size_id1);

$color_name=$_POST['color_name'];


$color_code=0;

$pquantitytype1=$_POST['pquantitytype'];
$pquantitytype=implode(",",$pquantitytype1);

$discount1=$_POST['discount'];
$discount=implode(",",$discount1);

 $dprice1=$_POST['dprice'];
 $dprice=implode(",",$dprice1);
 $ddprice=$dprice1['0'];
 
 $quantitys1=$_POST['quantitys'];
$quantitys=implode(",",$quantitys1);
 

$brand=$_POST['brand'];

$m_id=@$_POST['m_id'];

$path="../admin/upload/";
$img1=$_FILES['image1']['name']; move_uploaded_file($_FILES['image1']['tmp_name'],$path.$img1); 
$img2=$_FILES['image2']['name']; move_uploaded_file($_FILES['image2']['tmp_name'],$path.$img2); 
$img3=$_FILES['image3']['name']; move_uploaded_file($_FILES['image3']['tmp_name'],$path.$img3); 
$img4=$_FILES['image4']['name']; move_uploaded_file($_FILES['image4']['tmp_name'],$path.$img4); 
$img5=$_FILES['image5']['name']; move_uploaded_file($_FILES['image5']['tmp_name'],$path.$img5); 

//$img6=$_FILES['image6']['name']; move_uploaded_file($_FILES['image6']['tmp_name'],$path.$img6); 
//$img7=$_FILES['image7']['name']; move_uploaded_file($_FILES['image7']['tmp_name'],$path.$img7); 
//$img8=$_FILES['image8']['name']; move_uploaded_file($_FILES['image8']['tmp_name'],$path.$img8); 
//$img9=$_FILES['image9']['name']; move_uploaded_file($_FILES['image9']['tmp_name'],$path.$img9); 
//$img10=$_FILES['image10']['name']; move_uploaded_file($_FILES['image10']['tmp_name'],$path.$img10);

//$img11=$_FILES['image11']['name']; move_uploaded_file($_FILES['image11']['tmp_name'],$path.$img11); 
//$img12=$_FILES['image12']['name']; move_uploaded_file($_FILES['image12']['tmp_name'],$path.$img12); 
//$img13=$_FILES['image13']['name']; move_uploaded_file($_FILES['image13']['tmp_name'],$path.$img13); 
//$img14=$_FILES['image14']['name']; move_uploaded_file($_FILES['image14']['tmp_name'],$path.$img14); 
//$img15=$_FILES['image15']['name']; move_uploaded_file($_FILES['image15']['tmp_name'],$path.$img15);

$rs=$obj->insertproduct($title,$content,$category,$sub_category,$price,$sub_topic,$pquantity,$discount,$dprice,$ddprice,$brand,$img1,$img2,$img3,$img4,$img5,$m_id,$pquantitytype,$quantitys,$size_id,$color_name,$color_code);
if($rs)
{
	header("location:product.php");
}
else
{
	header("location:product.php");
}
?>