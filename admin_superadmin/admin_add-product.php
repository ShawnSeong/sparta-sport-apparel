<!DOCTYPE html>
<html>

<head>
	<title>Add Product</title>

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

<li class="submenu">
<a href="#"><i class="fas fa-file-invoice"></i><span> Orders </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-order.php">All Orders </a></li>
<li><a href="admin_edit-order.php"> Edit Orders </a></li>
</ul>
</li>
 

<li class="submenu">
<a href="#"><i class="fas fa-key"></i> <span> Product Color</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-product-color.php">All Product Color</a></li>
<li><a href="admin_add-product-color.php">Add Product Color</a></li>
<li><a href="admin_edit-product-color.php">Edit Product Color</a></li>
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
										<label>Upload Upper Image for Product</label>
										<div class="custom-file mb-3">
											<input type="file" name="p_image" required>
										</div>
									</div>
								</div>
								
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Description</label>
										<textarea class="form-control" rows="8" id="comment" name="product_description" placeholder="Enter Product Description" required></textarea>
									</div>
								</div>
				<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_product" value="Save">
				<button type="button" class="btn btn-primary buttonedit">Cancel</button>
				<a href="admin_all-product.php" class="btn btn-secondary">Back</a>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>
<?php
	if(isset($_POST["save_product"]) && isset($_FILES["p_image"]) )
	{
		$admin_id=$_POST["admin_id"];
		$product_name=$_POST["product_name"];
		$product_type=$_POST["product_type"];
		$product_brand=$_POST["product_brand"];
		$product_price=$_POST["product_price"];
		$product_description=$_POST["product_description"];

	
				

				$img_name = $_FILES['p_image']['name'];
				$img_size = $_FILES['p_image']['size'];
				$tmp_name = $_FILES['p_image']['tmp_name'];
				$error = $_FILES['p_image']['error'];
			
				if ($error === 0) 
				{
					if ($img_size > 800000) {
						$em = "Sorry, your file is too large.";
					}else 
					{
						$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
						$img_ex_lc = strtolower($img_ex);
			
						$allowed_exs = array("jpg", "jpeg", "png"); 
			
						if (in_array($img_ex_lc, $allowed_exs)) {
							$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
							$img_upload_path = 'image/'.$new_img_name;
							move_uploaded_file($tmp_name, $img_upload_path);
			
							// Insert into Database
							
						}else
						 {
							
							?>
				 <script>
				alert("You can't upload files of this type");
				</script>
		
		<?php
						}
					}
				}else 
				{
		?>
				 <script>
				alert("unknown error occurred!");
				</script>
			
			
			
	<?php

				}
			
				//$sql = "INSERT INTO koko(koko_image) VALUES('$new_img_name')";
		//$check=mysqli_query($connect, $sql);
		$check=mysqli_query($connect,"INSERT INTO product_detail(product_name,product_description,product_image,product_price) VALUES ('$product_name','$product_description','$new_img_name','$product_price')");
		//$product_table=mysqli_query($connect,"INSERT INTO product(product_detail_id,product_stock,product_size_id,product_color_id,product_type_id,product_brand_id,admin_add_id) VALUES (LAST_INSERT_ID(),'$product_stock','$product_size','$product_color','$product_type','$product_brand','$admin_id')");

		if($check) //&& $product_table
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