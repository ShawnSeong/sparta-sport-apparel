<!DOCTYPE html>
<html>

<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!--icons-->
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/style.css"> 
	<style>
		span{color:red;}
	</style>
	</head>
<?php
	
	session_start();
	include("session_connect.php");

	$error = "";
	if(isset($_GET["sendbtn"]))
	{
		if(empty($_GET["admin_id"]) && empty($_GET["admin_password"])) //no enter anythings in form
		{
			$error = "Please fill in ID and Password";
		}
		else if(empty($_GET["admin_id"]))
		{
			$error = "Please fill in ID";
		}
		else if( empty($_GET["admin_password"]))
		{
			$error = "Please fill in Password";
		}
		else
		{
			$id = $_GET["admin_id"];
			$pass = $_GET["admin_password"];
			
			$id = mysqli_real_escape_string($connect,$id);
			$pass = mysqli_real_escape_string($connect,$pass); 
			//escape those special character
			
			$result = mysqli_query($connect,"SELECT * FROM admin WHERE admin_id='$id' AND admin_password='$pass'");
			
			$count = mysqli_num_rows($result);
			
			if($count == 1)
			{
				$row = mysqli_fetch_assoc($result);
				$_SESSION["id"] = $row["admin_id"]; 
			?>
			<script>
				alert("Login Successfully.");
				</script>

<?php
				header("refresh:0.1; url=admin_index.php");
			}
			else
			{
				$error = "ID or Password are invalid.";
			}
		}
	}

?>

<body >
<div class="bg-image"></div>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="assets/img/admin_logo.png" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">As Admin</p>
							
							<form autocomplete="off">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="ID" name="admin_id">
									<span id="id_error"></span>
									</div>
									
									
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" name="admin_password"> 
									<span> <?php echo $error; ?> </span>
									</div>
									
								<div class="form-group">
									<button class="btn btn-primary btn-block" name="sendbtn" type="submit">Login</button>
								</div>
								
								<div class="form-group">
									<a href="superadmin_login.php"><button class="btn btn-primary btn-block" name="sendbtn" type="button">Superadmin</button></a>
								</div>
							</form>
							<div class="text-center forgotpass"><a href="admin_forgot-password.php">Forgot Password?</a> </div>
							
						
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</body>
<?php
mysqli_close($connect);
?>
</html>