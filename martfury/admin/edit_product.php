<?php
 include"../include/database.php";
 include"../include/session.php";
  $obj=new database();
$web_info=$obj->fetchByIdTable("website_details");
$content=$obj->fetchById($_GET['id'],"product","pro_id");
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $web_info['web_title'];?></title>
     <link rel="shortcut icon" href="upload/<?php echo $web_info['favicon'];?>" type="image/x-icon">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include('header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('sidebar.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
       <!-- <li><a href="#">Forms</a></li>-->
      
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	 
	
      <div class="row">
        
          
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Products</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="edit_product_sub.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $content['pro_id'];?>">
             <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" value="<?php echo $content['pro_name'];?>" >
                </div>
             
                
                               <div class="form-group">
                  <label for="exampleInputPassword1">Descriptions</label>
				  <textarea class="form-control"  placeholder="Content" name="content" ><?php echo $content['pro_description'];?></textarea>
                 
                </div>
					<div class="form-group">
                  <label for="exampleInputEmail1">Shop Name</label>
                  <select class="form-control" name="m_id">
                  <option value="">--Select--</option>
                 <?php  $marchent_register=$obj->fetchDetailById(1,"marchent_register","status");
					if($marchent_register)
					{
					while($marchent=mysqli_fetch_assoc($marchent_register))
					{
?>
                  <option  <?php if($content['m_id']==$marchent['m_id']) { ?> selected="selected" <?php } ?> value="<?php echo $marchent['m_id'];?>"><?php echo $marchent['seller_id'];?></option>
<?php }  } ?>
                  </select>

                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <select class="form-control" name="category"  onChange="aaaa(this.value);" >
                  <option value="">--Select--</option>
                 <?php  $category=$obj->fetchAllDetail("category");
					if($category)
					{
					while($category1=mysqli_fetch_assoc($category))
					{
?>
                  <option <?php if($content['category']==$category1['id']) { ?> selected="selected" <?php } ?>value="<?php echo $category1['id'];?>"><?php echo $category1['category'];?></option>
<?php }  } ?>
                  </select>

                </div>
				
			<div class="form-group">
                  <label for="exampleInputEmail1">Sub Category</label>
                  <select class="form-control" name="sub_category" id="sub_category"  onChange="bbbb(this.value);">
                 <?php $sub_category=$obj->fetchById($content['sub_category'],'sub_category','id');?>
														 <option value="<?php echo $sub_category['id'];?>"><?php echo $sub_category['sub_category'];?></option>
                
                  </select>

                </div>
				
					<div class="form-group">
                  <label for="exampleInputEmail1">Sub Topic</label>
                  <select class="form-control" name="sub_topic" id="sub_topic"  >
                 <?php $sub_topic=$obj->fetchById($content['sub_topic'],'sub_topic','id');?>
														 <option value="<?php echo $sub_topic['id'];?>"><?php echo $sub_topic['sub_topic'];?></option>
                
                  </select>
				</div>
				
			
				
			
				
                  <div class="form-group">
                  <label for="exampleInputEmail1">Image1 Size(187*222)</label>
				     <input type="hidden" class="form-control"  name="limg1" value="<?php echo $content['image1'];?>">
                  <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="image1" >
                  <img src="upload/<?php echo $content['image1'];?>" style="width:150px;">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Image2 Size(187*222)</label>
				     <input type="hidden" class="form-control"  name="limg2" value="<?php echo $content['image2'];?>">
                  <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="image2" >
                  <img src="upload/<?php echo $content['image2'];?>" style="width:150px;">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Image3 Size(187*222)</label>
				     <input type="hidden" class="form-control"  name="limg3" value="<?php echo $content['image3'];?>">
                  <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="image3" >
                  <img src="upload/<?php echo $content['image3'];?>" style="width:150px;">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Image4 Size(187*222)</label>
				     <input type="hidden" class="form-control"  name="limg4" value="<?php echo $content['image4'];?>">
                  <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="image4" >
                  <img src="upload/<?php echo $content['image4'];?>" style="width:150px;">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Image5  Size(187*222)</label>
				     <input type="hidden" class="form-control"  name="limg5" value="<?php echo $content['image5'];?>">
                  <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="image5" >
                  <img src="upload/<?php echo $content['image5'];?>" style="width:150px;">
                </div>
                		<div id="aaaa">
                        
						<?php
						$bb=1;
						 $ex=explode(",",$content['size_id']);
						$exx=explode(",",$content['price']);
						$exxx=explode(",",$content['discount']);
						$exxxx=explode(",",$content['dprice']);
						$exxxp=explode(",",$content['pquantitytype']);
						$exxxps=explode(",",$content['quantitys']);
						$exxxpsa=explode(",",$content['size_id']);
						$exxxpsaa=explode(",",$content['color_code']);
						$exxxpsaax=explode(",",$content['color_name']);
						foreach($ex as $b => $value)
						{$bb++;
							
							?>
							<div class="form-group">
                  <label for="exampleInputEmail1">Product Size*</label>
                  <select class="form-control "   name="size_id[]" >
                  <option value="">Select Type</option>
                  <?php $pqtype=$obj->fetchDetailById(1,"size","status");
				  if($pqtype)
				  {
					  while($pqtype1=mysqli_fetch_assoc($pqtype))
					  {
						  ?>
                                    <option <?php if(@$ex[$b]==$pqtype1['size_id']) { ?> selected="selected" <?php } ?> value="<?php echo $pqtype1['size_id'];?>"><?php echo $pqtype1['size'];?></option>
                                    <?php } } ?>

                  </select>
                </div>
                	 	 <div class="form-group">
                  <label for="exampleInputEmail1">color Name</label>
                  <input type="text" class="form-control"  placeholder="Example-100" name="color_name[]" value="<?php echo @$exxxpsaax[$b];?>" >
                </div>
                
                   
                  <div class="form-group">
                  <label for="exampleInputEmail1">Product Quantity(No. of Quantity)*</label>
                  <input type="text" class="form-control"  placeholder="Example-100" name="quantitys[]"  value="<?php echo @$exxxps[$b];?>">
                </div>
				 <div class="form-group">
                  <label for="exampleInputEmail1">Product price*</label>
                  <input type="text" class="form-control" placeholder="Example-10" name="price[]" id="price<?php echo $bb;?>" value="<?php echo @$exx[$b];?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Discount(%)*</label>
                  <input type="text" class="form-control" placeholder="Example-10"  onkeyup="pcal<?php echo $bb;?>(this.value);" name="discount[]" id="typeahead"  value="<?php echo @$exxx[$b];?>">
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Discount Price*</label>
                  <input type="text" class="form-control" placeholder="Example-9"name="dprice[]" id="dprice<?php echo $bb;?>"  value="<?php echo @$exxxx[$b];?>">
                </div>
				<?php } ?>
			</div>
			<div class="box-footer" style="text-align: right;">
				<a  class="btn-primary  btn" id="btn2">Add More</a>
              </div>
		
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
																<script>
$(document).ready(function(){
	var maxAppendh = 0;
    $("#btn2").click(function(){
		 if (maxAppendh >= 50) return;
   
    	 maxAppendh++;
        $("#aaaa").append('<div class="form-group"><label for="exampleInputEmail1">Product Size*</label><select class="form-control "   name="size_id[]" ><option value="">Select Type</option><?php $pqtype=$obj->fetchDetailById(1,"size","status");if($pqtype){while($pqtype1=mysqli_fetch_assoc($pqtype)){?><option value="<?php echo $pqtype1['size_id'];?>"><?php echo $pqtype1['size'];?></option><?php } } ?></select></div><div class="form-group"><label for="exampleInputEmail1">color Name</label><input type="text" class="form-control"  placeholder="Example-100" name="color_name[]" ></div><div class="form-group"><label for="exampleInputEmail1">Product Quantity(No. of Quantity)*</label><input type="text" class="form-control"  placeholder="Example-100" name="quantitys[]" ></div><div class="form-group"><label for="exampleInputEmail1">Product price*</label><input type="text" class="form-control" placeholder="Example-10" name="price[]" id="price'+maxAppendh+'" ></div><div class="form-group"><label for="exampleInputEmail1">Discount(%)*</label><input type="text" class="form-control" placeholder="Example-10"  onkeyup="pcal'+maxAppendh+'(this.value);" name="discount[]" id="typeahead"  ></div><div class="form-group"><label for="exampleInputEmail1">Discount Price*</label><input type="text" class="form-control" placeholder="Example-9"name="dprice[]" id="dprice'+maxAppendh+'"  ></div>');
						  $("i").append(addinput);

    });
});
</script>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
                
             
              <!-- /.box-body -->

          
    
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	
	   
    <!-- /.content -->
  </div>
  <script>
   
   
 
   
   function pcal0(p){
//alert(p);
var price0= document.getElementById("price0").value
if(price0){
var r0=p0/100*price0;
document.getElementById("dprice0").value=price0-r0;
}
}

 function pcal1(p1){
//alert(p);
var price1= document.getElementById("price1").value
if(price1){
var r1=p1/100*price1;
document.getElementById("dprice1").value=price1-r1;
}
}
 function pcal2(p2){
//alert(p);
var price2= document.getElementById("price2").value
if(price2){
var r2=p2/100*price2;
document.getElementById("dprice2").value=price2-r2;
}
}
 function pcal3(p3){
//alert(p);
var price3= document.getElementById("price3").value
if(price3){
var r3=p3/100*price3;
document.getElementById("dprice3").value=price3-r3;
}
}
 function pcal4(p4){
//alert(p);
var price4= document.getElementById("price4").value
if(price4){
var r4=p4/100*price4;
document.getElementById("dprice4").value=price4-r4;
}
}
 function pcal5(p5){
//alert(p);
var price5= document.getElementById("price5").value
if(price5){
var r5=p5/100*price5;
document.getElementById("dprice5").value=price5-r5;
}
}

function pcal8(p8){
//alert(p);
var price8= document.getElementById("price8").value
if(price8){
var r8=p8/100*price8;
document.getElementById("dprice8").value=price8-r8;
}
}

function pcal9(p9){
//alert(p);
var price9= document.getElementById("price9").value
if(price9){
var r9=p9/100*price9;
document.getElementById("dprice9").value=price9-r9;
}
}

function pcal10(p10){
//alert(p);
var price10= document.getElementById("price10").value
if(price10){
var r10=p10/100*price10;
document.getElementById("dprice10").value=price10-r10;
}
}

function pcal11(p11){
//alert(p);
var price11= document.getElementById("price11").value
if(price11){
var r11=p11/100*price11;
document.getElementById("dprice11").value=price11-r11;
}
}

function pcal12(p12){
//alert(p);
var price12= document.getElementById("price12").value
if(price12){
var r12=p12/100*price12;
document.getElementById("dprice12").value=price12-r12;
}
}
 function aaaa(a){
			//	alert(a);
				 $("#sub_category").load("sub_categoryajax.php?id="+a);
				  }
				   function bbbb(a){
			//	alert(a);
				 $("#sub_topic").load("sub_topicajax.php?id="+a);
				  }
				  </script>
  <!-- /.content-wrapper -->
 <?php include('footer.php');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
