<?php include("connection.php");
session_start();

 ?>
<?php
$check_phone="";
$postcode_check="";
if(isset($_POST["checkout"]) )
		{
      $cusid=$_SESSION["id"];
      $checking=0;
      $check=0;
      $lol=0;
      $fname=$_POST['firstname'];
      $lname=$_POST['lastname'];
      $contactnum=$_POST['phone'];
      $address1=$_POST['address1'];
      $address2=$_POST['address2'];
      $city=$_POST['city'];
      $state=$_POST['state'];
      $postcode=$_POST['postcode'];
      

      $phone_number=strlen($contactnum);
	if($phone_number<10) //phone number
	{
		$check_phone="*Phone number must be at least 10 numbers.<br>";
		$checking=1;
	}

  $postcode_number=strlen($postcode);
							if($postcode_number<5) //postcode
							{
								$postcode_check="*Postcode must be at least 5 numbers.<br>";
								$checking=1;
							}

    if($checking==0)
    {
      $check=mysqli_query($connect,"UPDATE customer SET customer_first_name='$fname',customer_last_name='$lname' WHERE customer_id='$cusid'");
      $lol=mysqli_query($connect,"UPDATE customer_address SET delivery_address_line1='$address1',delivery_address_line2='$address2',city='$city',state='$state',postcode='$postcode',contact_number='$contactnum' WHERE customer_id='$cusid'");

      $choice=$_POST['paymentMethod'];
      if($choice=="banking")
      {
        ?>
        <script>
				window.location.href="payment.php"
				</script>
        <?php
      }
      else
      {
        ?>
        <script>
				window.location.href="index.php"
				</script>
        <?php
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>My Order Summary</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta name="keywords" content="Free Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
.menu{list-style-type: none;
		   height:45px;
		   margin: 0;
		   padding: 0;
		   overflow: hidden;
		   background-color: #333;
	       position: -webkit-sticky; /* Safari */
		   position: static;
		   top: 0;}
		#menu-btn{float: left;}
		.menu a {display: block;
			  color: white;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;}
		.menu a:hover {background-color:none;
                  text-decoration:none;}
    </style>

</head>
<body> 
	<?php include("header.php"); ?>

<ul class="menu">
		<li id="menu-btn"style="margin-left:200px;"><a href="checkout.php" class="fa fa-arrow-circle-left"></a></li>
		<li id="menu-btn" style="margin-left:420px; background-color:grey; color:white;" class="fa fa-address-card"><a href="#"></a></li>
		<li id="menu-btn" style="margin-left:400px;"><a href="payment.php" class="fa fa-credit-card"></a></li>
	</ul>
 
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container" style="padding-bottom:5px;">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
          <li><a href="checkout.php">Cart</a></li>
					<li class="active">Order Summary</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
  <?php
	$cusid=$_SESSION["id"];
  $result = mysqli_query($connect, "SELECT * FROM customer JOIN customer_address ON customer.customer_id =customer_address.customer_id WHERE customer.customer_id='$cusid'");
  while($row = mysqli_fetch_assoc($result))
				{
?>
    <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Order Summary</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body" method="post" autocomplete="off">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" name="firstname" class="form-control" value="<?php echo $row['customer_first_name']; ?>" required>
                    <label for="firstName" class="">First name</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" name="lastname" class="form-control" value="<?php echo $row['customer_last_name']; ?>" required>
                    <label for="lastName" class="">Last name</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->


              <!--email-->
              <div class="md-form mb-5">
                <input type="text" id="email" class="form-control" name="email" placeholder="youremail@example.com" value="<?php echo $row['customer_email']; ?>" readonly>
                <label for="email" class="">Email (required)</label>
              </div>

              <div class="md-form mb-5">
                <input type="text"  class="form-control" name="phone" pattern="0.+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" value="<?php echo $row['contact_number']; ?>" required>
                <span style="color:red;"><?php echo $check_phone; ?></span>
                <label for="email" class="">Contact Number (required)</label>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <input type="text" id="address" class="form-control" name="address1" placeholder="e.g Jalan abc" value="<?php echo $row['delivery_address_line1']; ?>" required>
                <label for="address" class="">Address Line 1</label>
              </div>

              <!--address-2-->
              <div class="md-form mb-5">
                <input type="text" id="address-2" class="form-control" name="address2" placeholder="e.g aman abc" value="<?php echo $row['delivery_address_line2']; ?>" required>
                <label for="address-2" class="">Address Line 2 (required)</label>
              </div>

              <div class="md-form mb-5">
                <input type="text" id="country" class="form-control" name="city" placeholder="Enter your city" value="<?php echo $row['city']; ?>" required>
                <label for="country" class="">City (required)</label>
              </div>

              <div class="md-form mb-5">
                <select  name="state"  class="form-control" style="margin-top:4px;" required>
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
					</select>
                <label for="state" class="">State (required)</label>
              </div>

              <div class="md-form mb-5">
              <input type="text" class="form-control" id="zip" name="postcode" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="e.g 15230" value="<?php echo $row['postcode']; ?>"required>
              <span style="color:red;"><?php echo $postcode_check; ?></span>
              <label for="zip">Post Code(required)</label>
              </div>
<!--Grid column-->

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
              </div>
              <!--Grid row-->
            
              <hr>
              <label for="payment_method">Payment Method(required)</label>
              <div class="d-block my-3">
              <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="banking"checked required>
              <label class="custom-control-label" for="credit">Credit card / Debit card</label>
             </div> 

            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="ewallet" required>
              <label class="custom-control-label" for="paypal">E-wallet</label>
            </div>
            </div>
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit" name="checkout">Continue to checkout</button>

            </form>
<?php
        }
        ?>
          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">
       
          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?php
											$number= mysqli_query($connect, "SELECT * FROM cart where customer_id='$cusid' AND payment_status = 0");	
											$count = mysqli_num_rows($number);
											echo "$count"; ?></span>
          </h4>
          <?php
          $gtt=0;
           $cart = mysqli_query($connect, "SELECT * FROM cart 
           JOIN customer ON cart.customer_id = customer.customer_id 
           JOIN product ON cart.product_id = product.product_id 
           JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id 
           JOIN product_color ON product_color.product_color_id = product.product_color_id 
           JOIN product_size ON product_size.product_size_id = product.product_size_id WHERE cart.customer_id='$cusid' AND payment_status = 0");

            while($table = mysqli_fetch_assoc($cart))
              {
                
        ?>
          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            
            <li class="list-group-item d-flex justify-content-between lh-condensed">

              <div>

                <h6 style="font-size:16px" class="my-0"><?php echo $table['product_name']; ?><span style="font-size:14px; color:grey;"><br>Variation: (<?php echo $table['product_color']; ?>,<?php echo $table['product_size']; ?>)</span></h6>
                
                <small style=""> <?php echo '<img src="images/'.$table['product_image'].'" height="100px" width="100px">';?></small>
                <br>
            
                <small class="text-muted" style="font-size:15px">RM <?php echo $table['product_price']?>X<?php echo $table['product_quantity']?></small>
              </div>
              <span class="text-muted" style="font-size:15px">RM <?php echo $table['cart_subtotal'] ?></span>
            </li>
            <?php
             $total= $table['cart_subtotal'];
             $gtt=$gtt+$total;
              }
               
            ?>
            <li class="list-group-item d-flex justify-content-between">
            
             <span>*Shipping fee are included in product price.</span>
             <br>
              <span>Total (RM)</span>
              <strong  style="font-size:15px">RM <?php echo number_format((float)$gtt, 2, '.', '') ?></strong>
             
            </li>
          </ul>
          
          <!-- Cart -->


        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
	<!--end-ckeckout-->
	<?php include("footer.php"); ?>
</body>
</html>