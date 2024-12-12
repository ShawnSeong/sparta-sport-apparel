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
<a href="#"><i class="fas fa-key"></i> <span> Product Colour</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-product-color.php">All Product Colour</a></li>
<li><a href="superadmin_add-product-color.php">Add Product Colour</a></li>
<li><a href="superadmin_edit-product-color.php">Edit Product Colour</a></li>
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
						<form method="post" enctype="multipart/form-data" autocomplete="off">
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
										<option disabled value="" selected>Select Product Type</option>
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
										<option disabled value="" selected>Select Product Brand</option>
							<?php
										$result = mysqli_query($connect, "SELECT * from product_brand WHERE product_brand_status!=0");
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
										<label>Product Cetegory</label>
										<select class="form-control" id="sel3" name="product_category" required>
										<option disabled value="" selected>Select Product Category</option>
										<option>Men</option>
										<option>Women</option>
										</select>
							
									</div>
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
										<label>Upload Upper Image 2 for Product</label>
										<div class="custom-file mb-3">
											<input type="file" name="p_image2" required>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Upload Upper Image 3 for Product</label>
										<div class="custom-file mb-3">
											<input type="file" name="p_image3" required>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label>Upload Upper Image 4 for Product</label>
										<div class="custom-file mb-3">
											<input type="file" name="p_image4" required>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Description</label>
										<textarea class="form-control" rows="8"  name="product_description" placeholder="Enter Product Description" required></textarea>
									</div>
								</div>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_product" value="Save">&nbsp;&nbsp;
				<button type="button" class="btn btn-primary buttonedit">Cancel</button>&nbsp;&nbsp;
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
	if(isset($_POST["save_product"]) && isset($_FILES["p_image"]) && isset($_FILES["p_image2"])  && isset($_FILES["p_image3"]) && isset($_FILES["p_image4"]))
	{
		$admin_id=$_SESSION["id"];
		$product_name=$_POST["product_name"];
		$product_type=$_POST["product_type"];
		$product_brand=$_POST["product_brand"];
		$product_price=$_POST["product_price"];
		$product_description=$_POST["product_description"];
		$product_c=$_POST["product_category"];

		$validation=mysqli_query($connect,"SELECT *FROM product_detail");
		while($row = mysqli_fetch_assoc($validation))
		{
		if(strtolower($row['product_name']) == $product_name)
		{
			?>
<script>
alert("Product exist.Please try again later.");

</script>
<?php
	exit();
		}
	}
				

				$img_name = $_FILES['p_image']['name'];
				$img_size = $_FILES['p_image']['size'];
				$tmp_name = $_FILES['p_image']['tmp_name'];
				$error = $_FILES['p_image']['error'];
			
				if ($error === 0) 
				{
					if ($img_size > 900000) {
						$em = "Sorry, your file is too large.";
					}else 
					{
						$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
						$img_ex_lc = strtolower($img_ex);
			
						$allowed_exs = array("jpg", "jpeg", "png"); 
			
						if (in_array($img_ex_lc, $allowed_exs)) {
							$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
							$img_upload_path = 'images/'.$new_img_name;
							move_uploaded_file($tmp_name, $img_upload_path);
			
							// Insert into Database
							
						}else
						 {
							
							?>
				 <script>
				alert("You can't upload files of this type");
				</script>
		
		<?php
		exit();
						}
					}
				}else 
				{
		?>
				 <script>
				alert("unknown error occurred!");
				</script>
	<?php
				exit();
				}
			
				$img_name2 = $_FILES['p_image2']['name'];
				$img_size2 = $_FILES['p_image2']['size'];
				$tmp_name2 = $_FILES['p_image2']['tmp_name'];
				$error2 = $_FILES['p_image2']['error'];
			
				if ($error2 === 0) 
				{
					if ($img_size2 > 900000) {
						$em2= "Sorry, your file is too large.";
					}else 
					{
						$img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
						$img_ex_lc2 = strtolower($img_ex2);
			
						$allowed_exs2 = array("jpg", "jpeg", "png"); 
			
						if (in_array($img_ex_lc2, $allowed_exs2)) {
							$new_img_name2 = uniqid("IMG-", true).'.'.$img_ex_lc2;
							$img_upload_path2 = 'images/'.$new_img_name2;
							move_uploaded_file($tmp_name2, $img_upload_path2);
			
							// Insert into Database
							
						}else
						 {
							
							?>
				 <script>
				alert("You can't upload files of this type");
				</script>
		
		<?php
		exit();
						}
					}
				}else 
				{
		?>
				 <script>
				alert("unknown error occurred!");
				</script>
	<?php
exit();
				}

				$img_name3 = $_FILES['p_image3']['name'];
				$img_size3 = $_FILES['p_image3']['size'];
				$tmp_name3 = $_FILES['p_image3']['tmp_name'];
				$error3 = $_FILES['p_image3']['error'];
			
				if ($error3 === 0) 
				{
					if ($img_size3 > 900000) {
						$em3= "Sorry, your file is too large.";
					}else 
					{
						$img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
						$img_ex_lc3 = strtolower($img_ex3);
			
						$allowed_exs3 = array("jpg", "jpeg", "png"); 
			
						if (in_array($img_ex_lc3, $allowed_exs3)) {
							$new_img_name3 = uniqid("IMG-", true).'.'.$img_ex_lc3;
							$img_upload_path3 = 'images/'.$new_img_name3;
							move_uploaded_file($tmp_name3, $img_upload_path3);
			
							// Insert into Database
							
						}else
						 {
							
							?>
				 <script>
				alert("You can't upload files of this type");
				</script>
		
		<?php
		exit();
						}
					}
				}else 
				{
		?>
				 <script>
				alert("unknown error occurred!");
				</script>
	<?php
exit();
				}

				$img_name4 = $_FILES['p_image4']['name'];
				$img_size4 = $_FILES['p_image4']['size'];
				$tmp_name4 = $_FILES['p_image4']['tmp_name'];
				$error4 = $_FILES['p_image4']['error'];
			
				if ($error4 === 0) 
				{
					if ($img_size4 > 900000) {
						$em4= "Sorry, your file is too large.";
					}else 
					{
						$img_ex4 = pathinfo($img_name4, PATHINFO_EXTENSION);
						$img_ex_lc4 = strtolower($img_ex4);
			
						$allowed_exs4 = array("jpg", "jpeg", "png"); 
			
						if (in_array($img_ex_lc4, $allowed_exs4)) {
							$new_img_name4 = uniqid("IMG-", true).'.'.$img_ex_lc4;
							$img_upload_path4 = 'images/'.$new_img_name4;
							move_uploaded_file($tmp_name4, $img_upload_path4);
			
							// Insert into Database
							
						}else
						 {
							
							?>
				 <script>
				alert("You can't upload files of this type");
				</script>
		
		<?php
		exit();
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

		$status="1";
		$check=mysqli_query($connect,"INSERT INTO product_detail(product_name,product_description,product_image,product_image2,product_image3,product_image4,product_price,product_type_id,product_brand_id,admin_add_id,product_status,product_category) VALUES ('$product_name','$product_description','$new_img_name','$new_img_name2','$new_img_name3','$new_img_name4','$product_price','$product_type','$product_brand','$admin_id','$status','$product_c')");

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