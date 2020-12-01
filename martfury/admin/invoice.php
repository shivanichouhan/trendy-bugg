<?php
 include"../include/database.php";
 include"../include/session.php";
  $obj=new database();
$web_info=$obj->fetchByIdTable("website_details");
$order=$obj->fetchById($_GET['id'],"finalorder","forderid");
$car=$obj->fetchById($_GET['cart_id'],"cart","cart_id");

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

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Id
        <small><?php echo $order['orderid'];?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
    </section>

    

    <!-- Main content -->
    
        
    <section class="invoice">
    <div id="abcdfg">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
        
          
            <i class="fa fa-globe"></i> Order
          
          </h2>
        </div>
         
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
         <!--<div class="col-sm-4 invoice-col">
          Billing Address
          <address>
            <strong><?php echo $order['name'];?></strong><br>
           <?php echo $order['address'];?><br>
            Phone: <?php echo $order['phone'];?><br>
            Email: <?php echo $order['email'];?>
          </address>
        </div>
        /.col -->
        <div class="col-sm-6 invoice-col">
          Shipping Address
           <address>
            <strong><?php echo $order['name'];?></strong><br>
           <?php echo $order['saddress'];?><br>
            Phone: <?php echo $order['phone'];?><br>
            Email: <?php echo $order['email'];?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
        
          <b>Order ID:</b> <?php echo $order['orderid'];?><br>
          <b>Order Date:</b> <?php echo $order['o_date'];?><br>
        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                  <th>Order Id</th>
                  <th>Product Id</th>
                  <th>Product Name</th>
                    <th>SubCategory Name</th>
                    <th>Category Name</th>
                      <th>Super Category Name</th>
                         <th>Order Date</th>
                         <th>Seller Id</th>
                           <th>Seller Name</th>
                  <th>Quantity </th>
                    <th>Payment Type </th>
                    <th>Destination Pincode </th>
                     <th>Amount </th>
                     <th>Status </th>
                     
                </tr>
            </thead>
            <tbody>
		<?php 	$item=$obj->fetchDetailByIdByStatus($_GET["cart_id"],"cart","cart_id","status","1");
		if($item)
		{$i=0;
		$total1=0;
		while($item1=mysqli_fetch_assoc($item))
		{$i++;
	
		$pro=$obj->fetchById($item1['pro_id'],"product","pro_id");
		$cat=$obj->fetchById($pro['category'],"category","id");
					$scat=$obj->fetchById($pro['sub_category'],"sub_category","id");
					$sub_topic=$obj->fetchById($pro['sub_topic'],"sub_topic","id");
						$order=$obj->fetchById($item1['oid'],"finalorder","forderid");
						//$user=$obj->fetchById($item1['user'],"register","user_id");
						
		 @$disxs=explode(",",$pro['pquantitytype']);
												  $pqun=$obj->fetchById(@$disxs[0],"quantity","id");
 $m=$obj->fetchById(@$pro['m_id'],"marchent_register","m_id");

		 ?>
             <tr>
                  <td><?php echo $order['orderid'];?></td>
                    <td><?php echo $pro['pro_id'];?></td>
                     <td><?php echo $pro['pro_name'];?></td>
                         <td><?php echo $sub_topic['sub_topic'];?></td>
                  <td><?php echo $scat['sub_category'];?></td>
                    <td><?php echo $cat['category'];?></td>
                        <td><?php echo $order['o_date'];?></td>
                  
                  <td><?php  if($pro['m_id']=="0") { echo "SELLER0000"; } else { echo $m['seller_id']; }?></td>
                  <td><?php  if($pro['m_id']=="0") { echo "admin"; } else { $mid=$obj->fetchById($pro['m_id'],"marchent_register","m_id"); echo $mid['name'];}?></td>
                   <td><?php echo $item1['quantity'];?></td>
                     <td> <?php if($order['payment_status']==1) { echo "Paypal"; } else { echo "Cash On Delivery"; }?></td>
                      <td><?php echo $order['postcode'];?></td>
                      <td><?php echo $item1['quantity']*$item1['dprice'];?></td>
                        <td><?php if($item1['delivery_status']==1) { echo "Complete"; } else if($item1['delivery_status']==2) { echo "Cancelled"; } else if($item1['delivery_status']==3) { echo "Returned"; } else if($item1['delivery_status']==0) { echo "Pending"; } ?></td>
                        
                </tr>
                  <?php
				  $total1=$total1+($item1['quantity']*$item1['dprice']);
				  }}?> 
           
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
         

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <?php if($order['payment_status']==1) { echo "Paypal"; } else { echo "Cash On Delivery"; }?>
          </p>
		  
		  
		  
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Order Date  <?php echo $order['o_date'];?></p>

          <div class="table-responsive">
            <table class="table">
             
              <tr>
                <th>Total:</th>
                <td> <?php echo $total1;?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
       </div> 
      <!-- /.row -->
<td>
											<form action="updt_ostatus_sub.php" method="post">
                                            <input type="hidden" name="forder_id" value="<?php echo $_GET['cart_id'];?>">
											<input type="hidden" name="oid" value="<?php echo $_GET['id'];?>">
 											<p><select name="order_status">
											
											<option value="1"
											<?php
											if($car['delivery_status']==1)
											{?>
												selected="selected"
											<?php }
											?>
											>Complete</option>
											<option value="0"
											<?php
											if($car['delivery_status']==0)
											{?>
												selected="selected"
											<?php }
											?>
											>Pending</option>
											<option value="2"
											<?php
											if($car['delivery_status']==2)
											{?>
												selected="selected"
											<?php }
											?>
											>Cancelled</option>
											<option value="3"
											<?php
											if($car['delivery_status']==3)
											{?>
												selected="selected"
											<?php }
											?>
											>Returned</option>
											</select></p>
											<p><input type="submit" value="Update"></p>
											</form>
											</td>
      <!-- this row will not appear when printing -->
     <button class="btn btn-primary" onClick="printDiv()" >Print</button>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <style type="text/css">
/* all devices */
@media all
{
  #content { display:block;}
}

/* printer specific CSS */
@media print
{
  #content { display:none;}
  #content div#yellow { display:block;}
}
</style> 



<script type="text/javascript">
    function printDiv() {    
    var printContents = document.getElementById('abcdfg').innerHTML;
    var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
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
