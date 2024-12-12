<!DOCTYPE html>
<html>

<head>

	<title>Edit Admin</title>
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

<li class="submenu" style="background-color:rgb(255, 106, 89);">
<a href="#"><i class="fas fa-user"></i> <span> Admin </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-admin.php">All Admin</a></li>
<li><a href="superadmin_add-admin.php">Add Admin</a></li>
<li><a href="superadmin_edit-admin.php">Edit Admin</a></li>
</ul>
</li>

<li class="submenu">
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

<li class="submenu" >
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
					<h3 class="page-title mt-5">Edit Admin</h3>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<form method="post">
				<?php
						if(isset($_GET["edit"]))
						{
							$pid =$_GET['id'];
							$result = mysqli_query($connect, "SELECT *FROM admin WHERE admin_id='$pid'");
							$row = mysqli_fetch_assoc($result);
				?>
					<div class="row formtype">

						
		<div class="col-md-4">
			<div class="form-group">
				<label>Admin ID</label>
				<input type="text" class="form-control" id="sel1" name="id" value="<?php echo $row['admin_id']; ?>" readonly>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" id="sel1" name="name" value="<?php echo $row['admin_name']; ?>" required>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Phone Number</label>
				<input type="text" class="form-control" id="sel1" name="phone" value="<?php echo $row['admin_phone']; ?>" required>
			</div>
		</div>
		

		<div class="col-md-4">
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" id="sel1" name="email" value="<?php echo $row['admin_email']; ?>" required>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label>Position</label>
				<input type="text" class="form-control" id="sel1" name="position" value="<?php echo $row['admin_position']; ?>" required>
			</div>
		</div>

		<div class="col-md-4">
					<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" rows="8" id="comment" name="address"  required><?php echo $row['admin_address']; ?></textarea>
					</div>
		</div>
			
			</div>
			<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_product" value="Save">
				<a href="superadmin_all-admin.php" class="btn btn-secondary">Back</a>
			</form>
			<?php
					}
					if(isset($_POST["save_product"]))
						{
							$admin_id=$_POST["id"];
							$name=$_POST["name"];
							$phone=$_POST["phone"];
							$email=$_POST["email"];
							$position=$_POST["position"];
							$address=$_POST["address"];
							$check=mysqli_query($connect,"UPDATE admin SET admin_name='$name',admin_phone='$phone',admin_email='$email',admin_position='$position',admin_address='$address' WHERE admin_id='$admin_id'");
						
						if($check)
						{
					?>
						<script>
					alert("Edit Successfully.");
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