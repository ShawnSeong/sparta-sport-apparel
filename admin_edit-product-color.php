<!DOCTYPE html>
<html>

<head>
	<title>Edit Product Colour</title>

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

<?php
if(isset($_POST["product_color_id"]))
{
	
	$checking=0;
	$check=0;
	$pid =$_GET['id'];
	$product_color=$_POST["product_color"];

	$validation=mysqli_query($connect,"SELECT *FROM product_color");
		while($row = mysqli_fetch_assoc($validation))
		{
		if(strtolower($row['product_color']) == $product_color)
		{
			?>
<script>
alert("Product color exist.Please try again.");

</script>
<?php
	$checking=1;
		}
	}
	if($checking==0)
	{
		$check=mysqli_query($connect,"UPDATE product_color SET product_color='$product_color' WHERE product_color_id='$pid'");
	}
			if($check)
			{
	?>
				<script>
				alert("Save Successfully.");
				</script>
<?php
				header("refresh:0.2; url=admin_all-product-color.php");
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
 

<li class="submenu" style="background-color:rgb(255, 106, 89);">
<a href="#"><i class="fas fa-key" ></i> <span> Product Colour</span> <span class="menu-arrow"></span></a>
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
							<h3 class="page-title mt-5">Edit Product Color</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="post" autocomplete="off">
					<?php
						if(isset($_GET["edit"]))
						{
							$pid =$_GET['id'];
							$result = mysqli_query($connect, "SELECT *FROM product_color WHERE product_color_id='$pid'");
							$row = mysqli_fetch_assoc($result);
				 	?>
							<div class="row formtype">
							<div class="col-md-4">
									<div class="form-group">
										<label>Product Color ID</label>

										<input class="form-control" type="text" name="product_type_id" value="<?php echo $row['product_color_id'] ?>" readonly></div>
										
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>Product Color Name</label>

										<input class="form-control" type="text" name="product_color" value="<?php echo $row['product_color'] ?>"  required></div>
										
								</div>

							</div>
							
							<input  type="submit" class="btn btn-primary buttonedit ml-2" name="product_color_id" value="Save">
							<button type="button" class="btn btn-primary buttonedit">Cancel</button>
							<a href="admin_all-product-color.php" class="btn btn-secondary">Back</a>
							
						</form>
					<?php
						}
						?>
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