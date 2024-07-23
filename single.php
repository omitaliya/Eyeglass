<?php include 'header.php'; 
	if (isset($_GET['pid'])){
		$pid=$_GET['pid'];
		$qry = "SELECT * FROM product_detail WHERE product_id='$pid' AND status=1";
		$result = mysqli_query($con,$qry);
		$row=mysqli_fetch_array($result);
		$cid=$row['cat_id'];
		$pname=$row['product_name'];
		$slid=$row['l_id'];
		$pdes=$row['product_description'];
		$pimg=$row['product_image'];
		$pprice=$row['product_price'];
		$qnt=$row['quantity'];

		$qry1 = "SELECT * FROM product_category WHERE cat_id='$cid'";
		$result1 = mysqli_query($con,$qry1);
		$row1=mysqli_fetch_array($result1);
		$cname=$row1['cat_name'];
	}
	else{
		header('location:product.php');
	}
?>
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>View Product</li>
					</ul>
				</div>
			</div>

		</div>
		
	</div>
		<!--//banner -->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
					<div class="row">
							<div class="col-lg-4 single-right-left ">
									<div class="grid images_3_of_2">
										<div class="flexslider1">
					
											<ul class="slides">
												<li data-thumb="products/<?php echo $pimg; ?>">
													<div class="thumb-image"> <img src="products/<?php echo $pimg; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												<li data-thumb="products/<?php echo $pimg; ?>">
													<div class="thumb-image"> <img src="products/<?php echo $pimg; ?>" data-imagezoom="true" class="img-fluid" alt=" "></div>
												</li>
												<li data-thumb="products/<?php echo $pimg; ?>">
													<div class="thumb-image"> <img src="products/<?php echo $pimg; ?>" data-imagezoom="true" class="img-fluid" alt=" "></div>
												</li>
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 single-right-left simpleCart_shelfItem">
									<h3><?php echo $pname; ?></h3>
									<p><span class="item_price">Rs. <?php echo $pprice; ?></span>
										<!-- <del>$1,199</del> -->
									</p>
									
									
									<div class="occasion-cart">
											<div class="googles single-item singlepage">
													<form action="" method="post">
														<?php
						if(!isset($_SESSION['useremail'])){
					?>
							<button type="submit" name="submit" value="Add to cart" onclick="return confirm('You need to login first!!');" class="button" class="googles-cart pgoogles-cart" ></button>
					<?php
						}
						else{
							if ($row['quantity']<1) {
					?>
								<button type="submit" class="button" value="Out of Stock" style="background: #FF5722;" disabled=""></button>
					<?php
							}
							else{
					?>
								
														<button type="submit" class="googles-cart pgoogles-cart" name="submit">
															Add to Cart
														</button>
														<input type="hidden" name="slid" value="<?php echo $slid;?>">
														<input type="hidden" name="proid" value="<?php echo $pid;?>">
					<?php
							}
						}
					?>
														
													</form>
		
												</div>
									</div>
									
			
								</div>
								<div class="clearfix"> </div>
								<!--/tabs-->
								<div class="responsive_tabs">
									<div id="horizontalTab">
										<ul class="resp-tabs-list">
											<li>Description</li>
											
										</ul>
										<div class="resp-tabs-container">
											<!--/tab_one-->
											<div class="tab1">
					
												<div class="single_page">
													<h5><?php echo $pdes; ?></h5>
												</div>
											</div>
											<!--//tab_one-->
											
											</div>
										</div>
									</div>
								</div>
								<!--//tabs-->
					
					</div>
				</div>
			</div>
			
		</section>
		<!-- //footer -->

			<?php 
					include "footer.php";

					if(isset($_POST['submit'])){
	$proid = $_POST['proid'];
	$slid = $_POST['slid'];
	$ulid = $_SESSION['ulogid'];

	$q6 = "SELECT * FROM cart_table WHERE l_id='$ulid' AND product_id='$proid' AND status=0";
	$res6 = mysqli_query($con, $q6);
	$n = mysqli_num_rows($res6);
	if($n==0){

		$q4 = "INSERT INTO cart_table(l_id,product_id,shop_l_id,quantity, status) VALUES ('$ulid','$proid','$slid',1, 0)";
		$res4 = mysqli_query($con, $q4);

		$q5 = "UPDATE product_detail SET quantity = quantity - 1 WHERE product_id='$proid'";
		$res5 = mysqli_query($con, $q5);
		if($res4 && $res5){
			echo "<script LANGUAGE='JavaScript'>
			window.alert('Product added to cart successfully.');
			window.location.href=document.referrer;
			</script>";
		}
		else{
			echo "<script LANGUAGE='JavaScript'>
			window.alert('Error Occured Please Try Again!!');
			window.location.href=document.referrer;
			</script>";
		}
	}
	else{
		echo "<script LANGUAGE='JavaScript'>
			window.alert('Product already added to your cart.');
			window.location.href='cart.php';
			</script>";
	}
}
			 ?>
			 	<!--jQuery-->
		<script src="js/jquery-2.2.3.min.js"></script>
		<!-- newsletter modal -->
		<!--search jQuery-->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<script src="js/classie-search.js"></script>
		<script src="js/demo1-search.js"></script>
		<!--//search jQuery-->
		<!-- cart-js -->
		<script src="js/minicart.js"></script>
		
		<!-- //cart-js -->
		<script>
			$(document).ready(function () {
				$(".button-log a").click(function () {
					$(".overlay-login").fadeToggle(200);
					$(this).toggleClass('btn-open').toggleClass('btn-close');
				});
			});
			$('.overlay-close1').on('click', function () {
				$(".overlay-login").fadeToggle(200);
				$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
				open = false;
			});
		</script>
		<!-- carousel -->
		<!-- price range (top products) -->
		<script src="js/jquery-ui.js"></script>
		<script>
			//<![CDATA[ 
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [50, 6000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

			}); //]]>
		</script>
		<!-- //price range (top products) -->

		<script src="js/owl.carousel.js"></script>
		<script>
			$(document).ready(function () {
				$('.owl-carousel').owlCarousel({
					loop: true,
					margin: 10,
					responsiveClass: true,
					responsive: {
						0: {
							items: 1,
							nav: true
						},
						600: {
							items: 2,
							nav: false
						},
						900: {
							items: 3,
							nav: false
						},
						1000: {
							items: 4,
							nav: true,
							loop: false,
							margin: 20
						}
					}
				})
			})
		</script>

		<!-- //end-smooth-scrolling -->

		<!-- single -->
		<script src="js/imagezoom.js"></script>
		<!-- single -->
		<!-- script for responsive tabs -->
		<script src="js/easy-responsive-tabs.js"></script>
		<script>
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
		</script>
		<!-- FlexSlider -->
		<script src="js/jquery.flexslider.js"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider1').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->

		<!-- dropdown nav -->
		<script>
			$(document).ready(function () {
				$(".dropdown").hover(
					function () {
						$('.dropdown-menu', this).stop(true, true).slideDown("fast");
						$(this).toggleClass('open');
					},
					function () {
						$('.dropdown-menu', this).stop(true, true).slideUp("fast");
						$(this).toggleClass('open');
					}
				);
			});
		</script>
		<!-- //dropdown nav -->
	<script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->


		<script src="js/bootstrap.js"></script>
		<!-- js file -->
</body>

</html>
