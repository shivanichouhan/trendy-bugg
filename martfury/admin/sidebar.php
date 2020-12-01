 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="upload/<?php echo $admin['image'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $admin['user_name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     <ul class="sidebar-menu">
       <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="home.php"><i class="fa fa-circle-o"></i> Website Details</a></li>
           <li><a href="banner.php"><i class="fa fa-circle-o"></i> Banner</a></li>
			  <li><a href="content.php"><i class="fa fa-circle-o"></i> Content Control</a></li>
			   <li><a href="push_notification.php"><i class="fa fa-circle-o"></i> Push Notification</a></li>
			 </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Location</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="country.php"><i class="fa fa-circle-o"></i> Country</a></li>
           <li><a href="state.php"><i class="fa fa-circle-o"></i> State</a></li>
			  <li><a href="city.php"><i class="fa fa-circle-o"></i> City</a></li>
                <li><a href="postalcode.php"><i class="fa fa-circle-o"></i> Postal Code</a></li>
                 <li><a href="bulkpostcode.php"><i class="fa fa-circle-o"></i>Bulk Postal Code</a></li>
                
			   </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="category.php"><i class="fa fa-circle-o"></i> Super Category</a></li>
           <li><a href="sub_category.php"><i class="fa fa-circle-o"></i>  Category</a></li>
		   <li><a href="sub_topic.php"><i class="fa fa-circle-o"></i> Sub Category</a></li>
		     <li><a href="brand.php"><i class="fa fa-circle-o"></i> Brand</a></li>
             			   <li><a href="quantity.php"><i class="fa fa-circle-o"></i> Quantity Type</a></li>
             			   <li><a href="size.php"><i class="fa fa-circle-o"></i> Size</a></li>
			   <li><a href="blog.php"><i class="fa fa-circle-o"></i> Blog</a></li>
		  </ul>
        </li>
        			 <li><a href="inventory.php"><i class="fa fa-circle-o"></i> Inventory</a></li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="product.php"><i class="fa fa-circle-o"></i> Add Product</a></li>
           <li><a href="manage_product.php"><i class="fa fa-circle-o"></i> Manage Product</a></li>
			 <li><a href="promotions.php"><i class="fa fa-circle-o"></i>Combo offers</a></li>
			  <li><a href="add_grid_product.php"><i class="fa fa-circle-o"></i>Grid Product</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Order Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="order.php"><i class="fa fa-circle-o"></i> Delivered</a></li>
           <li><a href="pend_order.php"><i class="fa fa-circle-o"></i> Pending</a></li>
			  <li><a href="can_order.php"><i class="fa fa-circle-o"></i> Cancelled</a></li>
			  <li><a href="return_order.php"><i class="fa fa-circle-o"></i> Returns</a></li>
			<li><a href="exchange_order.php"><i class="fa fa-circle-o"></i> Exchange</a></li>
			</ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			  <li><a href="users.php"><i class="fa fa-circle-o"></i> Customer </a></li>
			  <li><a href="#"><i class="fa fa-circle-o"></i> Seller </a>
			  <ul class="treeview-menu">
			  <li><a href="add_seller.php"><i class="fa fa-circle-o"></i> Add Seller </a></li>
			  <li><a href="marchent.php"><i class="fa fa-circle-o"></i> Seller </a></li>
               <li><a href="seller_type.php"><i class="fa fa-circle-o"></i> Seller Type</a></li>
			</ul>
			  
			  </li>
			</ul>
        </li>
		<li><a href="subscriber.php"><i class="fa fa-circle-o"></i> NewsLetter </a></li>
        <li><a href="coupon.php"><i class="fa fa-circle-o"></i> Coupon </a></li>
		 </ul>
    </section>
    <!-- /.sidebar -->
  </aside>