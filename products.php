<?php include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Sparta Sports Apparel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
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
</head>
<body> 
	<?php include("header.php"); ?>
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container" style=" padding-bottom:5px;">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Products</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-product--> 
	<div class="product">
		<div class="container">
			<div class="product-main">
			<?php include("filter.php"); 
			 
			$getPid=mysqli_query($connect,"SELECT product_detail_id FROM product_detail");
			while($productID=mysqli_fetch_assoc($getPid)){
			foreach($productID as $productID);
			?>
			<script>console.log(<?php echo $productID ?>); </script>
			<?php
			
			$stockCheck=mysqli_query($connect,"SELECT product_stock FROM product 
												WHERE product.product_detail_id='$productID'");
			
			while($statusCheck=mysqli_fetch_assoc($stockCheck)){
				foreach($statusCheck as $statusCheck);
				?>
				<script>console.log(<?php echo $statusCheck; ?>); </script>
				<?php
				if(empty($statusCheck)){
					mysqli_query($connect,"UPDATE product_detail SET product_status=0 WHERE product_detail_id = '$productID'");
				}
			}
		}
			?>
			<div class="col-md-9 p-left">
				
					<?php 
						if(isset($_GET["pid"]) && isset($_GET["cat"])){
							$prodtype=$_GET["pid"];
							$category=$_GET["cat"];
							$getpt=mysqli_query($connect,"SELECT product_type_name FROM product_type WHERE product_type_id = '$prodtype'");
							$pt=mysqli_fetch_assoc($getpt);
							foreach($pt as $pt);
							echo "<h3 style='padding-left:20px;font-weight:bold;'> ".$category ."'s ".$pt." </h3>";
							$result=mysqli_query($connect,"SELECT * FROM product_detail WHERE product_type_id='$prodtype' AND product_category = '$category' AND product_status!=0 ORDER BY product_detail_id DESC");
							$i=0;
							$count=1;
							$num=mysqli_num_rows($result);
						}
						else if(isset($_GET["bid"]) && isset($_GET["cat"])){
							$prodbrand=$_GET["bid"];
							$category=$_GET["cat"];
							$getpb=mysqli_query($connect,"SELECT product_brand_name FROM product_brand WHERE product_brand_id = '$prodbrand'");
							$pb=mysqli_fetch_assoc($getpb);
							foreach($pb as $pb);
							echo "<h3 style='padding-left:20px;font-weight:bold;'> ".$pb." for ".$category."'s </h3>";
							$result=mysqli_query($connect,"SELECT * FROM product_detail WHERE product_brand_id='$prodbrand' AND product_category = '$category' AND product_status!=0 ORDER BY product_detail_id DESC");
							$i=0;
							$count=1;
							$num=mysqli_num_rows($result);
						}
						else if(isset($_GET["pid"])){
							$prodtype=$_GET["pid"];
							$getpt=mysqli_query($connect,"SELECT product_type_name FROM product_type WHERE product_type_id = '$prodtype'");
							$pt=mysqli_fetch_assoc($getpt);
							foreach($pt as $pt);
							echo "<h3 style='padding-left:20px;font-weight:bold;'> ".$pt." </h3>";
							$result=mysqli_query($connect,"SELECT * FROM product_detail WHERE product_type_id='$prodtype' AND product_status!=0 ORDER BY product_detail_id DESC");
							$i=0;
							$count=1;
							$num=mysqli_num_rows($result);
						}
						else if(isset($_GET["bid"])){
							$prodbrand=$_GET["bid"];
							$getpb=mysqli_query($connect,"SELECT product_brand_name FROM product_brand WHERE product_brand_id = '$prodbrand'");
							$pb=mysqli_fetch_assoc($getpb);
							foreach($pb as $pb);
							echo "<h3 style='padding-left:20px;font-weight:bold;'> ".$pb."</h3>";
							$result=mysqli_query($connect,"SELECT * FROM product_detail WHERE product_brand_id='$prodbrand' AND product_status!=0 ORDER BY product_detail_id DESC");
							$i=0;
							$count=1;
							$num=mysqli_num_rows($result);
						}
						else if(isset($_GET["sid"])){
							$prodsize=$_GET["sid"];
							$result=mysqli_query($connect,"SELECT DISTINCT product.product_detail_id, product_detail.product_name, product_detail.product_image, product_detail.product_price FROM product JOIN product_detail ON product_detail.product_detail_id = product.product_detail_id WHERE product.product_size_id='$prodsize' AND product_status!=0 ORDER BY product.product_detail_id DESC");
							$i=0;
							$count=1;
							$num=mysqli_num_rows($result);
						}
						else if(isset($_GET["cid"])){
							$prodcolour=$_GET["cid"];
							$result=mysqli_query($connect,"SELECT DISTINCT product.product_detail_id, product_detail.product_name, product_detail.product_image, product_detail.product_price FROM product_detail JOIN product ON product_detail.product_detail_id = product.product_detail_id WHERE product.product_color_id='$prodcolour' AND product_status!=0 ORDER BY product.product_detail_id DESC");
							$i=0;
							$count=1;
							$num=mysqli_num_rows($result);
						}
						else if(isset($_GET["cat"])){
							$category=$_GET["cat"];
							echo "<h3 style='padding-left:20px;font-weight:bold;'> ".$category."'s </h3>";
							$result=mysqli_query($connect,"SELECT * FROM product_detail WHERE product_category = '$category' AND product_status!=0 ORDER BY product_detail_id DESC");
							$i=0;
							$count=1;
							$num=mysqli_num_rows($result);
						}
						else{
							echo "<h3 style='padding-left:20px;font-weight:bold;'> All products </h3>";
							$result=mysqli_query($connect,"SELECT * FROM product_detail WHERE product_status!=0 ORDER BY product_detail_id DESC");
							$i=0;
							$count=0;
							$num=mysqli_num_rows($result);
						}
					?>
			   
			<?php
			
			
				while($row=mysqli_fetch_assoc($result))
				{  
					if($i==0){
						
						?>
						<div class="product-one">
										<div class="col-md-4 product-left single-left" > 
											<div class="p-one simpleCart_shelfItem">
												<a href="single.php?view&id=<?php echo $row['product_detail_id']; ?>">
												<?php
																echo '<img src="images/'.$row['product_image'].'" >';
																?>
																<div class="mask mask1">
																	<span>Quick View</span>
																</div>
															</a>
												
														<h4><?php echo $row["product_name"]; ?></h4>
														<p><a class="item_add" href="single.php?view&id=<?php echo $row['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $row["product_price"]; ?></span></a></p>
											</div>
										</div>
										<p> </p>
						<?php
						$count++;
						$i++;
					}
					else if($i==2){
							
						?>
														<div class="col-md-4 product-left single-left" > 
																<div class="p-one simpleCart_shelfItem">
																	<a href="single.php?view&id=<?php echo $row['product_detail_id']; ?>">
																	<?php
																					echo '<img src="images/'.$row['product_image'].'" >';
																					?>
																					<div class="mask mask1">
																						<span>Quick View</span>
																					</div>
																				</a>
																	
																			<h4><?php echo $row["product_name"]; ?></h4>
																			<p><a class="item_add" href="single.php?view&id=<?php echo $row['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $row["product_price"]; ?></span></a></p>
																</div>
															</div>
															<p> </p>
															<div class="clearfix"> </div>
															</div>
											<?php
											$count++;
											$i=0;
										}else if($count == $num && $i!=0 && $i!=2){
											?>
											<p> </p>
												<div class="clearfix"> </div>
										
											<?php
											
											$i++;
										}
										else{
											
											?>
											<div class="col-md-4 product-left single-left" > 
																<div class="p-one simpleCart_shelfItem">
																	<a href="single.php?view&id=<?php echo $row['product_detail_id']; ?>">
																	<?php
																					echo '<img src="images/'.$row['product_image'].'" >';
																					?>
																					<div class="mask mask1">
																						<span>Quick View</span>
																					</div>
																				</a>
																	
																			<h4><?php echo $row["product_name"]; ?></h4>
																			<p><a class="item_add" href="single.php?view&id=<?php echo $row['product_detail_id']; ?>"><i></i> <span class=" item_price">RM <?php echo $row["product_price"]; ?></span></a></p>
																</div>
															</div>
															<p> </p>
											<?php
											$count++;
											$i++;
										}
									?>
	
			<?php
			
				 }
				?>
				<div class="clearfix"> </div>
			</div>

			
				</div>
			</div>
		</div>
	</div>
	<!--end-product-->
	<?php include("footer.php"); ?>
</body>
</html>