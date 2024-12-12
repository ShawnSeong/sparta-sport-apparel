<?php include("connection.php");
session_start();
if(!isset($_SESSION["id"]))
{
	?>
	<script>
		alert("Please log in ");
	</script>
	
	<?php
	header("refresh:0.2; url=login.php");
	exit();
}
 ?>
<!DOCTYPE html>
<html>
<head>
<title>My Purchase History</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Free Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>	
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>			
	<style>
		.word{font-family: "Times New Roman";}
		.button {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 1px 1px;
  cursor: pointer;
}

	</style>
</head>
<body> 
	<?php include("header.php"); ?>
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container" style="padding-bottom:5px;">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active word">Purchase History</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout" >
		<div class="container" style="margin-right:150px; margin:left:100px;">
			<div class="ckeckout-top">
			<div class=" cart-items heading">
			 <h3 class="word">My Purchase History</h3>
				
				
			<form method="post" >
				<table style="width:1250px;">
					
					<tr class="word" style="color:white; width:50000px; background-color:black;">
						<th style="padding:25px; text-align:center; width:100px;">Product</th>
						<th style="padding:25px; text-align:center; width:800px;">Product Name</th>
						<th style="padding:25px; text-align:center; width:200px;">Product Quantity</th>
						<th style="padding:25px; text-align:center; width:900px;">Product Price</th>
						<th style="padding:25px; text-align:center; width:900px;">Product Subtotal</th>
						<th style="padding:25px; text-align:center; width:800px;">Product Status</th>
						<th style="padding:25px; text-align:center; width:1200px;">Order Date</th>
						<th style="padding:25px; text-align:center; width:100px;">Action</th>
					</tr>
					
					<?php
					
					$lol=$_SESSION["id"];
					$result = mysqli_query($connect, "SELECT * FROM cart 
					JOIN customer ON cart.customer_id = customer.customer_id 
					JOIN product ON cart.product_id = product.product_id 
					JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id 
					JOIN product_color ON product_color.product_color_id = product.product_color_id 
					JOIN customer_order ON customer_order.order_id = cart.payment_status
					JOIN product_size ON product_size.product_size_id = product.product_size_id WHERE cart.customer_id='$lol' AND cart.payment_status!=0 ");
					while($row = mysqli_fetch_assoc($result))
					{
					?>	
					<tr  class="word">
						<td style="padding:25px; text-align:center; "><?php echo '<img src="images/'.$row['product_image'].'" width="180px" height="210px">';	?></td>
						<td style="padding:25px; text-align:center; "><?php echo $row['product_name']; ?></td>
						<td style="padding:25px; text-align:center; "><?php echo $row['product_quantity']; ?></td>
						<td style="padding:25px; text-align:center; ">RM <?php echo $row['product_price']; ?></td>
						<td style="padding:25px; text-align:center;">RM <?php echo $row['cart_subtotal']; ?></td>
						<td style="padding:25px; text-align:center; "><?php echo $row['order_status']; ?></td>
						<td style="padding:25px; text-align:center; "><?php echo $row['order_date']; ?></td>
						<td style="padding:25px; text-align:center; "><a href="single.php?view&id=<?php echo $row['product_detail_id']; ?>" class="button">Purchase Again</a></td>
					</tr>
					<?php
					}
					?>
				</table>
				
			</form>
			<?php
				
			?>
		</div>
	
				</div>
				</div>
				</div>
	<!--end-ckeckout-->
	<?php include("footer.php"); ?>
</body>
</html>