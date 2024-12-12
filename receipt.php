<?php include("connection.php");
session_start();

$card_name=$_SESSION['carname'];
$payment_method= $_SESSION['payment_method'];
$cusid=$_SESSION["id"];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Receipt</title>
        <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 150px;
				border: 5px solid #eee;
				box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
                background-color :#A9A9A9;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 10px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

            .button {
            background-color: #008CBA;
            border-radius: 12px;
  			color: white;
  			padding: 10px 24px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			margin: 4px 2px;
  			cursor: pointer;
            }
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="3">
						<form method="post">
						<table>
							<tr>
								<td class="title">
									<img src="logo.png" style="width: 70%; max-width: 200px" />
								</td>

								<td>
                                    <br>                 </br>
									<br><?php echo date("d-m-Y"); ?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>


				<tr class="heading">
					<td>Payment Method</td>

					<td>              </td>
				</tr>

				<tr class="details">
					<td><?php echo $payment_method; 

					if($payment_method =="Debit/Credit Card")
					{
						echo " (".$card_name.")";
					}
					
					?></td>
					<td></td>
				</tr>

				<tr class="heading">
					<td>Product Purchased</td>

					<td>Price (RM)</td>
				</tr>
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
					$product_subtotal=$table['cart_subtotal'];
					$product_id=$table['product_id'];
					$product_quantity=$table['product_quantity'];
					//$updatestock=mysqli_query($connect,"UPDATE product SET product_stock = product_stock - '$product_quantity' WHERE product_id = '$product_id'");
			?>

				<tr class="item">
					<td><?php echo $table['product_name']; ?></td>

					<td><?php echo $table['cart_subtotal']; ?></td>
				</tr>
			<?php
				 $gtt=$gtt+$product_subtotal;
				 $status_order="Paid Out";
				 $order_date=date("Y-m-d");
			
				
				}
			?>
		

				<tr class="total">
					<td></td>

					<td>Total: RM <?php echo number_format((float)$gtt, 2, '.', '') ?></td>
                    
				</tr>
			</table>
		<br>
		<br>
		<br>
		<button class="button" type="submit" name="home" style="margin-left:280px">Home</button>
		<button class="button" name="purchase" style="margin-center:280px">Purchase History</button>
			</form>
			
		</div>
		<?php
	 if(isset($_POST["home"]) )
	 {
		
		$payment_type=mysqli_query($connect,"INSERT INTO payment(payment_type,grandtotal) VALUES ('$payment_method','$gtt')");
		$update_order=mysqli_query($connect,"INSERT INTO customer_order (customer_id,order_status,payment_id,order_date) VALUES ('$cusid','$status_order',LAST_INSERT_ID(),'$order_date')");
		$update_cart=mysqli_query($connect,"UPDATE cart SET payment_status=LAST_INSERT_ID() WHERE customer_id='$cusid' AND payment_status=0");
		if($payment_type && $update_order && $update_cart)
		{
		?>
		 <script>
		window.location.href="index.php"
		</script>
<?php
		}
	 }

?>
<?php
	 if(isset($_POST["purchase"]) )
	 {
		$payment_type=mysqli_query($connect,"INSERT INTO payment(payment_type,grandtotal) VALUES ('$payment_method','$gtt')");
		$update_order=mysqli_query($connect,"INSERT INTO customer_order (customer_id,order_status,payment_id,order_date) VALUES ('$cusid','$status_order',LAST_INSERT_ID(),'$order_date')");
		$update_cart=mysqli_query($connect,"UPDATE cart SET payment_status=LAST_INSERT_ID() WHERE customer_id='$cusid' AND payment_status=0");
		if($payment_type && $update_order && $update_cart)
		{
		?>
		 <script>
		window.location.href="purchasehistory.php"
		</script>
<?php
		}
	 }

?>
	</body>
</html>