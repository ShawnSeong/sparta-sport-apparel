<?php 
include("connection.php"); 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Sparta Sport Apparel</title>
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
<?php include("header.php"); ?>
<!--start-breadcrumbs-->
<div class="breadcrumbs">
		<div class="container" style="padding-bottom:5px;">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Forget Password</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-account-->
	<div class="account" >
		<div class="container" > 
			<div class="account-bottom" >
				
				<div class="col-md-6 account-left" ">
					<form name="forgetpass" method="post">
					<div class="account-top heading">
						<h3>FORGET PASSWORD</h3>
					</div>
					<div class="address">
						<input type="text" style="border-radius:5px;" name="useremail" placeholder="Enter your Email Address To Reset Password" required>
					</div>
					
					<div class="address">
						<div>
							<input type="submit" name="sendbtn" value="Reset Password">
						</div>
					
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!--end-account-->
	<?php include("footer.php"); ?>
</body>
</html>

<?php

if(isset($_POST["sendbtn"])){



$email=$_POST["useremail"];

$_SESSION["email"]="$email";

$result=mysqli_query($connect,"SELECT * FROM customer WHERE customer_email='$email'");


if(mysqli_num_rows($result) != 0){
	
	$subject = "Reset Password";
	$message = "You can reset your password by clicking on the link below \n\n http://localhost/Sparta-Sport-Apparel/reset_password.php";
	$sender = "From: Sparta Sport Apparel <spartasportapparelfyp@gmail.com>";

	mail($email,$subject,$message,$sender);

	?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Email Sent!",
				icon:"success",
				text:"You may now check your email to reset password"}	); </script>
	<?php
}
else{
	?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Please Register",
				text:"Your Email Has Not Been Register Yet!",
				icon:"error",
				button:"Register"}).then(function(){window.location.href="register.php";}); </script>
	<?php
}
}
?>