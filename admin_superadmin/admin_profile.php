<!DOCTYPE html>
<html>

<head>
	<title>Admin Profile</title>
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
<a href="#"><i class="fas fa-key"></i> <span> Product Type</span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_all-product-type.php">All Product Type</a></li>
<li><a href="admin_add-product-type.php">Add Product Type</a></li>
<li><a href="admin_edit-product-type.php">Edit Product Type</a></li>
</ul>
</li>
<li class="submenu" >
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
<li class="submenu" style="background-color:rgb(255, 106, 89);">
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
				<div class="page-header mt-5">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Profile</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="admin_index.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Profile</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="profile-header">
							<div class="row align-items-center">
								<div class="col-auto profile-image">
									<a href="#"> <img class="rounded-circle" alt="User Image" src="assets/img/seong.jpeg" width="100px" height="100px"> </a>
								</div>
			<?php
					$pid=$_SESSION['id'];		
				$result =mysqli_query($connect,"SELECT * FROM admin WHERE admin_id='$pid' ");
							
				while($row = mysqli_fetch_assoc($result))
				{
			?>
								<div class="col ml-md-n2 profile-user-info">
									<h4 class="user-name mb-3"><?php echo $row["admin_name"]; ?></h4>
									<h6 class="text-muted mt-1"><?php echo $row["admin_id"]; ?></h6>
									<div class="user-Location mt-1"><i class="fas fa-map-marker-alt"></i> <?php echo $row["admin_address"]; ?></div>
								</div>
				
								<div class="col-auto profile-btn">
								</a> <a href="admin_edit-profile.php?edit&id=<?php echo $row['admin_id']; ?>" class="btn btn-primary">
								Edit
								</a> </div>
							</div>
						</div>
						<br>
						<div class="profile-menu">
							<ul class="nav nav-tabs nav-tabs-solid">
								<li class="nav-item"> <a class="nav-link active" data-toggle="tab">About</a> </li>
							</ul>
						</div>
						<div class="tab-content profile-tab-cont">
							<div class="tab-pane fade show active" id="per_details_tab">
								<div class="row">
									<div class="col-lg-6">

										<div class="card">

											<div class="card-body">

												<h5 class="card-title d-flex justify-content-between">
													<span>Personal Details</span>
													<a class="edit-link" data-toggle="modal" href="admin_edit-profile.php?edit&id=<?php echo $row['admin_id']; ?>"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>

												<div class="row mt-5">
													<p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Name</p>
													<p class="col-sm-9"><?php echo $row["admin_name"]; ?></p>
												</div>

												<div class="row">
													<p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Position</p>
													<p class="col-sm-9"><?php echo $row["admin_position"]; ?></p>
												</div>

												<div class="row">
													<p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
													<p class="col-sm-9"><?php echo $row["admin_email"]; ?></p>
												</div>

												<div class="row">
													<p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Mobile</p>
													<p class="col-sm-9"><?php echo $row["admin_phone"]; ?></p>
												</div>

												<div class="row">
													<p class="col-sm-3 text-sm-right mb-0">Address</p>
													<p class="col-sm-9 mb-0"><?php echo $row["admin_address"]; ?></p>
												</div>
											</div>
										</div>
	
													</div>
												</div>
											</div>
										</div>
								
				<?php
				}
				?>						
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						</div>
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