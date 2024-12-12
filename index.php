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
<style>
.fa {
  padding: 10px;
  font-size: 20px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-instagram {
  background: #125688;
  color: white;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}
</style>	

</head>
<body> 
	<?php include("header.php"); ?>
	<!--banner-starts-->
	<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<div class="banner-1"></div>
				</li>
				<li>
					<div class="banner-2"></div>
				</li>
				<li>
					<div class="banner-3"></div>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--Slider-Starts-Here-->
				<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
	<!--start-banner-bottom--> 
	<div class="banner-bottom">
		<div class="container">
			<div class="banner-bottom-top">
				<div class="col-md-6 banner-bottom-left">
					<div class="bnr-one">
						<div class="bnr-left">
							<h1><a href="products.php">Our Top Picks!</a></h1>
							<p>TWO WXY isn’t just a catchy name, it’s been specifically designed to deliver a powerful blend of bounce and speed on both sides of the ball</p>
							<div class="b-btn"> 
								<a href="products.php">SHOP NOW</a>
							</div>
						</div>
						<div class="bnr-right"> 
							<a href="products.php"><img src="images/Adidas-OTR_WINDBREAKER-women-pink(1).jpg" alt="" style="width:200px; height:180px;" /></a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-6 banner-bottom-right">
					<div class="bnr-two">
						<div class="bnr-left">
							<h2><a href="products.php">Popular Right Now</a></h2>
							<p>Discover a wide range of sports gear available in various colours, sizes. and prices. Click "Shop Now" to browse more latest fashion sport apparels!</p>
							<div class="b-btn"> 
								<a href="products.php" >SHOP NOW</a>
								
							</div>
						</div>
						<div class="bnr-right"> 
							<a href="products.php"><img src="images/Nike-lebron-lakers-icon-edition-2020-nba-swingman-jersey-men-1(yellow).jfif" alt="" style="width:200px; height:180px;"/></a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-banner-bottom--> 
	<!--start-shoes--> 
	
	<!--end-shoes-->
	<!--start-abt-shoe-->
	<div class="abt-shoe">
		<div class="container" > 
			<div class="abt-shoe-main">
				<div class="col-md-4 abt-shoe-left">
					<div class="abt-one">
						<img src="images/banner-2.jpg" alt="" />
						<h4 style="padding-top:5px;"> Impossible is Nothing</h4>
						<p style="padding-bottom:20px;">"Impossible is just a BIG WORD thrown around by small men who find it easier to live in the world they've been given than to explore the power they have to change it."</p>
					</div>
				</div>
				<div class="col-md-4 abt-shoe-left">
					<div class="abt-one">
						<img src="images/banner-5.jpg" alt="" />
						<h4>JUST DO IT</h4>
						<p>Success isn't GIVEN. It's earned. On the track, on the field, in the gym. With blood, sweat, and the occasional tear. </p>
					</div>
				</div>
				<div class="col-md-4 abt-shoe-left">
					<div class="abt-one">
						<img src="images/banner-4.jpg" alt="" />
						<h4>Never Give up</h4>
						<p style="padding-bottom:5px;">“Train hard, turn up, run your best and the rest will take care of itself.” <br>-Usain Bolt.</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-abt-shoe-->
		<!--start-footer-->
	<div class="footer" style="padding-bottom:5px;">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-3 footer-left">
					<h3>ABOUT US</h3>
					<ul>
						<li><a href="contact.php">Contact Us</a></li>		
						<a href="https://www.instagram.com/chian_seong04/" class="fa fa-instagram"></a>
						<a href="https://www.facebook.com/wchianseong" class="fa fa-facebook"></a>
					</ul>
				</div>
				<div class="col-md-3 footer-left">
					<h3>YOUR ACCOUNT</h3>
					<ul>
						<li><a href="profile.php">Your Account</a></li>
						<li><a href="purchasehistory.php">My Order</a></li>	
						<li><a href="checkout.php">My Shopping Cart</a></li>				 					 
					</ul>
				</div>
				<div class="col-md-3 footer-left">
					<h3>CATEGORIES</h3>
					<ul>
					<?php
						$result = mysqli_query($connect, "SELECT * from product_type");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php"><?php echo $row['product_type_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-footer-->
	<!--end-footer-text-->
	
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	
	<!--end-footer-text-->	
</body>
</html>