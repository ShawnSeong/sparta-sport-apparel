<!DOCTYPE html>
<html>

<head>

	<title>Edit Customer</title>
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
$postcode_check="";
						if(isset($_POST["save_product"]))
						{
							$checking=0;
							$check=0;
							$lol=0;
							$cus_id=$_POST["id"];
							$f_name=$_POST["f_name"];
							$l_name=$_POST["l_name"];
							$email=$_POST["email"];
							$phone=$_POST["phone"];
							$state=$_POST["state"];
							$city=$_POST["city"];
							$postcode=$_POST["postcode"];
							$address1=$_POST["address1"];
							$address2=$_POST["address2"];

							$phone_number=strlen($phone);
							if($phone_number<10) //phone number
							{
								$phone_check="*Phone number must be at least 10 numbers.";
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
							$check=mysqli_query($connect,"UPDATE customer SET customer_first_name='$f_name',customer_last_name='$l_name',customer_email='$email',customer_phone_num='$phone' WHERE customer_id='$cus_id'");
							$lol=mysqli_query($connect,"UPDATE customer_address SET delivery_address_line1='$address1',delivery_address_line2='$address2',contact_number='$phone',state='$state',postcode='$postcode',city='$city' WHERE customer_id='$cus_id'");
							}
						if($check && $lol)
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

<li class="submenu" >
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
					<h3 class="page-title mt-5">Edit Customer</h3>
				</div>
			</div>
		</div>
		
		<?php
						if(isset($_GET["edit"]))
						{
							$pid =$_GET['id'];
							$result = mysqli_query($connect, "SELECT *  FROM customer JOIN customer_address ON customer_address.customer_id = customer.customer_id WHERE customer.customer_id='$pid'");
							$row = mysqli_fetch_assoc($result);
		?>
		<div class="row">
			<div class="col-lg-12">
				<form method="post" autocomplete="off">
					<div class="row formtype">

						
		<div class="col-md-4">
			<div class="form-group">
				<label>Customer ID</label>
				<input class="form-control" id="sel1" name="id" value="<?php echo $row['customer_id']; ?>" readonly>
				
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label>First Name</label>
				<input class="form-control" id="sel1" name="f_name" value="<?php echo $row['customer_first_name']; ?>" required>
				
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label>Last Name</label>
				<input class="form-control" id="sel1" name="l_name" value="<?php echo $row['customer_last_name']; ?>"  required>
				
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Email</label>
				<input class="form-control" id="sel1" name="email" value="<?php echo $row['customer_email']; ?>"  readonly>
				
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label>Phone Number</label>
				<input class="form-control" id="sel1" name="phone" value="<?php echo $row['customer_phone_num']; ?>" pattern="0.+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" required>
				<span style="color:red;"><?php echo $phone_check;?></span>
			</div>
		</div>

		
		<div class="col-md-4">
			<div class="form-group">
				<label>State</label>
					<select class="form-control" id="sel3" name="state" required>
							<option disabled value="" selected>Select State</option>
							<option value="Johor" <?php if(strtolower($row['state']) =="johor") echo "selected";?> >Johor</option>
							<option value="Kedah" <?php if(strtolower($row['state']) =="kedah") echo "selected";?> >Kedah</option>
							<option value="Kelantan" <?php if(strtolower($row['state']) =="kelantan") echo "selected";?> >Kelantan</option>
							<option value="Malacca" <?php if(strtolower($row['state']) =="malacca") echo "selected";?> >Malacca</option>
							<option value="Perak" <?php if(strtolower($row['state']) =="perak") echo "selected";?> >Perak</option>
							<option value="Selangor" <?php if(strtolower($row['state']) =="selangor") echo "selected";?> >Selangor</option>
							<option value="Negeri Sembilan" <?php if(strtolower($row['state']) =="negeri sembilan") echo "selected";?> >Negeri Sembilan</option>
							<option value="Pahang" <?php if(strtolower($row['state']) =="pahang") echo "selected";?> >Pahang</option>
							<option value="Perlis" <?php if(strtolower($row['state']) =="perlis") echo "selected";?> >Perlis</option>
							<option value="Penang" <?php if(strtolower($row['state']) =="penang") echo "selected";?> >Penang</option>
							<option value="Sabah" <?php if(strtolower($row['state']) =="sabah") echo "selected";?> >Sabah</option>
							<option value="Sarawak" <?php if(strtolower($row['state']) =="sarawak") echo "selected";?> >Sarawak</option>
							<option value="Terengganu" <?php if(strtolower($row['state']) =="terengganu") echo "selected";?> >Terengganu</option>
					</select>
				</div>
			</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>City</label>
				<input class="form-control" id="sel1" name="city" value="<?php echo $row['city']; ?>"  required>
				
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Postcode</label>
				<input class="form-control" id="sel1" name="postcode" value="<?php echo $row['postcode']; ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="5" required>
				<span style="color:red;"><?php echo $postcode_check;?></span>

			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Delivery Line 1</label>
				<input class="form-control" id="sel1" name="address1" value="<?php echo $row['delivery_address_line1']; ?>"  required>
				
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label>Delivery Line 2</label>
				<input class="form-control" id="sel1" name="address2" value="<?php echo $row['delivery_address_line2']; ?>"  required>
				
			</div>
		</div>

				</div>

				<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_product" value="Save">
				<a href="superadmin_all-customer.php" class="btn btn-secondary">Back</a>
			</form>
			<?php
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