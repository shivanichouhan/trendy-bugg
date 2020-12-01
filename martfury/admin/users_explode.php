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
<body >
<div class="wrapper">

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
             <a download="somedata.xls" href="#" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');">Export to Excel</a>
        <br/>
        <a download="somedata.csv" href="#" onClick="return ExcellentExport.csv(this, 'datatable');">Export to CSV </a>
        <br/>
        <table id="datatable" class="table table-striped">
      	 <thead>
                <tr>
                  <th>Customer Id</th>
                  <th>Customer Name</th>
                
                    <th>Mobile Number1 </th>
                     <th>Mobile Number2 </th>
                       <th>Customer Address</th>
                       	
				 <?php
					$table='register';
					$rs=$obj->fetchAllDetail($table);
					if($rs)
					{$i=0;
					while($row=mysqli_fetch_assoc($rs))
					{$i++;
			 ?>
                      <?php 
                    $rsa=$obj->fetchDetailById($row['user_id'],"address","user_id");
					if($rsa)
					{$ia=0;
					while($rowa=mysqli_fetch_assoc($rsa))
					{$ia++;
					?>
                  <th>Pincode<?php echo $ia;?></th>
                  <?php } }  }} ?>
                   
                
                </tr>
                
				</thead>
				<tbody>
				
				 <?php
					$table='register';
					$rs=$obj->fetchAllDetail($table);
					if($rs)
					{$i=0;
					while($row=mysqli_fetch_assoc($rs))
					{$i++;
			 ?>
             <tr>
                  <td><?php echo $row['user_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                
                    <td><?php echo $row['phone'];?></td>
                      <td><?php echo $row['phone1'];?></td>
                      <?php 
                    $rsa=$obj->fetchDetailById($row['user_id'],"address","user_id");
					if($rsa)
					{$ia=0;
					while($rowa=mysqli_fetch_assoc($rsa))
					{$ia++;
						if($ia==1) {
					?>
				
					  <td><?php echo $rowa['address'];?></td>
					  <?php } ?>
                        <td><?php echo $rowa['postcode'];?></td>
                       <?php }} ?>
                  
                </tr>
                  <?php }}?> 
				</tbody>
				
           
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
        <script src="dist/js/excellentexport.js"></script>

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

