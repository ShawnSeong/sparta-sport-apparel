<?php include("connection.php");
session_start();
//$cusid=$_SESSION["id"];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>E-wallet</title>
	<link rel="stylesheet" href="E-wallet.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
	body {
	background-color: #DCDCDC!important; 
}

.wallet-container {
	background-color: #2F4F4F;
		width: 800px;
		height: 700px;
		color: #F8F8FF;
		font-size: 15px;
		padding: 20px 20px 0;
		top: 55%;
		left: 50%;
		transform: translate(-50%,-50%);
		position: absolute;
  
  
}

.page-title {
	text-align: left;
}

.fa-user {
	float: right;
}

.fa-align-left {
	margin-right: 15px;
}

.amount-box img {
	width: 50px;
}

.amount {
	font-size: 35px;
}

.amount-box p {
	margin-top: 10px;
	margin-bottom: -10px;
}

.btn-group {
	margin: 20px 0;
}

.btn-group .btn {
	margin: 8px;
	border-radius: 20px !important;
	font-size: 12px;
}

.txn-history {
	text-align: left;
}

.txn-list {
	background-color: #fff;
	padding: 12px 10px; 
	color: #000000;
	font-size: 14px;
	margin: 7px 0;
}

.debit-amount {
	color: red;
	float: right;
}

.credit-amount {
	color: green;
	float: right;

}

.footer-menu {
	margin: 20px -20px 0;
	bottom: 0;
	border-top: 1px solid #ccc;
	padding: 10px 10px 0;
	margin-top: 130px;
}

.footer-menu p {
	font-size: 12px;
}

@media screen and (max-width: 800px){
  .wallet-container {
    height: 115%;
    bottom: 20px;
    margin-top: 100px;
  }
  
}
	</style>
</head>
<body>
	<div class="wallet-container text-center">
		<p class="page-title"><i class="fa fa-align-left"></i>My E-wallet<i class="fa fa-user"></i></p>

		<div class="amount-box text-center">
			<img src="https://lh3.googleusercontent.com/ohLHGNvMvQjOcmRpL4rjS3YQlcpO0D_80jJpJ-QA7-fQln9p3n7BAnqu3mxQ6kI4Sw" alt="wallet">
			<p>Total Balance</p>
			<p class="amount">$ 123</p>
		</div>

		<div class="btn-group text-center">
			<button type="button" class="btn btn-outline-light">Add Money</button>
			<button type="button" class="btn btn-outline-light">Widthdraw</button>
			</div>

			<div class="txn-history">
				<p><b>History</b></p>
				<p class="txn-list">Payment to xyz shop<span class="debit-amount">-$100</span></p>

				<p class="txn-list">Payment to abc shop<span class="debit-amount">-$150</span></p>

				<p class="txn-list">Credit From abc ltd<span class="credit-amount">+$300</span></p>

				<p class="txn-list">Transfer From John Doe<span class="credit-amount">+$100</span></p>
			</div>

			<div class="footer-menu">
				<div class="row text-center">
					<div class="col-md-3">
						<i class="fa fa-home"></i>
						<p>Home</p>
					</div>

					<div class="col-md-3">
						<i class="fa fa-plus-square"></i>
						<p>Topup</p>
					</div>

					<div class="col-md-3">
						<i class="fa fa-history"></i>
						<p>History</p>
					</div>

					<div class="col-md-3">
						<i class="fa fa-gear"></i>
						<p>Setting</p>
					</div>
				</div>
			</div>
</div>
</body>
</html>