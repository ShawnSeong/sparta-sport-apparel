<!DOCTYPE html>
<html>

<head>
	<title>Product Details</title>

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
		if(isset($_GET["view"]))
		{
			$pid =$_GET['id'];
		}
?>		

<?php
	if(isset($_POST['add_product_detail']))
	{
		$check_brand=0;
		$checking=mysqli_query($connect,"SELECT * FROM product_detail 
		JOIN product_brand ON product_detail.product_brand_id = product_brand.product_brand_id WHERE product_detail.product_detail_id ='$pid' ");

		while($row = mysqli_fetch_assoc($checking))
		{
			if($row['product_brand_status']==0)
			{
?>
		<script>
		alert("Failed to add new product. Chosen product brand is unavailable now.");
		</script>
<?php
		$check_brand=1;
			}
			
		}

		$checking2=mysqli_query($connect,"SELECT * FROM product_detail 
		JOIN product_type ON product_detail.product_type_id = product_type.product_type_id WHERE product_detail.product_detail_id ='$pid' ");

		while($row2 = mysqli_fetch_assoc($checking2))
		{
			if($row2['product_type_status']==0)
			{
?>
		<script>
		alert("Failed to add new product. Chosen product type is unavailable now.");
		</script>
<?php
		$check_brand=1;
			}
			
		}
		
		if($check_brand==0)
		{
			$_SESSION['product_detail_id'] = $pid;
			header("refresh:0.2; url=admin_add-product-detail.php");
		}
		
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

<li class="submenu">
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

<li class="submenu" style="background-color:rgb(255, 106, 89);">
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
								<form method="post">
								<h4 class="card-title float-left mt-2">All Product Detail</h4> <button class="btn btn-primary float-right veiwbutton" type="submit" name="add_product_detail">Add Product Detail</button> </div>
								</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0" style="text-align:center;">
										<thead style="text-align:center;">
											<tr>
												<th>Product ID</th>
												<th>Product Name</th>
                                                <th>Product Color</th>
                                                <th>Product Size</th>
                                                <th>Product Stock</th>

												<th>Action</th>
											</tr>
										</thead>
										<tbody>
									<?php
                                    
										$result = mysqli_query($connect, "SELECT * from product

                                        JOIN product_color ON product.product_color_id = product_color.product_color_id
                                        JOIN product_size ON product.product_size_id = product_size.product_size_id
                                        JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id WHERE product.product_detail_id='$pid' ");

										while($row = mysqli_fetch_assoc($result))
										{
									?>
											<tr>
											<td style="text-align:center;"><?php echo $row['product_id'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_name'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_color'] ?></td>
											<td style="text-align:center;"><?php echo $row['product_size'] ?></td>
                                            <td style="text-align:center;"><?php echo $row['product_stock'] ?></td>
												<td>
												<a href="admin_edit-product-detail.php?edit&id=<?php echo $row['product_id']; ?>&pid=<?php echo $pid; ?>" class="btn btn-info">Edit</a> </div>												</td>
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
            &nbsp; &nbsp; &nbsp;<a href="admin_all-product.php" class="btn btn-secondary">Back</a>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class"></h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
			
								<button type="button" class="btn btn-danger" name="delete"></button>
				
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