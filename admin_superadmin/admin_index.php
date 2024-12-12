<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/style.css"> 
	</head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="admin_index.php" class="logo"> <img src="assets/img/index_logo.png"alt="logo"> <span class="logoclass">Sparta Sport Apparel</span> </a>
			</div>
			
			<a href="admin_logout.php" class="logout" >Log Out</a>

<?php
		session_start();
		include("session_connect.php");
		
		if(!isset($_SESSION['id']))
		{
			?>
				<script>
				alert("Please Log In!");
				</script>
		<?php
			header("refresh:0.2; url=admin_login.php");
			exit();
		}

?>
			
		</div>
<div class="sidebar" id="sidebar">

<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li style="background-color:rgb(255, 106, 89);">
<a href="admin_index.php"><i class="fas fa-tachometer-alt"></i> <span>Admin Dashboard</span></a>
</li>
<li class="list-divider"></li>
<li class="submenu" >
<a href="#"><i class="fas fa-user"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-customer.php"> All customers </a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><i class="fas fa-file-invoice"></i><span> Orders </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-order.php">All Orders </a></li>
<li><a href="admin_edit-order.php"> Edit Orders </a></li>
</ul>
</li>
 


<li class="submenu">
<a href="#"><i class="fas fa-key"></i> <span> Product Type</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-product-type.php">All Product Type</a></li>
<li><a href="admin_add-product-type.php">Add Product Type</a></li>
<li><a href="admin_edit-product-type.php">Edit Product Type</a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><i class="fas fa-key"></i> <span> Product Brand</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-product-brand.php">All Product Brand</a></li>
<li><a href="admin_add-product-brand.php">Add Product Brand</a></li>
<li><a href="admin_edit-product-brand.php">Edit Product Brand</a></li>
</ul>
</li>

<li class="submenu" >
<a href="#"><i class="fas fa-key"></i> <span> Product </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-product.php">All Product </a></li>
<li><a href="admin_add-product.php">Add Product</a></li>
<li><a href="admin_edit-product.php">Edit Product</a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><i class="far fa-money-bill-alt"></i> <span> Product Sales </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_invoice-reports.php">Sales Report </a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><i class="fas fa-cog"></i><span> Profile </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_profile.php">Profile Setting </a></li>
</ul>
</li>
</ul>
</div>
</div>
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Admin Dashboard</h3>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">

										<?php
											$result = mysqli_query($connect, "SELECT * FROM customer");	
											$count = mysqli_num_rows($result);//used to count number of rows
											echo "$count";
										?>
										</h3>
										<h6 class="text-muted">Total Customer</h6> </div>
									
									<div class="ml-auto mt-md-3 mt-lg-0">
									<i class="fas fa-user-plus fa-2x"></i>
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">
										<?php
											$result = mysqli_query($connect, "SELECT * FROM customer_order");	
											$count = mysqli_num_rows($result);
											echo "$count";
										?>
										</h3>
										<h6 class="text-muted">Total Orders</h6> </div>
									
									<div class="ml-auto mt-md-3 mt-lg-0"> <i class="fas fa-shopping-basket fa-2x"></i></div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">
										<?php
											$result = mysqli_query($connect, "SELECT * FROM product");	
											$count = mysqli_num_rows($result);//used to count number of rows
											echo "$count";
										?>
										</h3>
										<h6 class="text-muted">Total Product</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <i class="fas fa-globe fa-2x"></i> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title float-left mt-2">Order</h4>
								<a href="admin_all-order.php" class="btn btn-primary float-right veiwbutton">View All</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center">
										<thead style="text-align:center;">
											<tr>
											<th>Order ID</th>
												<th>Customer ID</th>
												<th>Product ID</th>
												<th>Quantity</th>
												<th>Order Subtotal</th>
												<th>Payment Method</th>
												<th>Grandtotal</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$result = mysqli_query($connect, "SELECT * from customer_order JOIN payment ON customer_order.payment_id=payment.payment_id");
										while($row = mysqli_fetch_assoc($result))
										{
								?>
											<tr>
												<td style="text-align:center;"><?php echo $row['order_id'] ?></td>
												<td style="text-align:center;"><?php echo $row['customer_id'] ?></td>
												<td style="text-align:center;"><?php echo $row['product_id'] ?></td>
												<td style="text-align:center;"><?php echo $row['product_quantity'] ?></td>
												<td style="text-align:center;">RM <?php echo $row['order_subtotal'] ?></td>
												<td style="text-align:center;"><?php echo $row['payment_type'] ?></td>
												<td style="text-align:center;">RM <?php echo $row['grandtotal'] ?></td>
												<td style="text-align:center;"><?php echo $row['order_status'] ?></td>
												
											</tr>
								<?php
										}
								?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--elective choosen navigate bar-->
	<script src="assets/js/jquery-3.5.1.min.js"></script>

	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/js/chart.morris.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>