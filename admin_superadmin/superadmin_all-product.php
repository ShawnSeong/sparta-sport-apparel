<!DOCTYPE html>
<html>

<head>
	<title>Product Details</title>

	<link rel="stylesheet" href="superadmin_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="superadmin_assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="superadmin_assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="superadmin_assets/css/style.css"> </head>
<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="superadmin_index.php" class="logo"> <img src="superadmin_assets/img/index_logo.png"alt="logo"> <span class="logoclass">Sparta Sport Apparel</span> </a>
			</div>
			
			<a href="superadmin_logout.php" class="logout" >Log Out</a>
			
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
			header("refresh:0.2; url=superadmin_login.php");
			exit();
		}

?>						
		</div>
<div class="sidebar" id="sidebar">

<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li >
<a href="superadmin_index.php"><i class="fas fa-tachometer-alt"></i> <span>Superadmin Dashboard</span></a>
</li>
<li class="list-divider"></li>
<li class="submenu" >
<a href="#"><i class="fas fa-user-plus"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-customer.php"> All customers </a></li>
<li><a href="superadmin_add-customer.php"> Add customers </a></li>
<li><a href="superadmin_edit-customer.php"> Edit customers </a></li>
</ul>
</li>

<li class="submenu" >
<a href="#"><i class="fas fa-user"></i> <span> Admin </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-admin.php">All Admin</a></li>
<li><a href="superadmin_add-admin.php">Add Admin</a></li>
<li><a href="superadmin_edit-admin.php">Edit Admin</a></li>

</ul>
</li>
<li class="submenu" >
<a href="#"><i class="fas fa-file-invoice"></i><span> Orders </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-order.php">All Orders </a></li>
<li><a href="superadmin_edit-order.php"> Edit Orders </a></li>
</ul>
</li>
 


<li class="submenu">
<a href="#"><i class="fas fa-key"></i> <span> Product Type</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-product-type.php">All Product Type</a></li>
<li><a href="superadmin_add-product-type.php">Add Product Type</a></li>
<li><a href="superadmin_edit-product-type.php">Edit Product Type</a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><i class="fas fa-key"></i> <span> Product Brand</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-product-brand.php">All Product Brand</a></li>
<li><a href="superadmin_add-product-brand.php">Add Product Brand</a></li>
<li><a href="superadmin_edit-product-brand.php">Edit Product Brand</a></li>
</ul>
</li>

<li class="submenu" style="background-color:rgb(255, 106, 89);">
<a href="#"><i class="fas fa-key"></i> <span> Product </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-product.php">All Product </a></li>
<li><a href="superadmin_add-product.php">Add Product</a></li>
<li><a href="superadmin_edit-product.php">Edit Product</a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><i class="far fa-money-bill-alt"></i> <span> Product Sales </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_invoice-reports.php">Sales Report </a></li>
</ul>
</li>

<li class="submenu">
<a href="#"><i class="fas fa-cog"></i><span> Profile </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_profile.php">Profile Setting </a></li>
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
								<h4 class="card-title float-left mt-2">All Product</h4> <a href="superadmin_add-product.php" class="btn btn-primary float-right veiwbutton">Add Product</a> </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0" style="text-align:center;">
										<thead>
											<tr>
											<th>Product ID</th>
												<th>Product Name</th>
												<th>Product Price</th>
												<th>Product Description</th>
												<th>Product Stock</th>
												<th>Product Size</th>
												<th>Product Color</th>
												<th>Product Type</th>
												<th>Product Brand</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
											<?php
										$result = mysqli_query($connect, "SELECT * from product 
										JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id
										JOIN product_size ON product.product_size_id = product_size.product_size_id
										JOIN product_type ON product.product_type_id = product_type.product_type_id 
										JOIN product_color ON product.product_color_id = product_color.product_color_id
										JOIN product_brand ON product.product_brand_id = product_brand.product_brand_id");

										while($row = mysqli_fetch_assoc($result))
										{
									?>
											<tr>
											<td style="text-align:center;"><?php echo $row['product_id'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_name'] ?></td>
											<td style="text-align:center;">RM <?php echo $row['product_price'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_description'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_stock'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_size'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_color'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_type_name'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_brand_name'] ?></td>
												<td>
													<div class="actions"> <a href="superadmin_edit-product.php?edit&id=<?php echo $row['product_id']; ?>" class="btn btn-info">Edit</a> <a href="admin_all-product.php?delete&id=<?php echo $row['product_id']; ?>" class="btn btn-danger" onclick="return confirmation()">Delete</a> </div>
												</td>
											</tr>
									<?php
										}

												if (isset($_GET['delete'])) 
											{
												$pid=$_GET['id'];
												mysqli_query($connect,"DELETE from product WHERE product_id='$pid'");
												
												
											}
									?>		
												<script type="text/javascript">
												function confirmation()
												{
													var choice;
													choice=confirm("Do you want to delete?");
													return choice;
												}
										</script>		
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<script src="superadmin_assets/js/jquery-3.5.1.min.js"></script>
	<script src="superadmin_assets/js/bootstrap.min.js"></script>
	<script src="superadmin_assets/js/script.js"></script>
</body>

</html>