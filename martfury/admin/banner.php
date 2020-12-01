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
      <h1>Banner 
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
              <h3 class="box-title">Banner</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="banner_sub.php" method="post" enctype="multipart/form-data">
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
                  <option   value="<?php echo $marchent['m_id'];?>"><?php echo $marchent['seller_id'];?></option>
<?php }  } ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Page Title" name="title">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Link" name="link">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Descriptions</label>
				  <textarea class="form-control" id="editor1" placeholder="Content" name="content"></textarea>
                 
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Image Size(1600*460)</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Page Title" name="image">
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
	
	   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Banner List</h3>
            </div>
       
       
            <!-- /.box-header -->
            <div class="box-body">
             <a download="somedata.xls" href="#" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');">Export to Excel</a>
        <br/>
        <a download="somedata.csv" href="#" onClick="return ExcellentExport.csv(this, 'datatable');">Export to CSV </a>
        <br/>
			 <table id="datatable" class="table table-bordered table-hover">
			 <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Descriptions</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
				</thead>
				<tbody>
           
				 <?php
					$table='banner';
					$rs=$obj->fetchAllDetail($table);
					if($rs)
					{$i=0;
					while($row=mysqli_fetch_assoc($rs))
					{$i++;
			 ?>
                  <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo substr($row['descriptions'],0,20);?></td>
                   <td class="center"><img src="upload/<?php echo $row['image'];?>" alt="" style="width:80px; height:80px;">
				   
				 </td>
                  <td class="center"><a class="btn btn-info" href="edit_banner.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>&table=banner&field=id&page=banner" onClick="return confirm('Are you sure?');"> <i class="glyphicon glyphicon-trash icon-white"></i> Delete </a> </td>
                </tr>
             <?php }}?>  
			 </tbody>
			  <tfoot>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Descriptions</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
				</tfoot>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
		  </div>
		  </div>
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#datatable").DataTable();
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
