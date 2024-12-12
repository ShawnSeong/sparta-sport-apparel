<?php include("connection.php");
session_start();
if(!isset($_SESSION["id"])){
	?>
	<script>
		alert("Please log in ");
	</script>
	
	<?php
	header("refresh:1; url=login.php");
	exit();
}?>


<?php

$phone_check="";
if(isset($_POST["editbtn"]))
{
	$cusid=$_SESSION["id"];
	$checking=0;
	$check=0;
	$cfname=$_POST["cusfn"];
	$clname=$_POST["cusln"];
	$cemail=$_POST["cusemail"];
	$chandp=$_POST["cushp"];

			$phone_number=strlen($chandp);
					if($phone_number<10) //phone number
					{
						$phone_check="*Phone number must be at least 10 numbers.";
						$checking=1;
					}

	if($checking==0)
	{
	mysqli_query($connect,"UPDATE customer SET customer_first_name='$cfname',
												customer_last_name='$clname',
												customer_email='$cemail',
												customer_phone_num='$chandp'
												WHERE customer_id='$cusid'; ");
												?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Profile Updated!",
				icon:"success",
				button:"Back To My Profile"}	).then(function(){window.location.href="profile.php";}); </script>
												<?php
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

<style>
input[type="submit"] {
	background: RGB(255, 106, 89);
	color: #FFF;
	font-size: 1em;
	padding: 0.5em 1.2em;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
	display: inline-block;
	text-transform: uppercase;
	border: none;
	outline: none;
	margin-left: 10px;
	width: 50%;
	height: 50px;
}

input[type="submit"]:hover {
	background:#cb0000;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-o-transition: 0.5s all;
}

input{
	display:block;
}

#wrapper
{
	width:900px;
	border:2px solid RGB(255, 106, 89);;
	overflow:auto;
}

#left
{
	float:left;
	width:200px;
	padding:15px;
}


#right
{
	float:left;
	padding:5px;	
	border-left:2px solid RGB(255, 106, 89);;
	width:150px;
}

.content{
	float:left;
	padding:5px;
	width:450px;
}

label
{
	display:inline-block;
	width:100px;
	vertical-align:top;
	
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
					<li class="active"><a href="profile.php">My Account</a></li>
					<li class="active">My Profile</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-profile-->
	<div class="container">

	<h3> My Account </h3>
	
	<div id="wrapper">

	<div id="left">
		<?php 
		echo "<h4><a href='profile.php'>My Profile </a> </h4>";
		echo "<h4><a href='address.php'>My Address </a> </h4>";
		?>
	</div>
	
	<div id="right">

		<?php

		$cusid=$_SESSION["id"];
		$result = mysqli_query($connect, "SELECT * FROM customer WHERE customer_id='$cusid'");
		$row = mysqli_fetch_assoc($result);

		?>

		<form name="editfrm" method="post" action="" autocomplete="off">

			<p style="margin-top:15px;">First Name </p>
		 
			<p style="padding-top:5px;">Last Name </p>
			
			<p style="padding-top:5px;">Email </p>

			<p style="padding-top:5px;">Handphone No. </p>

			<p>&nbsp;</p>
			<p>&nbsp;</p>

			
			</div>
			<div class="content">
			<p style="margin-top:10px;"><input type="text" name="cusfn" size="50" value="<?php echo $row['customer_first_name']; ?>" required> </p>
			<p><input type="text" name="cusln" size="50" value="<?php echo $row['customer_last_name']; ?>" required> </p>
			<p><input type="text"  name="cusemail" size="50" style="background-color:#E5E4E2;"  value="<?php echo $row['customer_email']; ?>" readonly> </p>
			<p><input type="text" name="cushp" size="50" value="<?php echo $row['customer_phone_num']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" pattern="0.+" required> <span style="color:red;"><?php echo $phone_check;?></span> </p>
			
			<p><input type="submit" name="editbtn" value="SAVE" > 
</div>
		</form>

	
	
</div>

</div>
	<!--end-profile-->
	<?php include("footer.php"); ?>
</body>
</html>

