<?php 
include("connection.php");
session_start();

$cusid=$_SESSION["id"];
$grand=0;

$result=mysqli_query($connect, "SELECT cart_subtotal, product_quantity FROM cart WHERE customer_id = '$cusid' AND payment_status=0");
while($row=mysqli_fetch_assoc($result)){
   $grand += $row['cart_subtotal'] ;
}

echo number_format("$grand",2);

?>