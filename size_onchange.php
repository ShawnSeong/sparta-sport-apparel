<?php 
include("connection.php");


    $colorid=$_POST["dcolor"];
    $pid=$_POST["pid"];
    
    $result=mysqli_query($connect,"SELECT DISTINCT product_size, product.product_size_id FROM product
                                    LEFT JOIN product_size ON product.product_size_id = product_size.product_size_id
                                    WHERE product.product_color_id='$colorid'
                                    AND product.product_detail_id='$pid'
                                    AND product_stock != 0");
    ?>
    <select name="size" id="size"> 
    <option value=""> Select A Size </option>
    <?php
while($size=mysqli_fetch_assoc($result)){
                    
    echo '<option value='.$size['product_size_id'].'>'.$size['product_size'].'</option>';
        
}

?>
</select>

