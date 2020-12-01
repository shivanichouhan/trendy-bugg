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
      <h1>
       Content
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
              <h3 class="box-title">Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="content_sub.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Page Title" required name="title">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Content</label>
				  <textarea class="form-control" id="editor1" placeholder="Content" name="content" required></textarea>
                 
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
              <h3 class="box-title">Content List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <a download="somedata.xls" href="#" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');">Export to Excel</a>
        <br/>
        <a download="somedata.csv" href="#" onClick="return ExcellentExport.csv(this, 'datatable');">Export to CSV </a>
        <br/>
			 <table id="datatable" class="table table-bordered table-hover">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
               
				 <?php
					$table='data';
					$rs=$obj->fetchAllDetail($table);
					if($rs)
					{$i=0;
					while($row=mysqli_fetch_assoc($rs))
					{$i++;
			 ?>
              <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo substr($row['data'],0,20);?></td>
                   <td class="center">
				    <?php
						if($row['status']==1)
						{
				  ?>
				  <a class="btn btn-success"  href="updateStatus.php?id=<?php echo $row['id'];?>&status=0&table=data&statusField=status&field=id&page=content"> Active </a>
				 <?php 
						 }
						 else
						 {
				 ?>				<a class="btn btn-danger"  href="updateStatus.php?id=<?php echo $row['id'];?>&status=1&table=data&statusField=status&field=id&page=content"> Deactive </a>
				 <?php }?>
				 </td>
                  <td class="center"><a class="btn btn-info" href="edit_content.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>&table=data&field=id&page=content" onClick="return confirm('Are you sure?');"> <i class="glyphicon glyphicon-trash icon-white"></i> Delete </a> </td>
                </tr>
             <?php }}?>  
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
