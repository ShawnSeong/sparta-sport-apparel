<!DOCTYPE html>
<html>

<head>
	<title>Add Admin</title>
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

<?php
$error_pass="";
$id_check="";
$email_check="";
$phone_check="";
	if(isset($_POST["save_admin"]))
	{
		$checking=0;
		$check=0;
		$admin_id=$_POST["admin_id"];
		$name=$_POST["admin_name"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		$pd=$_POST["password"];
		$conpass=$_POST["con_password"];
		$position=$_POST["position"];
		$address=$_POST["address"]; 
		$phone_number=strlen($phone);

		if($phone_number<10) //phone number
		{
			$phone_check="*Phone number must be at least 10 numbers.";
			$checking=1;
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //email format
		{
			$email_check = "*Invalid email format";
			$checking=1;
		}
		if($pd != $conpass) //checking password match
		{
			$error_pass="*Password not matching.";
			$checking=1;
		}

		$select = mysqli_query($connect, "SELECT admin_id FROM admin WHERE admin_id = '".$_POST['admin_id']."'") or exit(mysqli_error($connect));
		if(mysqli_num_rows($select)) //checking ID 
		{
			$id_check="*This ID existed.";
			$checking=1;
		}


		$select_2 = mysqli_query($connect, "SELECT admin_email FROM admin WHERE admin_email = '".$_POST['email']."'") or exit(mysqli_error($connect));
		if(mysqli_num_rows($select_2))  //checking email
		{
			$email_check="*This email existed";
			$checking=1;
		}

		if($checking==0)
		{
		$check=mysqli_query($connect,"INSERT INTO admin(admin_id,admin_email,admin_name,admin_phone,admin_address,admin_password,admin_position) VALUES ('$admin_id','$email','$name','$phone','$address','$pd','$position')");
		}
		if($check)
		{
	?>
				<script>
				alert("Add Successfully.");
				</script>
<?php
				
		}
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
							<h3 class="page-title mt-5">Add Admin</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<form method="post" autocomplete="off">
						<div class="row formtype">
						<div class="col-md-4">
							<div class="form-group">
								<label>Admin ID</label>
								
								<input class="form-control" id="sel1" name="admin_id" placeholder="Enter Admin ID Eg.A001" pattern="A.+" maxlength="4"required>
								<span style="color:red;"><?php echo $id_check; ?></span>

							</div>
						</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Name</label>
				<input class="form-control" id="sel1" name="admin_name" placeholder="Enter Admin Name" required>
			</div>
		</div>

			<div class="col-md-4">
				<div class="form-group">
				<label>Phone Number</label>
				<input type="text" class="form-control" id="usr1" name="phone" placeholder="Enter Admin Phone Number" pattern="0.+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" required>
				<span style="color:red;"><?php echo $phone_check;?></span>
			    </div>
			</div>

			<div class="col-md-4">
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" id="usr" name="email" placeholder="Enter Admin Email" required>
				<span style="color:red;"><?php echo $email_check; ?></span>


			</div>
		</div>


		<div class="col-md-4">
				<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" id="usr1" name="password" placeholder="Enter Admin Password" required>
			    </div>
		</div>

		<div class="col-md-4">
				<div class="form-group">
				<label>Confirmation Password</label>
				<input type="password" class="form-control" id="usr1" name="con_password" placeholder="Re-enter Admin Password" required>
				<span style="color:red;"><?php echo $error_pass; ?></span>
			    </div>
		</div>

			<div class="col-md-4">
				<div class="form-group">
				<label>Position</label>
				<input type="text" class="form-control" id="usr1" name="position" placeholder="Enter Admin Position" required>
			    </div>
			</div>
			
			<div class="col-md-4">
					<div class="form-group">
					<label>Address</label>
					<textarea class="form-control" rows="8" id="comment" name="address" placeholder="Enter Admin Address" required></textarea>
					</div>
			</div>
			
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_admin" value="Save">&nbsp;
				<a href="superadmin_all-admin.php" class="btn btn-secondary">Back</a>
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

</html>