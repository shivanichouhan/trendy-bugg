<?php
 include"../include/database.php";
 include"../include/session.php";
  $obj=new database();
$web_info=$obj->fetchByIdTable("website_details");
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
<?php include('sidebar.php');?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
       <!-- <li><a href="#">Forms</a></li>-->
      
      </ol>
    </section>

  <form class="form-horizontal"  action="invntory_sub.php" method="post" enctype="multipart/form-data"/>
	  <input type="hidden" name="pid" value="<?php echo $_POST['pid']; ?>" style="width:30px;" />
				  <?php 
				  
				  $pid=$_POST['pid']; 
				   $chart_size=$_POST['chart_size']; 
				  ?>

	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Color List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 <table id="example2" class="table table-bordered table-hover">
               
               <?php
				 foreach($chart_size as $cid)
				  {
				  $x=explode("-",$cid);
				  $inventory=0;
				   $rsinve=$obj->fetch_productsizebypid($x[0],$x[1],$pid);
				   if($rsinve){
				    while($inve=mysql_fetch_assoc($rsinve)) {
					$inventory=$inve['inventory'];
					}}
				   ?>
              <tr>
                    <td><?php $cname=$obj->fetch_colorbyid($x[1]); if($x[1]==0){ echo "None"; }else { ?><p align="center" style="background:<?php echo $cname['color'] ?>; width:20px; height:20px;border:1px solid #CCCCCC;"></p><?php }?><input type="hidden" name="color[]" value="<?php echo $x[1]; ?>" style="width:30px;" /></td>
                    
                    <td><?php $size= $obj->fetch_sizebyid($x[0]); if($x[0]==0){ echo "None"; }else { echo $size['size']; }?> <input type="hidden" name="size[]" value="<?php echo $x[0]; ?>" style="width:30px;" /></td>
                    <td><input type="text"  name="inv[]" id="inv[]" value="<?php echo $inventory; ?>"  required></td>
                  </tr>
				  <?php } ?>
<tr><td></td>  <td>  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Next</button>
              </div></td></tr>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
		  </div>
		  </div>
		</section>
		</form>
  </div>
  
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
