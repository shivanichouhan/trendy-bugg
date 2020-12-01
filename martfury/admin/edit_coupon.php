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
<link rel="stylesheet" href="bootstrap/css/datepicker.css">

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
$content=$obj->fetchById($_GET['id'], "coupon","id");?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Coupon
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
              <h3 class="box-title">Coupon</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="edit_coupon_sub.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $content['id'];?>">
             <div class="box-body">
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
                  <option <?php  if($content['m_id']==$marchent['m_id']){ ?> selected="selected" <?php } ?>  value="<?php echo $marchent['m_id'];?>"><?php echo $marchent['seller_id'];?></option>
<?php }  } ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Page Title" name="title" value="<?php echo $content['title'];?>" required>
                </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Code</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Code" name="code" value="<?php echo $content['code'];?>" required>
                </div>
                <div class="form-group">
                  <label>Type</label>
                                   <input <?php if($content['type']==0) { ?> checked="checked" <?php } ?> type="radio"   name="type" value="0">In flat
                                      <input <?php if($content['type']==1) { ?> checked="checked" <?php } ?> type="radio"   name="type" value="1">In Percentage

                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Discount</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Discount" name="discount" value="<?php echo $content['discount'];?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Minimum Amount</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Minimum Amount" name="minimum_amount" value="<?php echo $content['minimum_amount'];?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Start Date</label>
                  <input type="text" class="form-control" id="example112" placeholder="Start Date" name="start_date" value="<?php echo $content['start_date'];?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">End Date</label>
                  <input type="text" class="form-control" id="example1121" placeholder="End Date" name="end_date" value="<?php echo $content['end_date'];?>" required>
                </div>
                
              <!-- /.box-body -->

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
<script src="bootstrap/js/datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example112').datepicker({
                    format: "yyyy-mm-dd"
                });  
				  $('#example1121').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
        </script>
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
