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

<?php
$phone_check="";
$password_check="";
$email_check="";
$error_pass="";
$postcode_check="";
				if(isset($_POST["save_customer"]))
				{
					$checking=0;
					$result=0;
					$check=0;
					$fname=$_POST["f_name"];
					$lname=$_POST["l_name"];
					$phone=$_POST["phone"];
					$email=$_POST["email"];
					$password=$_POST["password"];
					$password_2=$_POST["conpass"];
					$state=$_POST["state"];
					$city=$_POST["city"];
					$postcode=$_POST["postcode"];
					$address1=$_POST["address_1"];
					$address2=$_POST["address_2"];

					$phone_number=strlen($phone);
					if($phone_number<10) //phone number
					{
						$phone_check="*Phone number must be at least 10 numbers.";
						$checking=1;
					}
					
					$select_2 = mysqli_query($connect, "SELECT customer_email FROM customer WHERE customer_email = '".$_POST['email']."'") or exit(mysqli_error($connect));
					if(mysqli_num_rows($select_2))  //checking email
					{
						$email_check="*This email existed";
						$checking=1;
					}

					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //email format
					{
						$email_check = "*Invalid email format";
						$checking=1;
					}

					if($password != $password_2) //checking password match
					{
						$error_pass="*Password not matching.";
						$checking=1;
					}

					$postcode_number=strlen($postcode);
							if($postcode_number<5) //postcode
							{
								$postcode_check="*Postcode must be at least 5 numbers.";
								$checking=1;
							}

					if($checking==0)
					{
					$check=mysqli_query($connect,"INSERT INTO customer (customer_first_name, customer_last_name, customer_email, customer_phone_num, customer_password) VALUES ('$fname', '$lname', '$email', '$phone', '$password') ");
					$result=mysqli_query($connect,"INSERT INTO customer_address(delivery_address_line1,delivery_address_line2,contact_number,state,postcode,city,customer_id) VALUES ('$address1','$address2','$phone','$state','$postcode','$city',LAST_INSERT_ID())");
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
							<h3 class="page-title mt-5">Add Customer</h3> </div>
					</div>
				</div>
				<div class="row">

					<div class="col-lg-12">
						<form method="post" autocomplete="off">
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
								<input class="form-control" id="sel1" name="phone" placeholder="Enter Phone Number" pattern="0.+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" required>
								<span style="color:red;"><?php echo $phone_check;?></span>

							</div>

						</div>
		
						<div class="col-md-4">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" id="sel1" name="email" placeholder="Enter Customer Email" required>
								<span style="color:red;"><?php echo $email_check;?></span>
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
								<span style="color:red;"><?php echo $error_pass; ?></span>
							</div>
						</div>

						<div class="col-md-4">
			<div class="form-group">
				<label>State</label>
					<select class="form-control" id="sel3" name="state" required>
							<option disabled value="" selected>Select State</option>
							<option value="Johor">Johor</option>
							<option value="Kedah">Kedah</option>
							<option value="Kelantan">Kelantan</option>
							<option value="Malacca">Malacca</option>
							<option value="Perak">Perak</option>
							<option value="Selangor">Selangor</option>
							<option value="Negeri Sembilan">Negeri Sembilan</option>
							<option value="Pahang">Pahang</option>
							<option value="Perlis">Perlis</option>
							<option value="Penang">Penang</option>
							<option value="Sabah">Sabah</option>
							<option value="Sarawak">Sarawak</option>
							<option value="Terengganu">Terengganu</option>
					</select>
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
								<input class="form-control" id="sel1" name="postcode" placeholder="Enter Postcode" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="5" required>
								<span style="color:red;"><?php echo $postcode_check; ?></span>
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
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_customer" value="Save">&nbsp;&nbsp;
						<a href="superadmin_all-customer.php" class="btn btn-secondary">Back</a>
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