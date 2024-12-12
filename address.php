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
$check_phone="";
$postcode_check="";
if(isset($_POST["editbtn"]))
{
	$cusid=$_SESSION["id"];
	$checking=0;
	$check=0;
	$adds1=$_POST["da1"];
	$adds2=$_POST["da2"];
	$contactnum=$_POST["cuscn"];
	$state=$_POST["state"];
	$postc=$_POST["postcode"];
	$city=$_POST["city"];

	$phone_number=strlen($contactnum);
	if($phone_number<10) //phone number
	{
		$check_phone="*Phone number must be at least 10 numbers.";
		$checking=1;
	}

	$postcode_number=strlen($postc);
							if($postcode_number<5) //postcode
							{
								$postcode_check="*Postcode must be at least 5 numbers.";
								$checking=1;
							}


	if($checking==0)
	{
	mysqli_query($connect,"UPDATE customer_address SET delivery_address_line1='$adds1',
														delivery_address_line2='$adds2',
														contact_number='$contactnum',
														state = '$state',
														postcode='$postc',
														city='$city'
												WHERE customer_id='$cusid'; ");
												?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Address Updated!",
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
					<li class="active">My Address</li>
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
		$result = mysqli_query($connect, "SELECT * FROM customer_address JOIN customer ON customer_address.customer_id = customer.customer_id WHERE customer_address.customer_id='$cusid'");
		$row = mysqli_fetch_assoc($result);

		?>

		<form name="editfrm" method="post" action="" autocomplete="off">

			<p style="margin-top:15px;">Address Line 1 </p>
		 
			<p style="padding-top:5px;">Address Line 2 </p>
			
			<p style="padding-top:5px;">Contact Number </p>

			<p style="padding-top:5px;">State </p>

			<p style="padding-top:5px;">Postcode </p>

			<p style="padding-top:5px;">City </p>

			<p>&nbsp;</p>
			<p>&nbsp;</p>

			
			</div>
			<div class="content">
			<p style="margin-top:10px;"><input type="text" name="da1" size="50" value="<?php echo $row['delivery_address_line1']; ?>" required> </p>
			<p><input type="text" name="da2" size="50" value="<?php echo $row['delivery_address_line2']; ?>" required> </p>
			<p><input type="text"  name="cuscn" size="50" value="<?php echo $row['contact_number']; ?>" pattern="0.+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" required> <span style="color:red;"><?php echo $check_phone; ?></span> </p>
	
			<p ><select  name="state"  style="margin-top:4px;" required>
							<option disabled value="" selected>Select State</option>
							<option value="Johor" <?php if(strtolower($row['state']) =="johor") echo "selected";?> >Johor</option>
							<option value="Kedah" <?php if(strtolower($row['state']) =="kedah") echo "selected";?> >Kedah</option>
							<option value="Kelantan" <?php if(strtolower($row['state']) =="kelantan") echo "selected";?> >Kelantan</option>
							<option value="Malacca" <?php if(strtolower($row['state']) =="malacca") echo "selected";?> >Malacca</option>
							<option value="Perak" <?php if(strtolower($row['state']) =="perak") echo "selected";?> >Perak</option>
							<option value="Selangor" <?php if(strtolower($row['state']) =="selangor") echo "selected";?> >Selangor</option>
							<option value="Negeri Sembilan" <?php if(strtolower($row['state']) =="negeri sembilan") echo "selected";?> >Negeri Sembilan</option>
							<option value="Pahang" <?php if(strtolower($row['state']) =="pahang") echo "selected";?> >Pahang</option>
							<option value="Perlis" <?php if(strtolower($row['state']) =="perlis") echo "selected";?> >Perlis</option>
							<option value="Penang" <?php if(strtolower($row['state']) =="penang") echo "selected";?> >Penang</option>
							<option value="Sabah" <?php if(strtolower($row['state']) =="sabah") echo "selected";?> >Sabah</option>
							<option value="Sarawak" <?php if(strtolower($row['state']) =="sarawak") echo "selected";?> >Sarawak</option>
							<option value="Terengganu" <?php if(strtolower($row['state']) =="terengganu") echo "selected";?> >Terengganu</option>
					</select></p>
			<p><input type="text" name="postcode" size="50" maxlength="5" value="<?php echo $row['postcode']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required> <span style="color:red;"><?php echo $postcode_check; ?></span></p>
			<p><input type="text" name="city" size="50" value="<?php echo $row['city']; ?>" required> </p>
			<p><input type="submit" name="editbtn" value="SAVE" > 
</div>
		</form>

	
	
</div>

</div>
	<!--end-profile-->
	<?php include("footer.php"); ?>
</body>
</html>