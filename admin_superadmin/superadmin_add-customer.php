<!DOCTYPE html>
<html>

<head>
	<title>Add Customer</title>
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
<li class="submenu" style="background-color:rgb(255, 106, 89);">
<a href="#"><i class="fas fa-user-plus"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="superadmin_all-customer.php"> All customers </a></li>
<li><a href="superadmin_add-customer.php"> Add customers </a></li>
<li><a href="superadmin_edit-customer.php"> Edit customers </a></li>
</ul>
</li>

<li class="submenu">
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
							<h3 class="page-title mt-5">Add Customer</h3> </div>
					</div>
				</div>
				<div class="row">

					<div class="col-lg-12">
						<form method="post">
						<div class="row formtype">
						<div class="col-md-4">
							<div class="form-group">
								<label>First Name</label>
								<input class="form-control" id="sel1" name="f_name" placeholder="Enter Customer First Name" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Last Name</label>
								<input class="form-control" id="sel1" name="l_name" placeholder="Enter Customer Last Name" required>
							</div>
						</div>
		
						<div class="col-md-4">
							<div class="form-group">
								<label>Phone Number</label>
								<input class="form-control" id="sel1" name="phone" placeholder="Enter Phone Number" required>
							</div>
						</div>
		
						<div class="col-md-4">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" id="sel1" name="email" placeholder="Enter Customer Email" required>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" id="sel1" name="password" placeholder="Enter Password" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Password Confirmation</label>
								<input type="password" class="form-control" id="sel1" name="conpass" placeholder="Enter Confirmation" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>State</label>
								<input class="form-control" id="sel1" name="state" placeholder="Enter State" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>City</label>
								<input class="form-control" id="sel1" name="city" placeholder="Enter City" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Postcode</label>
								<input class="form-control" id="sel1" name="postcode" placeholder="Enter Postcode" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Address Line 1</label>
								<input class="form-control" id="sel1" name="address_1" placeholder="Enter Addresss 1" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Address Line 2</label>
								<input class="form-control" id="sel1" name="address_2" placeholder="Enter Address 2" required>
							</div>
						</div>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_customer" value="Save">&nbsp;&nbsp;
						<a href="superadmin_all-customer.php" class="btn btn-secondary">Back</a>
						</form>
					</div>
				</div>
				<?php
				if(isset($_POST["save_customer"]))
				{
					$fname=$_POST["f_name"];
					$lname=$_POST["l_name"];
					$phone=$_POST["phone"];
					$email=$_POST["email"];
					$password=$_POST["password"];
					$state=$_POST["state"];
					$city=$_POST["city"];
					$postcode=$_POST["postcode"];
					$address1=$_POST["address_1"];
					$address2=$_POST["address_2"];
					$check=mysqli_query($connect,"INSERT INTO customer (customer_first_name, customer_last_name, customer_email, customer_phone_num, customer_password) VALUES ('$fname', '$lname', '$email', '$phone', '$password') ");
					$result=mysqli_query($connect,"INSERT INTO customer_address(delivery_address_line1,delivery_address_line2,contact_number,state,postcode,city,customer_id) VALUES ('$address1','$address2','$phone','$state','$postcode','$city',LAST_INSERT_ID())");
		
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
			</div>
		</div>
	</div>
	<script src="superadmin_assets/js/jquery-3.5.1.min.js"></script>
	<script src="superadmin_assets/js/bootstrap.min.js"></script>
	
	<script src="superadmin_assets/js/script.js"></script>
	
</body>

</html>