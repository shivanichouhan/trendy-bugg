<?php
include"../include/database.php";
$obj=new database();


$id=$_POST['id'];

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
$color_name1=$_POST['color_name'];
$color_name=implode(",",$color_name1);
$color_code1=$_POST['color_code'];
$color_code=implode(",",$color_code1);

$pquantitytype1=$_POST['pquantitytype'];
$pquantitytype=implode(",",$pquantitytype1);

$discount1=$_POST['discount'];
$discount=implode(",",$discount1);

$dprice1=$_POST['dprice'];
$dprice=implode(",",$dprice1);
 $ddprice=$dprice1['0'];
 
 $quantitys1=$_POST['quantitys'];
$quantitys=implode(",",$quantitys1);
  $quantitys; 
$brand=$_POST['brand'];
$m_id=@$_POST['m_id'];

$path="upload/";
if($_FILES['image1']['name']=="") { $img1=$_POST['limg1']; } else { $img1=$_FILES['image1']['name'].time(); move_uploaded_file($_FILES['image1']['tmp_name'],$path.$img1); }
if($_FILES['image2']['name']=="") { $img2=$_POST['limg2']; } else { $img2=$_FILES['image2']['name'].time(); move_uploaded_file($_FILES['image2']['tmp_name'],$path.$img2); }
if($_FILES['image3']['name']=="") { $img3=$_POST['limg3']; } else { $img3=$_FILES['image3']['name'].time(); move_uploaded_file($_FILES['image3']['tmp_name'],$path.$img3); }
if($_FILES['image4']['name']=="") { $img4=$_POST['limg4']; } else { $img4=$_FILES['image4']['name'].time(); move_uploaded_file($_FILES['image4']['tmp_name'],$path.$img4); }
if($_FILES['image5']['name']=="") { $img5=$_POST['limg5']; } else { $img5=$_FILES['image5']['name'].time(); move_uploaded_file($_FILES['image5']['tmp_name'],$path.$img5); }

//if($_FILES['image6']['name']=="") { $img6=$_POST['limg6']; } else { $img6=$_FILES['image6']['name']; move_uploaded_file($_FILES['image6']['tmp_name'],$path.$img6); }
//if($_FILES['image7']['name']=="") { $img7=$_POST['limg7']; } else { $img7=$_FILES['image7']['name']; move_uploaded_file($_FILES['image7']['tmp_name'],$path.$img7); }
//if($_FILES['image8']['name']=="") { $img8=$_POST['limg8']; } else { $img8=$_FILES['image8']['name']; move_uploaded_file($_FILES['image8']['tmp_name'],$path.$img8); }
//if($_FILES['image9']['name']=="") { $img9=$_POST['limg9']; } else { $img9=$_FILES['image9']['name']; move_uploaded_file($_FILES['image9']['tmp_name'],$path.$img9); }
//if($_FILES['image10']['name']=="") { $img10=$_POST['limg10']; } else { $img10=$_FILES['image10']['name']; move_uploaded_file($_FILES['image10']['tmp_name'],$path.$img10); }

//if($_FILES['image11']['name']=="") { $img11=$_POST['limg11']; } else { $img11=$_FILES['image11']['name']; move_uploaded_file($_FILES['image11']['tmp_name'],$path.$img11); }
//if($_FILES['image12']['name']=="") { $img12=$_POST['limg12']; } else { $img12=$_FILES['image12']['name']; move_uploaded_file($_FILES['image12']['tmp_name'],$path.$img12); }
//if($_FILES['image13']['name']=="") { $img13=$_POST['limg13']; } else { $img13=$_FILES['image13']['name']; move_uploaded_file($_FILES['image13']['tmp_name'],$path.$img13); }
//if($_FILES['image14']['name']=="") { $img14=$_POST['limg14']; } else { $img14=$_FILES['image14']['name']; move_uploaded_file($_FILES['image14']['tmp_name'],$path.$img14); }
//if($_FILES['image15']['name']=="") { $img15=$_POST['limg15']; } else { $img15=$_FILES['image15']['name']; move_uploaded_file($_FILES['image15']['tmp_name'],$path.$img15); }

$rs=$obj->updateproduct($title,$content,$category,$sub_category,$price,$sub_topic,$pquantity,$discount,$dprice,$ddprice,$brand,$img1,$img2,$img3,$img4,$img5,$pquantitytype,$quantitys,$size_id,$color_name,$color_code,$id,$m_id);
if($rs)
{
	header("location:manage_product.php");
}
else
{
	header("location:manage_product.php");
}
?>