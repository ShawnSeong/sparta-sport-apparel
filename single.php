<?php include("connection.php");
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Product Details Page</title>
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
	
		
<style>
		.word{font-family: "Times New Roman";
			font-size:22px;}
			
			ul.size li input[type="radio"]{
				opacity:0;
				position:absolute;
				width:30px;
				height:30px;
			}

			ul.size li .icon{
				color: #555;
				font-size: 0.8125em;
				background: #f0f0f0;
				padding: 5px 10px;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			ul.size li input[type="radio"]:checked ~ .icon{
				background-color:pink;
			}

			ul.product-colors li input[type="radio"]{
				opacity:0;
				position:absolute;
				width:50px;
				height:20px;
			}

			ul.product-colors li .icon{
				color: #555;
				font-size: 0.8125em;
				background: #f0f0f0;
				padding: 5px 10px;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			ul.product-colors li input[type="radio"]:checked ~ .icon{
				background-color:red;
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
					<li><a href="products.php">Product</a></li>
					<li class="active">Product Details</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<?php
		if(isset($_GET["view"]))
		{
			$pid =$_GET['id'];
			$result = mysqli_query($connect, "SELECT product_image,  product_image2, product_image3, product_image4, product_name, product_description, product_price, product_stock, product_color FROM product
											LEFT JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id
											LEFT JOIN product_color ON product.product_color_id=product_color.product_color_id
											 WHERE product.product_detail_id='$pid'");
			$row = mysqli_fetch_assoc($result);
		
	?>
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<?php
								echo '<li data-thumb="images/'.$row['product_image'].'">';
								
									echo '<img src="images/'.$row['product_image'].'" >';
								?>
								</li>
								
								<?php
								echo '<li data-thumb="images/'.$row['product_image2'].'">';
								
									echo '<img src="images/'.$row['product_image2'].'" >';
								?>
								</li>
								<?php
								echo '<li data-thumb="images/'.$row['product_image3'].'">';
								
									echo '<img src="images/'.$row['product_image3'].'" >';
								?>
								</li>
								<?php
								echo '<li data-thumb="images/'.$row['product_image4'].'">';
								
									echo '<img src="images/'.$row['product_image4'].'" >';
								?>
								</li>
							</ul>
						</div>
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
				</div>	
				<form method="post">
				<div class="col-md-7 single-top-right">
					<div class="details-left-info simpleCart_shelfItem">
					
						<h3>Product Details</h3>
						<h2 class="word" name="name"><?php echo $row['product_name']; ?></h2>
						<h2 class="word" name="price">RM <?php echo $row['product_price']; ?></h2>
						<h2 class="quick">Product Overview:</h2>
						<p class="quick_desc" name="des"><?php echo $row['product_description']; ?></p>
						<ul class="product-colors">
							<h3>available Colors </h3>
							<?php 
							$sqlcolor=mysqli_query($connect,"SELECT DISTINCT product_color, product.product_color_id FROM product 
																LEFT JOIN product_color ON product.product_color_id = product_color.product_color_id
																WHERE product.product_detail_id='$pid' AND product_stock != 0");

								?>
								<select name="color" id="color" onchange="Fetchcolor(<?php echo $pid ?>,this.value)"> 
								<option value=""> Select A Color </option>
								<?php
							while($color=mysqli_fetch_assoc($sqlcolor)){
												
								echo '<option value='.$color['product_color_id'].'>'.$color['product_color'].'</option>';
									
							}
							?>
							</select>
							<div class="clear"> </div>
						</ul>
						<ul class="size">
							<h3>Size</h3>
								<select name="size" id="size" onchange="getStock(<?php echo $pid ?>)"> 
								<option value=""> Select A Size </option>
							</select>
									
						</ul>
						<div class="quantity_box">
							<ul class="product-qty">
								<span>Quantity:</span>
								<input type="number" id="stock"  min="1" value="1" name="qty" style="width:10%;">
							</ul>
						</div>
					<div class="clearfix"> </div>
				<div class="single-but item_add">
					<input type="submit" value="Add to cart" name="add"/>
				</div>
			</div>
		</div>
						</form>
		<div class="clearfix"></div>
	</div>
	<?php
		}
		if(isset($_POST["add"]))
		{
			$cusid=$_SESSION["id"];
			$pprice=$row['product_price'];
			$pcolor=$_POST["color"];
			$psize=$_POST["size"];
			$pqty=$_POST["qty"];
			$pstatus=0;
			$subtotal=$pprice*$pqty;
			
			if(empty($cusid)){
				?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script>swal({title:"Please Login First!",
				text:"You are unable to proceed as a guest",
				icon:"error",
				button:"Ok"}	).then(function(){window.location.href="login.php";}); 
				</script>
				<?php
			}else if(empty($pcolor) || empty($psize) ){
				?> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script>swal({title:"Please Select a Color and Size!",
				icon:"error",
				button:"Ok"}	).then(function(){window.location.href="single.php?view&id=<?php echo $pid ?>";}); 
				</script>
				<?php
			}else{

			$proid=mysqli_query($connect, "SELECT  product_id FROM product 
											WHERE product_detail_id='$pid' AND product_color_id = '$pcolor' AND product_size_id='$psize'");
			
			


			$pdid=mysqli_fetch_assoc($proid);
			foreach($pdid as $ppdid){
			}

			$checkid=mysqli_query($connect,"SELECT * FROM cart WHERE product_id = '$ppdid' AND payment_status = 0");

			if(mysqli_num_rows($checkid)==0){

			$cart=mysqli_query($connect,"INSERT INTO cart(cart_subtotal, product_quantity, customer_id, product_id, payment_status) 
											VALUES ('$subtotal', '$pqty', '$cusid', '$ppdid', '$pstatus') ");
			
			}else{
				$cart=mysqli_query($connect,"UPDATE cart SET product_quantity = product_quantity + '$pqty', cart_subtotal = cart_subtotal + '$subtotal' WHERE payment_status=0");
			}
			?>
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script>
				function productpage()
				{window.location.href="products.php"; }
				function cartpage(){
					window.location.href="checkout.php";
				}


				swal({
							title:"Add To Cart Successfully!",
							icon:"success",
							buttons: {
								View_My_Cart: {
								value: "cart"
								},
								Continue_Shopping: {value: "product"},
							},
							})
							.then((value) => {
							switch (value) {
							
								case "product":
									 productpage();
								break;
							
								case "cart":
									 cartpage();	
								break;
							
								default:
								cartpage();							}
							});
				</script>
			<?php
				} //end of add to cart
		} //end of post
	?>
	<h4 class="inxtitle"> YOU MAY ALSO LIKE  </h4>
					<?php
						$randpd=mysqli_query($connect,"SELECT * FROM product_detail ORDER BY RAND() LIMIT 6");
						$count=0;

						while($randompd=mysqli_fetch_assoc($randpd)){
							if($count == 0){
								?>
								<div class="latest products">
						<div class="product-one">
							<div class="col-md-4 product-left single-left"> 
								<div class="p-one simpleCart_shelfItem">
									
									<a href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>">
									<?php
																echo '<img src="images/'.$randompd['product_image'].'" >';
																?>
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
									<h4><?php echo $randompd["product_name"]; ?></h4>
									<p><a class="item_add" href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $randompd["product_price"]; ?></span></a></p>
									
								</div>
							</div>

							<?php
							$count++;
							}else if($count == 2){
								?>
								<div class="col-md-4 product-left single-left"> 
								<div class="p-one simpleCart_shelfItem">
									
									<a href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>">
									<?php
																echo '<img src="images/'.$randompd['product_image'].'" >';
																?>
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
									<h4><?php echo $randompd["product_name"]; ?></h4>
									<p><a class="item_add" href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $randompd["product_price"]; ?></span></a></p>									
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>

						<?php
						$count++;
							}else if($count == 3){
								?>
								<div class="product-one">
								<div class="col-md-4 product-left single-left"> 
								<div class="p-one simpleCart_shelfItem">
									
									<a href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>">
									<?php
																echo '<img src="images/'.$randompd['product_image'].'" >';
																?>
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
									<h4><?php echo $randompd["product_name"]; ?></h4>
									<p><a class="item_add" href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $randompd["product_price"]; ?></span></a></p>									
								</div>
							</div>

							<?php
							$count++;
							}else if($count == 5){
								?>
								<div class="col-md-4 product-left single-left"> 
								<div class="p-one simpleCart_shelfItem">
									
									<a href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>">
									<?php
																echo '<img src="images/'.$randompd['product_image'].'" >';
																?>
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
									<h4><?php echo $randompd["product_name"]; ?></h4>
									<p><a class="item_add" href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $randompd["product_price"]; ?></span></a></p>				
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<?php
					$count++;
						}else{
							?>
							<div class="col-md-4 product-left single-left"> 
								<div class="p-one simpleCart_shelfItem">
									
									<a href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>">
									<?php
																echo '<img src="images/'.$randompd['product_image'].'" >';
																?>
								<div class="mask mask1">
									<span>Quick View</span>
								</div>
							</a>
									<h4><?php echo $randompd["product_name"]; ?></h4>
									<p><a class="item_add" href="single.php?view&id=<?php echo $randompd['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $randompd["product_price"]; ?></span></a></p>									
								</div>
							</div>

							<?php
							$count++;
						}

						}// end of while
					?>
				
				
				
			</div>
		</div>
	</div>
	<!--end-single-->
	<?php include("footer.php"); ?>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

function Fetchcolor(pid, dcolor){
	$('#size').html('');
	var dataToSend= "pid="+pid+"&dcolor="+dcolor;
	$.ajax({
		type:'post',
		url:'size_onchange.php',
		data: dataToSend,
		success:function(data){
			$('#size').html(data);
		}
	});
}

function getStock(pid){
	var color=document.getElementById('color').value;
	var size= document.getElementById('size').value;
	var productID= <?php echo $pid ?>;
	console.log(color);
	console.log(size);

	$.ajax({
		type:'post',
		url:'stock_onchange.php',
		data: {
			product_color_id:color,
			product_size_id:size,
			product_id:productID	
		},
		success:function(data){
		document.getElementById("stock").max=data;
		document.getElementById("stock").value=1;
			console.log(data);
			
		}
	})
}


</script>