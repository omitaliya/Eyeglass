<?php 
					include "header.php";
			 ?>
		<!-- banner -->
		<div class="banner">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<div class="carousel-caption text-center">
							<h3>Men’s eyewear
								<!-- <span>Cool summer sale 50% off</span> -->
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
						</div>
					</div>
					<div class="carousel-item item2">
						<div class="carousel-caption text-center">
							<h3>Women’s eyewear
								<span>Want to Look Your Best?</span>
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item3">
						<div class="carousel-caption text-center">
							<h3>Men’s eyewear
								<!-- <span>Cool summer sale 50% off</span> -->
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

						</div>
					</div>
					<div class="carousel-item item4">
						<div class="carousel-caption text-center">
							<h3>Women’s eyewear
								<span>Want to Look Your Best?</span>
							</h3>
							<a href="shop.php" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--//banner -->
		</div>
	</div> 
	<!--//banner-sec-->

	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4">New Arrivals for you </h3>
				<div class="wrapper_top_shop">
								
								<div class="row">
									<?php 
							$qry = "SELECT * FROM product_detail WHERE status=1 AND quantity>1 ORDER BY product_id";
							$result = mysqli_query($con,$qry);
							while($row=mysqli_fetch_array($result))
							{
								$slid=$row['l_id'];
								$proid=$row['product_id'];
						?>
									<!-- /womens -->
									<div class="col-md-3 product-men women_two shop-gd">
										<div class="product-googles-info googles">
											<div class="men-pro-item">
												<div class="men-thumb-item">
													<img src="products/<?php echo $row['product_image']; ?>" class="img-fluid" alt="">
													<div class="men-cart-pro">
														<div class="inner-men-cart-pro">
															<a href="single.php?pid=<?php echo $row['product_id'];?>" class="link-product-add-cart">Quick View</a>
														</div>
													</div>
													<span class="product-new-top">New</span>
												</div>
												<div class="item-info-product">
													<div class="info-product-price">
														<div class="grid_meta">
															<div class="product_price">
																<h4>
																	<a href="single.php?pid=<?php echo $row['product_id'];?>"><?php echo $row['product_name']; ?></a>
																</h4>
																<div class="grid-price mt-2">
																	<span class="money ">₹ <?php echo $row['product_price']; ?></span>
																</div>
															</div>
															
														</div>
														<div class="googles single-item hvr-outline-out">
											<?php
											if(!isset($_SESSION['useremail'])){
										?>

												<button type="submit" class="googles-cart pgoogles-cart" style="background-color: black; color: white" onclick="return confirm('You need to login first!!');">
													<i class="fas fa-cart-plus"></i>
												</button>
												<?php
											}
											else{
											?>
											<a href="addtocart.php?slid=<?php echo $slid;?>&proid=<?php echo $proid;?>"><input type="submit" class="button" value="Add to cart" style="background-color: black; color: white"></a>
										<?php
											}
										?>

											
										</div>
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>	
									
								</div>
								<div class="row my-lg-3 my-0">
										<!-- /womens -->
									
									</div>
									<div class="row">
											<!-- /womens -->
										
							</div>
						</div>
						<!--//product right-->
					</div>
<?php include"footer.php"; ?>