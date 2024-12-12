<!DOCTYPE html>
<html lang="en">
<?php
		session_start();
		include("session_connect.php");
?>							
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Forgot Password</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="assets/img/admin_logo.png" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Forgot Password?</h1>
							<p class="account-subtitle">Enter your email to get a password reset link</p>

							<form method="post" autocomplete="off">


								<div class="form-group">
									<input class="form-control" type="text" placeholder="Email" name="email"> </div>
								<div class="form-group mb-0">


									<button class="btn btn-primary btn-block" type="submit" name="sendbtn">Reset Password</button>
								</div>
							</form>

							<?php

if(isset($_POST["sendbtn"])){



$email=$_POST["email"];

$_SESSION["email"]="$email";

$result=mysqli_query($connect,"SELECT * FROM admin WHERE admin_email='$email'");


if(mysqli_num_rows($result) != 0){
	
	$subject = "Admin Reset Password";
	$message = "You can reset your password by clicking on the link below \n\n http://localhost/Sparta-Sport-Apparel/admin_reset_password.php";
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
				text:"Your Email Does Not Exists!",
				icon:"error",
				button:"OK"}).then(function(){window.location.href="admin_login.php";}); </script>
	<?php
}
}
?>


							<div class="text-center dont-have">Remember your password? <a href="admin_login.php">Login</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>