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
					<li class="active">RESET PASSWORD</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->

	<!-- function when press reset password btn-->
	<?php 
	$error="";
if(isset($_POST["resetbtn"])){

	$newpass=$_POST["userpass"];
	$conpass=$_POST["userconpass"];
	$email=$_SESSION["email"];

	if($newpass != $conpass)
	{
			$error="Password is not matching.";
	}
	else
	{
	$result=mysqli_query($connect,"UPDATE customer SET customer_password='$newpass'
													WHERE customer_email='$email'; ");

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Password Changed!",
				icon:"success",
				text:"You Have Change Your Password Successfully",
				button:"Back To Login"}	).then(function(){window.location.href="login.php";}); </script>

<?php
	}
}

?>
	<!--start-account-->
	<div class="account">
		<div class="container"> 
			<div class="account-bottom">
				
				<div class="col-md-6 account-left">
					<form name="resetpass" method="post">
					<div class="account-top heading">
						<h3>RESET PASSWORD</h3>
					</div>
					
					<div class="address">
						<span>Password*</span>
						<input type="password" style="border-radius:5px;" name="userpass" required>
						<p style="color:red;">**Password should consist of a mixture of numbers and both uppercase and lowercase letters with at least 8 characters </p>
					</div>
					<div class="address">
						<span>Confirm Password*</span>
						<input type="password" style="border-radius:5px;" name="userconpass" required>
						<span style="color:red;"><?php echo $error; ?></span>
						</div>

					<div class="address">
						<div>
							<input type="submit" name="resetbtn" value="Reset Password">
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

