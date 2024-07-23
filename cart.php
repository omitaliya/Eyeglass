<?php
include "header.php";
if(!isset($_SESSION['useremail']))
{
    header("location:index.php");
}
else{
	if(isset($_GET['type'])){
		if($_GET['type']=='increase')
		{
			if(isset($_GET['cartid']) && isset($_GET['proid']))
			{
				$cartid = $_GET['cartid'];
				$proid = $_GET['proid'];
				$q1 = "UPDATE cart_table SET quantity = quantity + 1 WHERE cart_id='$cartid'";
				$res1 = mysqli_query($con, $q1);
				$q2 = "UPDATE product_detail SET quantity = quantity - 1 WHERE product_id='$proid'";
				$res2 = mysqli_query($con, $q2);
				if($res1 && $res2){
					echo '<script LANGUAGE="JavaScript">
							window.location.href = "cart.php";
							</script>';
				}
			}
		}
		else if($_GET['type']=='decrease')
		{
			if(isset($_GET['cartid']) && isset($_GET['proid']))
			{
				$cartid = $_GET['cartid'];
				$proid = $_GET['proid'];
				$q1 = "UPDATE cart_table SET quantity = quantity - 1 WHERE cart_id='$cartid'";
				$res1 = mysqli_query($con, $q1);
				$q2 = "UPDATE product_detail SET quantity = quantity + 1 WHERE product_id='$proid'";
				$res2 = mysqli_query($con, $q2);
				if($res1 && $res2){
					echo '<script LANGUAGE="JavaScript">
							window.location.href = "cart.php";
							</script>';
				}
			}
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
						<li>My cart</li>
					</ul>
				</div>
			</div>

		</div>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>
				<div class="checkout-right">
					<?php 
					$ulid = $_SESSION['ulogid'];
					$q1 = "SELECT * FROM cart_table WHERE l_id='$ulid' AND status=0 AND order_id is NULL";
		  			$res = mysqli_query($con, $q1);
		  			$cnt = mysqli_num_rows($res);
		  			if($cnt>0){
		  		?>
				<h4>Your shopping cart contains:
					<span><?php echo $cnt; ?> Products</span>
				</h4>
					</h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$count = 0;
		  				$total_amount = 0;
		  				while($row1 = mysqli_fetch_array($res)){
		  					$proid = $row1['product_id'];
			  				$cartid = $row1['cart_id'];
			  				$cartquan = $row1['quantity'];
			  				$q2 = "SELECT * FROM product_detail WHERE product_id='$proid'";
			  				$res2 = mysqli_query($con, $q2);
			  				$row2 = mysqli_fetch_array($res2);
							$proname = $row2['product_name'];
							$proimg = $row2['product_image'];
							$proprice = $row2['product_price'];
							$proquan = $row2['quantity'];
							$amount = $cartquan * $proprice;
							$total_amount+=$amount;
						?>
							<tr class="rem1">
								<form action="placeorder.php" method="post">
								<td class="invert"><?php echo ++$count; ?></td>
								<td class="invert-image">
									<a href="single.php?pid=<?php echo $proid;?>">
										<img style="width: 100px;height: 100px;" src="products/<?php echo $proimg; ?>" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<?php
												if($cartquan>1){
														echo "<a class='entry value-minus' 
														href='?cartid=$cartid&proid=$proid&type=decrease'>&nbsp;
														</a>";
												}else{
														echo '<a class="entry value-minus" disabled>&nbsp;</a>';
												}
											?>
											<div class="entry value"><span class="span-1"><?php echo $cartquan;?></span></div>
										<?php
											if($proquan>0){
												echo "<a class='entry value-plus' href='?cartid=$cartid&proid=$proid&type=increase'>&nbsp;
												</a>";
											}else{
										?>
										<a class="entry value-plus" 
											onclick="return confirm('You cannot add more quantity!!!');">&nbsp;
										</a>
										<?php
											}
										?>
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $proname; ?></td>
								<td class="invert"><?php echo $amount; ?></td>
								<td class="invert">
									<div class="rem">
										<a href="remove.php?proid=<?php echo $proid;?>&cartid=<?php echo $cartid;?>&cqnt=<?php echo $cartquan;?>"><div class="close1"></div></a>
									</div>
								</td>
							</tr>
						<?php }
							$_SESSION['total_amount'] = $total_amount;
						?>
						</tbody>
					</table>
				</div>
				<div class="checkout-left row">
					
					<div class="col-md-8 address_form">
						
						<div class="checkout-right-basket">
							<label>Total Amount: Rs. <?php echo $total_amount;?> </label>&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="placeorder.php">Make a Payment </a>
						</div>
					</div>

					<div class="clearfix"> </div>

				</div>
<?php
					} 
					else{
						echo '<div class="alert alert-danger" role="alert" id="my-cart-empty-message">Your cart is empty</div>';
					}

				?>
			</div>

		</div>
	</section>
	<!-- //welcome -->
	<!-- //about page -->
<?php include 'footer.php'; ?>