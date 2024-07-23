<?php
include "header.php";
if(!isset($_SESSION['useremail']))
{
    echo "<script LANGUAGE='JavaScript'>
	window.location.href='index.php';
	</script>";
}

if(isset($_SESSION['total_amount'])){
	$tamount = $_SESSION['total_amount'];
	$ulid = $_SESSION['ulogid'];
	if(isset($_POST['formsubmit']))
	{
			$paytype = $_POST['paytype'];
			$add = $_POST['add'];
			$q1 = "INSERT INTO product_order(l_id, total_amount, address, payment_status, order_status) VALUES ('$ulid', '$tamount', '$add', '$paytype', 1)";
			$res1 = mysqli_query($con, $q1);

			$q2 = "SELECT * FROM product_order WHERE l_id='$ulid' AND order_status=1 ORDER BY order_id DESC LIMIT 1";
			$res2 = mysqli_query($con, $q2);
			$row2 = mysqli_fetch_array($res2);
			$orderid = $row2['order_id'];

			$q3 = "SELECT * FROM cart_table WHERE l_id='$ulid' AND status=0";
			$res3 = mysqli_query($con, $q3);
			$count1 = mysqli_num_rows($res3);
			$count2 = 0;
			while($row3 = mysqli_fetch_array($res3)){
				$cartid = $row3['cart_id'];
				$q5 = "UPDATE cart_table SET order_id='$orderid',status=1 WHERE cart_id='$cartid'";
				$res5 = mysqli_query($con, $q5);
				if($res5){
					++$count2;
				}
			}

			if($res1 && ($count1==$count2)){
				echo "<script LANGUAGE='javascript'>
						window.alert('Your Order Placed Successfully!!!');
						window.location.href='cart.php';
					  </script>";
				unset($_SESSION['total_amount']);
			}
		}
}
?>
<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">

					<ul class="short">
						<li>
							<a href="index.php">Home</a>
							<i>|</i>
						</li>
						<li>Payment </li>
					</ul>
				</div>
			</div>

		</div>
		<!--//banner -->
		<!--// header_top -->
		<!--Payment-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop px-lg-4 px-3">
					<h3 class="tittle-w3layouts my-lg-4 mt-3">Payment </h3>
					<!--/tabs-->
					<div class="responsive_tabs">
						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li>Cash on delivery (COD)</li>
								
							</ul>
							<div class="resp-tabs-container">
								<!--/tab_one-->
								<div class="tab1">
									<div class="pay_info">
										<div class="vertical_post check_box_agile">
											<div class="contact-form wthree">
					<form method="POST">
						<div class="form-group">
							<label>Select Payment Method:</label><br>
							<select style="width:99%;height:2rem;outline:none;padding-left:1rem;border: 1px solid #CECECE;font-size: 13px;color: #5b5b5b;border-radius: 2px;" name="paytype" id="paytype" style="<?php echo $style;?>" required>
								<option value="0" selected disabled>Select Payment Type</option>
								<option value="1">Online</option>
								<option value="2">Cash On Delivery</option>
							</select>
						</div>
						<div class="form-group">
							<label>Delivery Address:</label><br>
							<textarea style="width:99%;height:5rem;outline:none;padding-left:1rem;border: 1px solid #CECECE;font-size: 13px;color: #5b5b5b;border-radius: 2px;" name="add" placeholder="Enter Delivery Address" row="3"></textarea>
						</div>
						<button type="submit" class="btn btn-dark submit mt-4"  name="formsubmit">Place Order</button>
					</form>
				</div>
										</div>

									</div>
								</div>
								
								
							</div>
						</div>
					</div>
					<!--//tabs-->
				</div>

			</div>
			<!-- //payment -->
		</section>
		<!--//Payment-->
		
		<?php 
					include "footer.php";
			 ?>
			 <script>
			googles.render();

			googles.cart.on('googles_checkout', function (evt) {
				var items, len, i;

				if (this.subtotal() > 0) {
					items = this.items();

					for (i = 0, len = items.length; i < len; i++) {}
				}
			});
		</script>
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
		<!-- easy-responsive-tabs -->
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

		<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
		<link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function () {
				var creditly = Creditly.initialize(
					'.creditly-wrapper .expiration-month-and-year',
					'.creditly-wrapper .credit-card-number',
					'.creditly-wrapper .security-code',
					'.creditly-wrapper .card-type');

				$(".creditly-card-form .submit").click(function (e) {
					e.preventDefault();
					var output = creditly.validate();
					if (output) {
						// Your validated credit card output
						console.log(output);
					}
				});
			});
		</script>
		<!-- //credit-card -->
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


		<!-- //smooth-scrolling-of-move-up -->
		<script src="js/bootstrap.js"></script>
		
