<!DOCTYPE html>
<html>

<head>

	<title>Order Details</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<link rel="stylesheet" href="assets/css/style.css"> </head>
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
<li >
<a href="admin_index.php"><i class="fas fa-tachometer-alt"></i> <span>Admin Dashboard</span></a>
</li>
<li class="list-divider"></li>
<li class="submenu" >
<a href="#"><i class="fas fa-user"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-customer.php"> All customers </a></li>
</ul>
</li>

<li class="submenu" style="background-color:rgb(255, 106, 89);">
<a href="#"><i class="fas fa-file-invoice"></i><span> Orders </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-order.php">All Orders </a></li>
<li><a href="admin_edit-order.php"> Edit Orders </a></li>
</ul>
</li>
 
<li class="submenu">
<a href="#"><i class="fas fa-key"></i> <span> Product Colour</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-product-color.php">All Product Colour</a></li>
<li><a href="admin_add-product-color.php">Add Product Colour</a></li>
<li><a href="admin_edit-product-color.php">Edit Product Colour</a></li>
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
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Order Details</h4> </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead style="text-align:center;">
											<tr>
												<th>Order ID</th>
												<th>Customer ID</th>
												<th>Product ID</th>
												<th>Quantity</th>
												<th>Order Subtotal</th>
												<th>Payment Method</th>
												<th>Grandtotal</th>
												<th>Order Date</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

								<?php 
										$result = mysqli_query($connect, "SELECT * from cart 
										JOIN customer_order ON customer_order.order_id = cart.payment_status
										JOIN payment ON customer_order.payment_id=payment.payment_id WHERE cart.payment_status!=0");
										while($row = mysqli_fetch_assoc($result))
										{
								?>
											<tr>
												<td style="text-align:center;"><?php echo $row['order_id'] ?></td>
												<td style="text-align:center;"><?php echo $row['customer_id'] ?></td>
												<td style="text-align:center;"><?php echo $row['product_id'] ?></td>
												<td style="text-align:center;"><?php echo $row['product_quantity'] ?></td>
												<td style="text-align:center;">RM <?php echo $row['cart_subtotal'] ?></td>
												<td style="text-align:center;"><?php echo $row['payment_type'] ?></td>
												<td style="text-align:center;">RM <?php echo $row['grandtotal'] ?></td>
												<td style="text-align:center;"><?php echo $row['order_date'] ?></td>
												<td style="text-align:center;"><?php echo $row['order_status'] ?></td>
												<td style="text-align:center;">
													<div class="actions"> <a href="admin_edit-order.php?edit&id=<?php echo $row['order_id']; ?>&pid=<?php echo $row['product_id'];?>" class="btn btn-info">Edit</a>  </div>
												</td>
											</tr>
								<?php
										}

									
									?>		
												</script>
								
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
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>