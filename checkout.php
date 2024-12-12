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
			<?php
				if (isset($_GET['delete'])) 
				{
					$pid=$_GET['id'];
					$lol=mysqli_query($connect,"DELETE from cart WHERE cart_id='$pid'");
					if($lol)
					{
						header("location:checkout.php");
					}
				}
			?>
<title>Checkout Page</title>
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

		.round{ border-radius: 1em;}

		.gfg {
        background-color: white;
        border: 2px solid black;
        color: black;
        padding: 2px 3px;
        text-align: center;
        display: inline-block;
        font-size: 15px;
        margin: 10px 30px;
        cursor: pointer;
		text-decoration:none;
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
					<li class="active">Cart</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<script type="text/javascript">
		function confirmation()
	{
		var choice;
		choice=confirm("Do you want to delete product from cart?");
		return choice;
	}
	</script>

	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeckout-top">
			<div class=" cart-items heading">
			 <h3>My Shopping Bag</h3>
				
				
			<form method="post" >
				<table>
					
					<tr class="word" style="color:white; background-color:black;">
						<th style="padding:25px; text-align:center; width:100px;">Product</th>
						<th style="padding:25px; text-align:center; width:12000px;">Product Name</th>
						<th style="padding:25px; text-align:center; width:20px;">Product Quantity</th>
						<th style="padding:25px; text-align:center; width:8000px;">Product Price</th>
						<th style="padding:25px; text-align:center; width:8000px;">Product Subtotal</th>
						<th style="padding:25px; text-align:center; width:20px;">Action</th>
					</tr>
					
					<?php
					
					$grand=0;
					$lol=$_SESSION["id"];
					$result = mysqli_query($connect, "SELECT * FROM cart 
					JOIN customer ON cart.customer_id = customer.customer_id 
					JOIN product ON cart.product_id = product.product_id 
					JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id 
					JOIN product_color ON product_color.product_color_id = product.product_color_id 
					JOIN product_size ON product_size.product_size_id = product.product_size_id WHERE cart.customer_id='$lol' AND cart.payment_status=0");
					
					$nop=mysqli_num_rows($result);
					while($row = mysqli_fetch_assoc($result))
					{
						$subtotal= $row['product_price'] * $row['product_quantity'] ;
					?>	
					<tr  class="word">
						<td style="padding:25px; text-align:center;"><?php echo '<img src="images/'.$row['product_image'].'" height="250px" width="220px">';?></td>
						<td style="padding:25px; text-align:center;"><?php echo $row['product_name']; ?><span style="font-size:14px; color:grey;"><br>Variation: (<?php echo $row['product_color']; ?>,<?php echo $row['product_size']; ?>)</span></td>
						<td style="padding:25px; text-align:center;"><input type="number" name="qty" id="qty"  min="1" max="<?php echo $row['product_stock'] ?>" value="<?php echo $row['product_quantity']; ?>" style="width:80%;" onchange="calsubtotal(<?php echo $row['product_price'] ?>,<?php echo $row['cart_id'] ?>,this.value),caltotal()" ></td>
						<td style="padding:25px; text-align:center;">RM <?php echo $row['product_price']; ?></td>
						<td style="padding:25px; text-align:center;">RM <span id="subtotal-<?php echo $row['cart_id'] ?>"> <?php echo number_format("$subtotal",2); ?></span></td>
						<td style="padding:25px; text-align:center;"><a class="gfg" href="checkout.php?delete&id=<?php echo $row['cart_id']; ?>" onclick="return confirmation()">DELETE</a></td>
					</tr>
					<?php
					$grand+=$subtotal;
					}
					?>
					<tr class="word" style="color:white; background-color:black;">
					<th style="padding:25px; text-align:center; width:250px;" colspan="5">Grandtotal</th>
					<th style="padding:25px; text-align:center;" name="grandtotal"> RM <span id="total"><?php echo number_format("$grand",2); ?></span></th>
					</tr>
				</table>
				<input  type="submit" class="word" style="margin-top:50px; width:90px; height:28px; margin-left:1010px; border-radius:5px;" name="pay" value="Pay Now">
			</form>
		<?php
		if(isset($_POST["pay"]))
		{
			if($nop==0){
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script>swal({title:"Your Cart is Empty!",
				icon:"error",
				button:"Shop Now!"}	).then(function(){window.location.href="products.php";}); 
				</script>
				<?php
			}else{
			?>
			<script>
				window.location.href="order_summary.php"
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
	<!--end-ckeckout-->
	<?php include("footer.php"); ?>
</body>
</html>

<script>
function calsubtotal(product_price,cart_id,qty){
	var cid = cart_id;
	var price = product_price;
	var quantity = qty;
	console.log(cid);

	$.ajax({
		type:'post',
		url:'subtotal_onchange.php',
		data: {
			cart_id:cid,
			product_price:price,
			qty:quantity
		},
		success:function(data){
			document.getElementById('subtotal-'+cid).innerHTML= data;
			console.log(data);
			
		}
	})
}

function caltotal(){
	$("#total").fadeOut();
	$.ajax({
		type:'post',
		url:'grandtotal_onchange.php',
		success:function(data){
			
			$("#total").fadeIn();
			document.getElementById('total').innerHTML= data;
			console.log(data);
			
		}
	})
}


</script>