<?php include("connection.php");
session_start();
$cusid=$_SESSION["id"];
 ?>

<!DOCTYPE html>
<html>
<head>
<?php
    $error_name="";
    $error_number="";
    $error_month="";
    $error_year="";
    $error_cvv="";
   $name_check=0;
   $card_checking=0;
   $month_check=0;
   $year_check=0;
   $cvv_check=0;
   $total=0;
  if(isset($_POST["pay"]) )
  {
    
      $name=$_POST["cardname"];
      $number=$_POST["cardnumber"];
      $month=$_POST["expmonth"];
      $year=$_POST["expyear"];
      $cvv=$_POST["cvv"];
      //Use to check all the input hit the requirement or not 
      
       $card_no="/^[4-5]\d{12}(\d{3})?$/";
       $visa="/^4\d{12}(\d{3})?$/";
       $master="/^5\d{12}(\d{3})?$/";
       $card_type="";
      if (!preg_match ("/^[a-z A-z]*$/", $name) ) //credit card name
       {  
        $error_name = "*Only alphabets allowed.";  
            
      } 
      else
      {
       $name_check=1;
        $error_name="";
      
      }
      
      if(!preg_match($card_no,$number)) //credit card number
			{
				$error_number="*Please enter a valid number";
			}
      else if(preg_match($visa,$number))
      {
        $card_type="Visa";
        $card_checking=1;
      }
      else if(preg_match($master,$number))
      {
        $card_checking=1;
        $card_type="Master";
      }
    else
      {
        $card_checking=1;
        $error_number="";
        
      }
     
      
      $cvv_number = strlen($cvv);
     if($cvv_number<3)
      {
        $error_cvv = "*Please enter 3 number";  
      }
      else
      {
      $cvv_check=1;
        $error_cvv="";
        
      }
      
      $cur_month=date('M Y');
      if (preg_match ("/^[a-zA-z]*$/", $month) ||  !ctype_digit($month)) //month
      {  
       $error_month = "*Only number are allowed.";  
           
     } 
     else if($month>12 || $month<1)
     {
       $error_month = "*Please enter valid month";
     }
     else
     {
      $month_check=1;
       $error_month="";
      
     }
    
      $min="/(\d{4,})/";
      $curYear = date('Y'); 
      if (preg_match ("/^[a-zA-z]*$/", $year) || !ctype_digit($year) || !preg_match ($min, $year)) //YEAR
       {  
        $error_year = "*Only number are allowed.";  
            
      } 
      else if($curYear>$year)
      {
        $error_year = "*Expired Year."; 
      }
      else
      {
      $year_check=1;
        $error_year="";
      }
      $total=0;
      $total=$month_check+$name_check+$year_check+$cvv_check+$card_checking;
      $_SESSION['carname'] = $card_type;
      $_SESSION['payment_method'] = "Debit/Credit Card";
     /* if($total==5)
      {
        ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Pay Seccessful",
				
				icon:"success",
				button:"Receipt"}).then(function(){window.location.href="receipt.php";}); </script>
        <?php
      }*/
     
  }
  
?>
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
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}
.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}
.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}
.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}
.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}
.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
.btn:hover {
  background-color: #45a049;
}
span.price {
  float: right;
  color: grey;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
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
		<li id="menu-btn"style="margin-left:200px;"><a href="order_summary.php" class="fa fa-arrow-circle-left"></a></li>
		<li id="menu-btn" style="margin-left:420px; color:white;" class="fa fa-address-card-o" style="background-color:white;"><a href="order_summary.php"></a></li>
		<li id="menu-btn" style="margin-left:400px; background-color:grey;"><a href="payment.php" class="fa fa-credit-card"></a></li>
	</ul>
	<!--start-breadcrumbs-->
	<div class="breadcrumbs" style="margin-bottom:10px;">
		<div class="container" style="padding-bottom:5px;">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
          <li><a href="checkout.php">Cart</a></li>
          <li><a href="order_summary.php">Order Summary</a></li>
					<li class="active">Payment</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-payment-->
	
	<div class="row">
  <div class="col-75">
    <div class="container">
 
      <form style="border: solid 1px RGB(255, 106, 89); border-radius: 3px; padding: 5px 20px 15px 20px;" method="post" autocomplete="off">
        <div class="row">
         
          <div class="col-50">
            <h3 style="margin-bottom:30px;">Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container" style="margin-bottom:32px;">
             
              <i><img src="images/visa_mastercard_1.gif" style="width:110px; height:35px;"> </i>
            
            </div>
            <label for="cname" style="margin-bottom:20px;" required>Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John Wee Ho" style="margin-bottom:0px;" required>
            <span style="color:red;"><?php echo $error_name; ?></span>
            <br>
            <br>
            
            <label for="ccnum" style="margin-bottom:20px;" required>Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="4111-2222-3333-4444" style="margin-bottom:00px;" maxlength="16" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
            <span style="color:red;"><?php echo $error_number; ?></span>
            <br>
            <br>
            <label for="expmonth" style="margin-bottom:20px;" required>Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="11" style="margin-bottom:0px;" maxlength="2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
            <span style="color:red;"><?php echo $error_month; ?></span>
            <br>
            <br>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2022" maxlength="4" style="margin-bottom:0px" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <span style="color:red;"><?php echo $error_year; ?></span>
              </div>
              
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="222"  maxlength="3" style="margin-bottom:0px"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <span style="color:red;"><?php echo $error_cvv; ?></span>
              </div>
            </div>
          </div>
        </div>
        <input type="submit" name="pay" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  </div>
  
	<!--end-payment-->
	<?php include("footer.php"); ?>
</body>
</html>
<?php

if($total==5)
      {
        $cart = mysqli_query($connect, "SELECT * FROM cart 
			JOIN customer ON cart.customer_id = customer.customer_id 
			JOIN product ON cart.product_id = product.product_id 
			JOIN product_detail ON product.product_detail_id = product_detail.product_detail_id 
			JOIN product_color ON product_color.product_color_id = product.product_color_id 
			JOIN product_size ON product_size.product_size_id = product.product_size_id WHERE cart.customer_id='$cusid' AND payment_status = 0");
      while($table = mysqli_fetch_assoc($cart))
      {
        $product_subtotal=$table['cart_subtotal'];
        $product_id=$table['product_id'];
        $product_quantity=$table['product_quantity'];
        $updatestock=mysqli_query($connect,"UPDATE product SET product_stock = product_stock - '$product_quantity' WHERE product_id = '$product_id'");}
        ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal({title:"Pay Seccessful",
				
				icon:"success",
				button:"Receipt"}).then(function(){window.location.href="receipt.php";}); </script>
        <?php
      }
?>