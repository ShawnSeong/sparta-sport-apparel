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
<body> 
	<?php include("header.php"); ?>
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container" style="padding-bottom:5px;">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Register</li>
				</ol>
			</div>
		</div>
	</div>
	<?php 
	$email_check="";
	$hpnum_check="";
	$pass_check="";
	$postcode_check="";

	if(isset($_POST["regbtn"])) 	
	{
		$firstname = $_POST["customer_first_name"];  	
		$lastname = $_POST["customer_last_name"];  	
		$email = $_POST["customer_email"];  	
		$hpnum = $_POST["customer_phone_num"];  
		$pass = $_POST["customer_password"]; 
		$check_pass = $_POST["confirm_password"];
		$address1 = $_POST["address1"]; 
		$address2 = $_POST["address2"]; 
		$postcode = $_POST["postcode"]; 
		$city = $_POST["city"]; 
		$state = $_POST["state"];
		$Check = 0; 
		
		//Check if email exist
		$select = mysqli_query($connect, "SELECT customer_email FROM customer WHERE customer_email = '".$_POST['customer_email']."'") or exit(mysqli_error($connect));
		if(mysqli_num_rows($select)) 
		{
			$email_check="*This email already being use.";
			$Check++;
		}

		//Check email format
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email_check="*Please enter correct email format.";
			$Check++;
		}
		
		//Check if both password is matched
		if($pass != $check_pass)
		{
			$pass_check="*Password not matching.";
			$Check++;
		}
		
		//Check phone number format
		$getPhoneLength = strlen($hpnum);
		if($getPhoneLength < 10)
		{
				$hpnum_check="*Please enter a valid phone number.";
				$Check++;
		}
		
		//Check postcode format
		$getPostcodeLength = strlen($postcode);
			if($getPostcodeLength < 5){
				$postcode_check = "*Please enter a valid postcode.";
				$Check++;
			}
		

		//All input valid
		if($Check==0)
		{
			$insertProfile=mysqli_query($connect,"INSERT INTO customer (customer_first_name, customer_last_name, customer_email, customer_phone_num, customer_password) VALUES ('$firstname', '$lastname', '$email', '$hpnum', '$pass') ");
			$insertAddress=mysqli_query($connect,"INSERT INTO customer_address(delivery_address_line1,delivery_address_line2,contact_number,state,postcode,city,customer_id) VALUES ('$address1','$address2','$hpnum','$state','$postcode','$city',LAST_INSERT_ID())");
			if($insertProfile && $insertAddress)
		{
	
				?>
	
				<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
				<script>swal({title:"Register Successfully!",
				icon:"success",
				button:"Login Now"}).then(function(){window.location.href="login.php";}); </script>
	
	<?php
				
			}
		}
	}
		?>
	<!--end-breadcrumbs-->
	<!--start-account-->
	<div class="account">
		<div class="container" style="border:1px solid RGB(255, 106, 89);padding:20px 15px 20px 15px;"> 
			<div class="account-bottom">
				
				<div class="col-md-6 account-left">
					<form method="post" autocomplete="off" >
						<div class="account-top heading">
						<h3>REGISTER</h3>
					</div>
					<div class="address reg">
	
						<span>First Name</span>
						<input type="text" style="border-radius:5px;" name="customer_first_name" required>
						
						
						<span>Last Name </span>
						<input type="text" style="border-radius:5px;" name="customer_last_name" required>
						
						
						<span>Email Address</span>
						<input type="email" name="customer_email" style="border-radius:5px;border: 1px solid #242424;outline: none;width: 100%;font-size: 14px;padding: 10px 10px;font-family: 'Lato', sans-serif;margin: 10px 0px 10px 0px;" required>
						<span style="color:red;"><?php echo $email_check; ?></span>

						<span>Handphone No.</span>
						<input type="text" placeholder="e.g  0123456789" style="border-radius:5px;" name="customer_phone_num" pattern="0.+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" required>
						<span style="color:red;"><?php echo $hpnum_check; ?></span>

						<span>Password</span>
						<input type="password" style="border-radius:5px;" name="customer_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
						

						<p>**Password should consist of a mixture of numbers and both uppercase and lowercase letters with at least 8 characters </p>
						
						<span>Confirm Password </span>
						<input type="password" style="border-radius:5px;" name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
						<span id="pass_error" style="color:red;"><?php echo $pass_check; ?></span>
					</div>
				</div>
				
				<div class="col-md-6 account-right">
						<div class="account-top heading">
						<h3>YOUR BILLING ADDRESS</h3>
					</div>
					<div class="address reg">
						<span>Address Line 1</span>
						<input type="text" style="border-radius:5px;" name="address1" required>
						
						
						<span>Addresss Line 2</span>
						<input type="text" style="border-radius:5px;" name="address2" required>
						
						
						<span>Postcode</span>
						<input type="text" maxlength="5" style="border-radius:5px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="postcode" required>
						<span style="color:red;"><?php echo $postcode_check; ?></span>

						<span>City</span>
						<input type="text" style="border-radius:5px;"  name="city" required>
						
						<span style="margin-top:25px;">State</span>
						<select class="form-control" id="sel3" style="border-radius:5px;" name="state" required>
							<option disabled value="" selected>Select State</option>
							<option value="Johor">Johor</option>
							<option value="Kedah">Kedah</option>
							<option value="Kelantan">Kelantan</option>
							<option value="Malacca">Malacca</option>
							<option value="Perak">Perak</option>
							<option value="Selangor">Selangor</option>
							<option value="Negeri Sembilan">Negeri Sembilan</option>
							<option value="Pahang">Pahang</option>
							<option value="Perlis">Perlis</option>
							<option value="Penang">Penang</option>
							<option value="Sabah">Sabah</option>
							<option value="Sarawak">Sarawak</option>
							<option value="Terengganu">Terengganu</option>
					</select>
						
						<label style="margin-top:40px;">By clicking Register, you agree to our Terms and that you have read our Data Use Policy. </label>
						<span><input type="submit" name="regbtn" value="Register" style="margin-left:140px;margin-top:20px;" > </span>
						
					</div>
				</div>
				</form>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-account-->
	<?php include("footer.php"); 
	?>	
</body>
</html>