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
      Return Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
       <!-- <li><a href="#">Forms</a></li>-->
      
      </ol>
    </section>

    <!-- Main content -->
   
	
	   <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Return Order</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a  href="order_explode.php" target="_blank">Export</a>
        
        <br/>
			 <table id="datatable" class="table table-bordered table-hover">
			 <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Customer Payment</th>
				   <th>Delivery Status</th>
                     <th>Send Mail</th>
				   <th>Action</th>
				   <th>Order Detail</th>
				   <th>Vender Payment </th>

                </tr>
				</thead>
				<tbody>
           
				 <?php
					$table='finalorder';
					$rs=$obj->fetchDetailById(3,$table,"delivery_status");
					if($rs)
					{$i=0;
					while($row=mysqli_fetch_assoc($rs))
					{$i++;
					
			 ?>
                  <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row['name'];?><?php echo $row['lname'];?></td>
                  <td><?php echo $row['total'];?></td>
				  <td><?php echo $row['o_date'];?></td>
				   <td class="text-center">
				   <?php
						if($row['paystatus']==1)
						{
				  ?>
				  <a class="label label-warning"  href="updateStatus.php?id=<?php echo $row['forderid'];?>&status=0&table=finalorder&statusField=paystatus&field=forderid&page=return_order"> Paid </a>
				 <?php 
						 }
						 else
						 {
				 ?>				<a class="label label-danger"  href="updateStatus.php?id=<?php echo $row['forderid'];?>&status=1&table=finalorder&statusField=paystatus&field=forderid&page=return_order"> UnPaid </a>
				 <?php }?>
				 </td>
                  <?php if($row['delivery_status']=="1") { ?>
                      <td class="text-center"><span class="label label-warning">Complete</span></td>
					  <?php } else if($row['delivery_status']=="0") { ?>
					    <td class="text-center"><span class="label label-warning">Processing</span></td>
					  <?php } else if($row['delivery_status']=="2") { ?>
					   <td class="text-center"><span class="label label-danger">Cancel</span></td>
					  <?php } else if($row['delivery_status']=="3") { ?>
					   <td class="text-center"><span class="label label-success">Return</span></td>
					   <?php } ?>
                        <td class="text-center"><a class="label label-success" href="send_delivery.php?id=<?php echo $row['forderid'];?>"> Send  </a> </td>
                   <td class="text-center"><a class="label label-danger" href="delete.php?id=<?php echo $row['forderid'];?>&table= finalorder&field=forderid&page=return_order" onClick="return confirm('Are you sure?');"> <i class="glyphicon glyphicon-trash icon-white"></i>  </a> </td>
				    <td class="text-center"><a class="label label-success" href="invoice.php?id=<?php echo $row['forderid'];?>"> <i class="fa fa-fw fa-eye"></i>  </a> </td>
					<td class="text-center">
				   <?php
						if($row['vstatus']==1)
						{
				  ?>
				  <a class="label label-warning"  href="updateStatus.php?id=<?php echo $row['forderid'];?>&status=0&table=finalorder&statusField=vstatus&field=forderid&page=pend_order"> Paid </a>
				 <?php 
						 }
						 else
						 {
				 ?>				<a class="label label-danger"  href="updateStatus.php?id=<?php echo $row['forderid'];?>&status=1&table=finalorder&statusField=vstatus&field=forderid&page=pend_order"> UnPaid </a>
				 <?php }?>
				 </td>
                </tr>
             <?php }}?>
			 </tbody>  
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
