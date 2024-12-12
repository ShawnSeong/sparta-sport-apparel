<!DOCTYPE html>
<html>

<head>

	<title>Edit Order</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<link rel="stylesheet" href="assets/css/style.css"> </head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="admin_index.php" class="logo"> <img src="superadmin_assets/img/index_logo.png"alt="logo"> <span class="logoclass">Sparta Sport Apparel</span> </a>
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

<li class="submenu" style="background-color:rgb(255, 106, 89);">
<a href="#"><i class="fas fa-file-invoice"></i><span> Orders </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-order.php">All Orders </a></li>
<li><a href="admin_edit-order.php"> Edit Orders </a></li>
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
					<h3 class="page-title mt-5">Edit Order</h3>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
			<?php
					if(isset($_GET["edit"]))
						{
							$pid =$_GET['id'];
							$result = mysqli_query($connect, "SELECT * FROM customer_order JOIN customer ON customer_order.customer_id = customer.customer_id JOIN product ON product.product_id = customer_order.product_id  JOIN payment ON payment.payment_id = customer_order.payment_id WHERE order_id='$pid'");
							$row = mysqli_fetch_assoc($result);
				?>
				<form method="post">
				
					<div class="row formtype">

						<div class="col-md-4">
									<div class="form-group">
										<label>Order Id</label>
										<input class="form-control" type="text" name="order_id" value="<?php echo $row["order_id"]; ?>" readonly></div>
	
						</div>

						<div class="col-md-4">
						<div class="form-group">
										<label>Customer First Name</label>
										<input class="form-control" type="text" name="cus_f_name" value="<?php echo $row["customer_first_name"]; ?>" readonly></div>
						</div>

						<div class="col-md-4">
						<div class="form-group">
										<label>Customer Last Name Name</label>
										<input class="form-control" type="text" name="cus_l_name" value="<?php echo $row["customer_last_name"]; ?>" readonly></div>
						</div>

						<div class="col-md-4">
									<div class="form-group">
										<label>Product Name</label>
										<textarea class="form-control" rows="8" id="comment"  placeholder="" readonly><?php echo $row["product_name"]; ?></textarea>
									</div>
								</div>

						<div class="col-md-4">
						<div class="form-group">
										<label>Product Quantity</label>
										<input class="form-control" type="number" name="product_quantity" value="<?php echo $row["product_quantity"]; ?>" readonly></div>
						</div>

						<div class="col-md-4">
						<div class="form-group">
										<label>Order Subtotal </label>
										<input class="form-control" type="text" name="product_quantity" value="RM <?php echo $row["order_subtotal"]; ?>" readonly></div>
						</div>

						<div class="col-md-4">
						<div class="form-group">
										<label>Payment Method</label>
										<input class="form-control" type="text" name="product_quantity" value="<?php echo $row["payment_type"]; ?>" readonly></div>
						</div>

						<div class="col-md-4">
						<div class="form-group">
										<label>Grandtotal</label>
										<input class="form-control" type="text" name="product_quantity" value="RM <?php echo $row["grandtotal"]; ?>" readonly></div>
						</div>

				<div class="col-md-4">
				<div class="form-group">
				<label>Status</label>
				<select class="form-control" id="sel3" name="status">
				<option value="Pending" <?php if($row['order_status']=="Pending")
														echo "selected";
  									                   ?> > Pending </option>
								<option value="Delivery Out" <?php
														if($row['order_status']=="Delivery Out")
														echo "selected";	//try your own
								                     ?> >Delivery Out</option>
				</select>
			</div>
		</div>
				</div>
				<input  type="submit" class="btn btn-primary buttonedit ml-2" name="save_product" value="Save">
				<a href="admin_all-order.php" class="btn btn-secondary">Back</a>
			</form>
			<?php
						}

						if(isset($_POST["save_product"]))
						{
							$status=$_POST["status"];
							$check=mysqli_query($connect,"UPDATE customer_order SET order_status='$status' WHERE order_id='$pid'");
						
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

<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>