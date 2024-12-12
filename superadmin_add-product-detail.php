<!DOCTYPE html>
<html>

<head>
	<title>Add Product Detail</title>

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
 
<li class="submenu" >
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
							<h3 class="page-title mt-5">Add Product Detail</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="post">
							<div class="row formtype">
                            <?php
	$pid =$_SESSION['product_detail_id'];
	$result = mysqli_query($connect, "SELECT * from product_detail
							WHERE product_detail.product_detail_id='$pid' ");
		while($row = mysqli_fetch_assoc($result))
		{
?>

<div class="col-md-4">
									<div class="form-group">
										<label>Product Name</label>
										<input class="form-control" type="text" name="product_name"  value="<?php echo $row['product_name']; ?>"readonly> </div>
								</div>


								<div class="col-md-4">
									<div class="form-group">
										<label>Product Colour</label>
										<select class="form-control" id="sel3" name="product_colour" required>
										<option disabled selected>Select Product Colour</option>
							<?php
										$result = mysqli_query($connect, "SELECT * from product_color WHERE product_color_status!=0");
										while($row = mysqli_fetch_assoc($result))
										{
											echo "<option value='". $row['product_color_id'] ."'>" .$row['product_color'] ."</option>";		
										}
							?>
										</select>
							
									</div>
								</div>

                                <div class="col-md-4">
									<div class="form-group">
										<label>Product Size</label>
										<select class="form-control" id="sel3" name="product_size" required>
										<option disabled selected>Select Product Size</option>
							<?php
										$result = mysqli_query($connect, "SELECT * from product_size");
										while($row = mysqli_fetch_assoc($result))
										{
											echo "<option value='". $row['product_size_id'] ."'>" .$row['product_size'] ."</option>";		
										}
							?>
										</select>
							
									</div>
								</div>
								

                                <div class="col-md-4">
									<div class="form-group">
										<label>Product Stock</label>
										<input class="form-control" type="number" name="product_stock" min="1" required> </div>
								</div>
							</div>

				<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_product_detail" value="Save">
				<button type="button" class="btn btn-primary buttonedit">Cancel</button>
                <a href="superadmin_all-product-detail.php?view&id=<?php echo $pid; ?>" class="btn btn-secondary" >Back</a>
						</form>
                        <?php
                         }

                         $product_detail_id=$pid;
			
		if(isset($_POST["save_product_detail"]))
		{
			$admin=$_SESSION['id'];
			$checking=0;
			$check=0;
			$color=$_POST['product_colour'];
			$size=$_POST['product_size'];
			$stock=$_POST['product_stock'];

			$validation=mysqli_query($connect,"SELECT *FROM product WHERE product_detail_id='$product_detail_id'");
		while($row = mysqli_fetch_assoc($validation))
		{
		if($row['product_size_id']== $size && $row['product_color_id']==$color)
		{
			?>
<script>
alert("Product detail exist.Please try again.");

</script>
<?php
	$checking=1;
		}
	}
	if($checking==0)
	{
			$check=mysqli_query($connect,"INSERT INTO product(product_detail_id,product_stock,product_size_id,product_color_id,admin_add_id) VALUES ('$product_detail_id','$stock','$size','$color','$admin')");
	}
			if($check)
			{
		?>
					<script>
					alert("Save Successfully.");
					
					</script>
	<?php
					
			}
	}
	?>	
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