<?php 
include("connection.php"); 
session_start(); 

$error="";
		if(isset($_POST["sendbtn"])){
			if(empty($_POST["useremail"]) || empty($_POST["userpass"])){
					$error="Useremail or Password is Empty";
			}
			else{
				$email=$_POST["useremail"];
				$pass=$_POST["userpass"];

				$email=mysqli_real_escape_string($connect,$email);
				$pass=mysqli_real_escape_string($connect,$pass);
				//escape special characters

				$mail=mysqli_query($connect,"SELECT * FROM customer WHERE customer_email='$email'");
				$result=mysqli_query($connect,"SELECT * FROM customer WHERE customer_email='$email' AND customer_password='$pass'");

				//$count=mysqli_num_rows($result);

				if(mysqli_num_rows($mail) != 1){
					$error="Please Register! You Email Has Not Register Yet!";
				}
				else if(mysqli_num_rows($result) == 0){
					$error="You Have Enter A Wrong Password. Please Try Again!";
				}
				else{
					$row=mysqli_fetch_assoc($result);
					$_SESSION["id"]=$row["customer_id"];
					header("location:index.php");
				}
			}
		}
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
					<li class="active">Login</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-account-->
	<div class="account">
		<div class="container"> 
			<div class="account-bottom">
				
				<div class="col-md-6 account-left">
					<form name="login" method="post" autocomplete="off">
					<div class="account-top heading">
						<h3>LOGIN</h3>
					</div>
					<div class="address">
						<span>Email Address*</span>
						<input type="text" style="border-radius:5px;" name="useremail">
					</div>
					<div class="address">
						<span>Password*</span>
						<input type="password" style="border-radius:5px;" name="userpass">
						</div>
						<span style="color:red;"><?php echo $error ?> </span>
					<div class="address">
						<div>
							<input type="submit" name="sendbtn" value="Login">
						</div>
						<div class="address">
						<a class="forgot" href="forget_password.php">Forgot Your Password?</a>
						</div>
					</div>
				</div>
				</form>
				<div class="col-md-6 account-left">
					<form style="border: 1px solid red; padding:10px;border-radius:5px;">
					<div class="account-top heading">
						<h3>CREATE AN ACCOUNT</h3>
					</div>
					<div class="address new">
						<p>Creating an account is easy. Enter your email address and fill in the form on the next page and enjoy the benefits of having an account. </p>
						<span>
							<p>Get our latest product recommendations for you.
							<br>	Personalise your experience on Mobile, tablet and desktop.
							<br>	Manage your orders and preferences.
							<br>	Access your saved items.
							<br>	Create and share gift lists. </p>
					</div>
					<div class="address new">
						<input type=button onClick="location.href='register.php'"value='REGISTER NOW' >
					</div>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-account-->
	<?php include("footer.php"); ?>
</body>
</html>

