<style>
@import url('https://fonts.googleapis.com/css?family=Barlow:800&display=swap');

 h3.toAllpd {
	 font-family: 'Barlow', sans-serif;
	 display: flex; 
	 margin: 0;
	 min-height: 0vh;
}
 a.forAllpd {
	 position: relative;
	 display: inline-block;
	 font-size: 1em;
	 font-weight: 800;
	 color: lightgrey;
	 overflow: hidden;
	 background: linear-gradient(to right, black, lightgrey 50%, black 50%);
	 background-clip: text;
	 -webkit-background-clip: text;
	 -webkit-text-fill-color: transparent;
	 background-size: 200% 100%;
	 background-position: 100%;
	 transition: background-position 275ms ease;
	 text-decoration: none;
}
 a.forAllpd:hover {
	 background-position: 0 100%;
}
</style>
<div class="col-md-3 p-right single-right">
					<h3 class="toAllpd"><a class="forAllpd" href="products.php" style="color:black; text-decoration:none;">All Product</a></h3>
					
				<h3>Categories</h3>
					<ul class="product-categories">
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
					
					<h3>Colors</h3>
					<ul class="product-categories">
					<?php
						$result = mysqli_query($connect, "SELECT * from product_color");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
						<li><a href="products.php?cid=<?php echo $row['product_color_id']; ?>"><?php echo $row['product_color']; ?></a></li>
					
						<?php
							}
						}
					?>
					</ul>

					<h3>Sizes</h3>
					<ul class="product-categories">
					<?php
						$result = mysqli_query($connect, "SELECT * from product_size");
						{
							while($row = mysqli_fetch_assoc($result))
							{
				
					?>
						<li><a href="products.php?sid=<?php echo $row['product_size_id']; ?>"><?php echo $row['product_size']; ?></a></li>
					
						<?php
							}
						}
					?>
					</ul>
					<h3>Price</h3>
					<ul class="product-categories p1">
						<li><a href="#">RM50-RM100</a> <span class="count">(14)</span></li>
						<li><a href="#">RM101-RM200</a> <span class="count">(2)</span></li>
						<li><a href="#">RM201-Rm300</a> <span class="count">(2)</span></li>
						<li><a href="#">RM301-RM400</a> <span class="count">(8)</span></li>
						<li><a href="#">above RM400</a> <span class="count">(11)</span></li>
					</ul>
			</div>