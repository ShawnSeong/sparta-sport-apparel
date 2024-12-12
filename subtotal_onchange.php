<?php 
include("connection.php");
session_start();

$cusid=$_SESSION["id"];
$qty=$_POST["qty"];
$price=$_POST["product_price"];
$cart_id=$_POST["cart_id"];

$subtotal=$price * $qty;

mysqli_query($connect,"UPDATE cart SET product_quantity = '$qty', cart_subtotal= '$subtotal' WHERE cart_id = '$cart_id' AND customer_id = '$cusid'");

echo number_format("$subtotal",2);

?>