<!--top-header-->
	<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-4 top-header-left">
				<div class="search-bar">
					
				</div>
			</div>
			<div class="col-md-4 top-header-middle">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--top-header-->
<!--bottom-header-->
	<div class="header-bottom">
		<div class="container" style=" padding-bottom:5px;">
			<div class="top-nav">
				<ul class="memenu skyblue" style="padding-top:10px;"><li class="active" ><a href="index.php">Home</a></li>
				<?php 
					$result = mysqli_query($connect, "SELECT * from product_type");
					$catmen = "Men";
					$catwomen = "Women";
				?>
					<li class="grid"><a href="products.php?cat=<?php echo $catmen; ?>">Men</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="products.php?cat=<?php echo $catmen; ?>">Men</a></li>
										<li><a href="products.php?cat=<?php echo $catwomen; ?>">Women</a></li>
										<li><a href="products.php">All products</a></li>
										<li><a href="checkout.php">My Cart</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Category</h4>
									<ul>
									<?php
						
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
							<li><a href="products.php?cat=<?php echo $catmen; ?>&pid=<?php echo $row['product_type_id']; ?>"><?php echo $row['product_type_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
									</ul>		
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
					<?php
						$result = mysqli_query($connect, "SELECT * from product_brand");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php?cat=<?php echo $catmen; ?>&bid=<?php echo $row['product_brand_id']; ?>"><?php echo $row['product_brand_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<?php 
						$result = mysqli_query($connect, "SELECT * from product_type");
						
					?>
					<li class="grid"><a href="products.php?cat=<?php echo $catwomen; ?>">Women</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>

									<li><a href="products.php?cat=<?php echo $catmen; ?>">Men</a></li>
									<li><a href="products.php?cat=<?php echo $catwomen; ?>">Women</a></li>
									<li><a href="products.php">All products</a></li>
									<li><a href="checkout.php">My Cart</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Category</h4>
									<ul>
						<?php
						
						
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php?cat=<?php echo $catwomen; ?>&pid=<?php echo $row['product_type_id']; ?>"><?php echo $row['product_type_name']; ?></a></li>
					
					<?php
							}
							
					?>
								</ul>	
								</div>

								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
					<?php
						$result = mysqli_query($connect, "SELECT * from product_brand");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php?cat=<?php echo $catwomen; ?>&bid=<?php echo $row['product_brand_id']; ?>"><?php echo $row['product_brand_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#">Category</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="products.php?cat=<?php echo $catmen; ?>">Men</a></li>
										<li><a href="products.php?cat=<?php echo $catwomen; ?>">Women</a></li>
										<li><a href="products.php">All products</a></li>
										<li><a href="checkout.php">My Cart</a></li>
									</ul>
								</div>
								<div class="col1 me-one">
									<h4>Category</h4>
									<ul>
					<?php
						$result = mysqli_query($connect, "SELECT * from product_type");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php?pid=<?php echo $row['product_type_id']; ?>"><?php echo $row['product_type_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
									</ul>	
								</div>
								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
					<?php
						$result = mysqli_query($connect, "SELECT * from product_brand");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php?bid=<?php echo $row['product_brand_id']; ?>"><?php echo $row['product_brand_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#">Brands</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<h4>Shop</h4>
									<ul>
										<li><a href="products.php?cat=<?php echo $catmen; ?>">Men</a></li>
										<li><a href="products.php?cat=<?php echo $catwomen; ?>">Women</a></li>
										<li><a href="products.php">All products</a></li>
										<li><a href="checkout.php">My Cart</a></li>
									</ul>
								</div>

								<div class="col1 me-one">
									<h4>Category</h4>
									<ul>
					<?php
						$result = mysqli_query($connect, "SELECT * from product_type");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php?pid=<?php echo $row['product_type_id']; ?>"><?php echo $row['product_type_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
									</ul>	
								</div>

								<div class="col1 me-one">
									<h4>Popular Brands</h4>
									<ul>
					<?php
						$result = mysqli_query($connect, "SELECT * from product_brand");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
					
							<li><a href="products.php?bid=<?php echo $row['product_brand_id']; ?>"><?php echo $row['product_brand_name']; ?></a></li>
					
					<?php
							}
						}	
					?>
									</ul>	
								</div>
							</div>
						</div>
					</li>
					<li class="grid" style="float:right;"><div class="col-md-4 top-header-right">
				<div class="cart box_1">
						<a href="checkout.php">
							<img src="images/cart-2.png" alt="" />
						</a>
						
					</div>
			</div></li>
            <?php 
                if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
                    $user_id=$_SESSION["id"];
                    $result=mysqli_query($connect,
		            "SELECT * FROM customer WHERE customer_id = '$user_id'");

                    $row=mysqli_fetch_assoc($result);
                    ?>
					
                    <li class="grid" style="float:right;"><a href="profile.php"><img src="images/login_logo.png" style="width:30px;height:30px;"><?php echo $row["customer_first_name"] ?></a> 
					<div class="mepanel">
						<div class="row">
					<div class="col1 me-one">
						<ul>
                        <li><a href="profile.php">My Account</a> </li>
                        <li><a href="purchasehistory.php">My Orders</a> </li>
                        <li><a href="logout.php">Logout</a> </li>
                    </ul>
				</div>
				</div>
				</div>
                    </li>
                    <?php
                }
                else{
                    ?>
                    <li class="grid" style="float:right;"><a href="login.php"><img src="images/login_logo.png" style="width:30px;height:30px;">Login/Register</a> </li>                    
					<?php
                }
                ?>
					
			
			</div>
			</ul>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--bottom-header-->