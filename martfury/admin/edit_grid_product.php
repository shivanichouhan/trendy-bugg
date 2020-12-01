<?php
 include"../include/database.php";
 include"../include/session.php";
  $obj=new database();
$web_info=$obj->fetchByIdTable("website_details");
$grid=$obj->fetchById($_GET['id'],"grid_product","id");
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $web_info['web_title'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<style>
    .autocomplete {
  position: relative;
  display: inline-block;
}


.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

</style>
 <?php include('header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('sidebar.php');?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Grid
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
              <h3 class="box-title">Grid</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="edit_grid_sub.php" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control"  value="<?php echo $grid['id']; ?>" name="id" >
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Grid Heading</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" value="<?php echo $grid['title']; ?>" name="title" >
                </div>
			
            <div class="form-group">
                  <label for="exampleInputEmail1">Product 1</label>
                  <select class="form-control" name="product1">
                  <option value="">--Select--</option>
                 <?php  $marchent_register=$obj->fetchDetailById(1,"product","status");
					if($marchent_register)
					{
					while($marchent=mysqli_fetch_assoc($marchent_register))
					{
?>
                  <option <?php if($grid['product1']==$marchent['pro_id']){ ?> selected="selected"  <?php } ?> value="<?php echo $marchent['pro_id'];?>"><?php echo $marchent['pro_name'];?></option>
<?php }  } ?>
                  </select>

                </div>
			<div class="form-group">
                  <label for="exampleInputEmail1">Product 2</label>
                  <select class="form-control" name="product2">
                  <option value="">--Select--</option>
                 <?php  $marchent_register=$obj->fetchDetailById(1,"product","status");
					if($marchent_register)
					{
					while($marchent=mysqli_fetch_assoc($marchent_register))
					{
?>
                  <option <?php if($grid['product2']==$marchent['pro_id']){ ?> selected="selected"  <?php } ?> value="<?php echo $marchent['pro_id'];?>"><?php echo $marchent['pro_name'];?></option>
<?php }  } ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product 3</label>
                  <select class="form-control" name="product3">
                  <option value="">--Select--</option>
                 <?php  $marchent_register=$obj->fetchDetailById(1,"product","status");
					if($marchent_register)
					{
					while($marchent=mysqli_fetch_assoc($marchent_register))
					{
?>
                  <option <?php if($grid['product3']==$marchent['pro_id']){ ?> selected="selected"  <?php } ?> value="<?php echo $marchent['pro_id'];?>"><?php echo $marchent['pro_name'];?></option>
<?php }  } ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product 4</label>
                  <select class="form-control" name="product4">
                  <option value="">--Select--</option>
                 <?php  $marchent_register=$obj->fetchDetailById(1,"product","status");
					if($marchent_register)
					{
					while($marchent=mysqli_fetch_assoc($marchent_register))
					{
?>
                  <option <?php if($grid['product4']==$marchent['pro_id']){ ?> selected="selected"  <?php } ?> value="<?php echo $marchent['pro_id'];?>"><?php echo $marchent['pro_name'];?></option>
<?php }  } ?>
                  </select>

                </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          
          </div>
                
             
                </form><!-- /.box-body -->
      </div>
          
    
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	
	     
    <!-- /.content -->
  </div>
 
 <?php include('footer.php');?>
 
  <div class="control-sidebar-bg"></div>
</div>

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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
 <script>
    $('.select2').select2();
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
