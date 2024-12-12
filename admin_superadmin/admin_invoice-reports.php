<!DOCTYPE html>
<html>

<head>
	<title>Invoice Report</title>

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
			
			<a href="admin_login.php" class="logout" >Log Out</a>
			
			
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
<li><a href="admin_add-order.php"> Add Orders </a></li>
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

<li class="submenu" style="background-color:rgb(255, 106, 89);">
<a href="#"><i class="far fa-money-bill-alt"></i> <span> Product Sales </span> <span class="menu-arrow"></span></a>
<ul class="submenu_class" style="display: none;">
<li><a href="admin_invoice-reports.php">Sales Report </a></li>
</ul>
</li>

<li class="submenu" >
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
<div class="mt-5">
<h4 class="card-title float-left mt-2">Invoice Report</h4>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<form>
<div class="row formtype">
<div class="col-md-3">
<div class="form-group">
<label>Customer</label>
<select class="form-control" id="sel1" name="sellist1">
<option>Select Customer</option>
<option>Jackson Wong</option>
<option>Lim Ming Sheng</option>
<option>Law Jennie</option>
<option>Justin Sam</option>
<option>Lai Chong Hong</option>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>From</label>
<input type="date" class="form-control">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>To</label>

<input type="date" class="form-control">

</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>Search</label>
<a href="#" class="btn btn-success btn-block mt-0 search_button"> Search </a>

</div>
</div>
</div>
</form>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped table table-hover table-center mb-0">
<thead>
<tr>
<th>Booking ID</th>
<th>Name</th>
<th>Room Type</th>
<th>Total Numbers</th>
<th>Check-in Date</th>
<th>Check-out Date</th>
<th>Check-in Time</th>
<th>Email</th>
<th>Phone Num</th>
<th>Total Amount</th>
<th>Print Receipt</th>
</tr>
</thead>
<tbody>
<tr>
<td>BKG-1001</td>
<td>Jackson Wong</td>
<td>Superior Room</td>
<td style="text-align:center;">2</td>
<td>17 Sept 2021</td>
<td>18 Sept 2021</td>
<td>3.00pm</td>
<td>jackson@gmail.com</td>
<td>016-7451224</td>
<td style="text-align:center;">$500</td>
<td><a href="receipt1.pdf" target="_blank"><button>print</button></a></td>
</tr>
</tbody>
</table>
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