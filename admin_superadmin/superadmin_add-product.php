<!DOCTYPE html>
<html>

<head>
	<title>Add Product</title>

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
							<h3 class="page-title mt-5">Add Product</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="post" enctype="multipart/form-data">
							<div class="row formtype">
							<div class="col-md-4">
									<div class="form-group">
										<label>Admin ID</label>

										<input class="form-control" type="text" name="admin_id" value="<?php echo $_SESSION["id"]; ?>" readonly></div>
										
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Name</label>
										<input type="text" class="form-control" id="usr" name="product_name" placeholder="Enter Product Name" required> </div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Product Type</label>
										<select class="form-control" id="sel3" name="product_type" required>
										<option disabled selected>Select Product Type</option>
							<?php
										$result = mysqli_query($connect, "SELECT * from product_type");
										while($row = mysqli_fetch_assoc($result))
										{
											echo "<option value='". $row['product_type_id'] ."'>" .$row['product_type_name'] ."</option>";		
										}
							?>
										</select>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Product Brand</label>
										<select class="form-control" id="sel3" name="product_brand" required>
										<option disabled selected>Select Product Brand</option>
							<?php
										$result = mysqli_query($connect, "SELECT * from product_brand");
										while($row = mysqli_fetch_assoc($result))
										{
											echo "<option value='". $row['product_brand_id'] ."'>" .$row['product_brand_name'] ."</option>";		
										}
							?>
										</select>
							
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Product Price</label>
										<input type="text" class="form-control" id="usr1" placeholder="RM " name="product_price" required> </div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Product Stock</label>
										<input type="number" class="form-control" id="usr" name="product_stock" placeholder="" min="1" required> </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Size</label>
										<input type="number" class="form-control" id="usr" name="product_size" placeholder="" min="1" required> </div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Upload Upper Image for Product</label>
										<div class="custom-file mb-3">
											<input type="file" class="custom-file-input" id="customFile" name="product_pic">
											<label class="custom-file-label" for="customFile">Choose Image</label>
										</div>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Colour</label>
										<input type="text" class="form-control" id="usr" name="product_color" placeholder="Enter Product Color" required> </div>
								</div> 

								<div class="col-md-4">
									<div class="form-group">
										<label>Product Description</label>
										<textarea class="form-control" rows="8" id="comment" name="product_description" placeholder="Enter Product Description" required></textarea>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Description</label>
										<textarea class="form-control" rows="8" id="comment"  placeholder=""></textarea>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Description</label>
										<textarea class="form-control" rows="8" id="comment"  placeholder=""></textarea>
									</div>
								</div>
									
								</div>
							</div>
				<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_product" value="Save">
				<button type="button" class="btn btn-primary buttonedit">Cancel</button>
				<a href="superadmin_all-product.php" class="btn btn-secondary">Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="superadmin_assets/js/jquery-3.5.1.min.js"></script>
	<script src="superadmin_assets/js/bootstrap.min.js"></script>
	<script src="superadmin_assets/js/script.js"></script>
</body>
<?php
	if(isset($_POST["save_product"]))
	{
		$admin_id=$_POST["admin_id"];
		$product_name=$_POST["product_name"];
		$product_type=$_POST["product_type"];
		$product_brand=$_POST["product_brand"];
		$product_price=$_POST["product_price"];
		$product_stock=$_POST["product_stock"];
		$product_size=$_POST["product_size"];
		$product_color=$_POST["product_color"];
		$product_description=$_POST["product_description"];
		$picture=$_POST["product_pic"];
		$check=mysqli_query($connect,"INSERT INTO product(product_name,product_price,product_description,product_stock,product_size,product_color,product_type_id,product_brand_id,admin_add_id,product_image) VALUES ('$product_name','$product_price','$product_description','$product_stock','$product_size','$product_color','$product_type','$product_brand','$admin_id','$picture')");

		if($check)
		{
	?>
				<script>
				alert("Save Successfully.");
				</script>
<?php
				
		}
}
mysqli_close($connect);
?>
</html>