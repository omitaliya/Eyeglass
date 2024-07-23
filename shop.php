<?php include 'header.php'; 
	if (isset($_GET['cid'])) {
		$catid=$_GET['cid'];
		$qry = "SELECT * FROM product_category WHERE cat_id='$catid'";
		$result = mysqli_query($con,$qry);
		$row=mysqli_fetch_array($result);
		$catname=$row['cat_name'];
	}
	else{
		$qry = "SELECT * FROM product_category ORDER BY cat_id LIMIT 1";
		$result = mysqli_query($con,$qry);
		$row=mysqli_fetch_array($result);
		$catid=$row['cat_id'];
		$catname=$row['cat_name'];
	}
?>
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.html">Home</a>
							<i>|</i>
						</li>
						<li>Shop</li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
		<!--/shop-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container-fluid">
				<div class="inner-sec-shop px-lg-4 px-3">
					<h3 class="tittle-w3layouts my-lg-4 mt-3 text-center"><?php echo $catname; ?></h3>
					<div class="row">
						<!-- product left -->
						<div class="side-bar col-lg-3">
							 
							<!-- price range -->
							<div class="" style="margin-left: 40px">
								<h3 class="agileits-sear-head">Search by Brands</h3>
								<ul>
					<?php
						$query="SELECT * FROM product_category ORDER BY cat_id";
		                $result=mysqli_query($con,$query);
		                while($value=mysqli_fetch_array($result))
		                {
		                    $cid=$value['cat_id'];
		                    $cname=$value['cat_name'];
		                    if ($cid==$catid) {
		                  ?>
							<li>
								<a href="shop.php?cid=<?php echo $cid; ?>"><span style="font-size: 14px;color: #1accfd;font-weight: bold;"><?php echo $cname; ?></span></a>
							</li>
					<?php
							}
							else{
					?>
							<li>
								<a href="shop.php?cid=<?php echo $cid; ?>"><span style="font-size: 14px;"><?php echo $cname; ?></span></a>
							</li>
					<?php
							} 
						}
					?>
					</ul>
							</div>
							<!-- //price range -->
							
						</div>
						<!-- //product left -->
						<!--/product right-->
						<div class="left-ads-display col-lg-9">
							<div class="wrapper_top_shop">
								
								<div class="row">
									<?php 
							$qry = "SELECT * FROM product_detail WHERE status=1 AND cat_id='$catid' ORDER BY product_id DESC";
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