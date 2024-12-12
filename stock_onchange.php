<?php 
include("connection.php");

$color_id=$_POST["product_color_id"];
$size_id=$_POST["product_size_id"];
$pid=$_POST["product_id"];

$result=mysqli_query($connect,"SELECT * FROM product 
                                WHERE product_color_id='$color_id'
                                AND product_size_id='$size_id'
                                AND product_detail_id ='$pid'");

$row=mysqli_fetch_assoc($result);
if(isset($row)){
echo $row['product_stock'];
$selected_product_stock=$row['product_stock'];
}


?>