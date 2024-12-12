<!DOCTYPE html>
<html lang="en">
<?php
		session_start();
		include("session_connect.php");
?>							
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Reset Password</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css"> </head>
    <?php 
	$error="";
if(isset($_POST["resetbtn"]))
{

	$newpass=$_POST["password"];
	$conpass=$_POST["con_password"];
	$email=$_SESSION["email"];

	if($newpass != $conpass)
	{
			$error="Password is not matching.";
	}
	else
	{
	$result=mysqli_query($connect,"UPDATE admin SET admin_password='$newpass'
													WHERE admin_email='$email'; ");

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Password Changed!",
				icon:"success",
				text:"You Have Change Your Password Successfully",
				button:"Back To Login"}	).then(function(){window.location.href="admin_login.php";}); </script>
<?php
	}
}

?>
<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="assets/img/admin_logo.png" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Reset Password</h1>
							<p class="account-subtitle">Enter your new password to reset password</p>

							<form method="post" autocomplete="off">


								<div class="form-group">

									<input class="form-control" type="password" placeholder="Password" name="password" required> </div>
								<div class="form-group mb-0">

                                <div class="form-group">
									<input class="form-control" type="password" placeholder="Confirmation Password" name="con_password" required> </div>
                                    <span style="color:red;"><?php echo $error; ?></span>
								<div class="form-group mb-0">

									<button class="btn btn-primary btn-block" type="submit" name="resetbtn">Reset Password</button>
								</div>
							</form>

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