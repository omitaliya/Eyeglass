<?php
include "header.php";
if(!isset($_SESSION['useremail']))
{
    header("location:index.php");
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
						<li>My Orders</li>
					</ul>
				</div>
			</div>

		</div>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Orders Placed </h3>
				<div class="checkout-right">					
					<table class="timetable_sub">
						<thead>
	                <tr>
	                  <th>Sr. No</th>
	                  <th>Ordered Products</th>
	                  <th>Order Date</th>
	                  <th>Estimated Delivery Date</th>
	                  <th>Total Amount</th>
	                  <th>Order Status</th>
	                </tr>
	              </thead>
	              <tbody>
	                <?php
	                	$ulid = $_SESSION['ulogid'];
	                    $q1 = "SELECT * FROM product_order WHERE l_id='$ulid' AND order_status=1 ORDER BY order_id DESC";
	                    $res1 = mysqli_query($con, $q1);
	                    $count = 0;
	                    while($row1 = mysqli_fetch_array($res1)){
	                        $orderid = $row1['order_id'];
	                        $odate = $row1['timestamp'];
	                        $tamnt = $row1['total_amount'];
	                        $today = date('Y-m-d');
	                        $odate = date('Y-m-d',strtotime($odate));
	                        $ddate= date('Y-m-d', strtotime($odate. ' + 6 days'));

	                        $q2 = "SELECT * FROM cart_table WHERE order_id='$orderid'";
	                        $res2 = mysqli_query($con, $q2);
	                ?>
	                    <tr>
	                        <td><?php echo ++$count;?></td>
	                        <td>
	                          <?php
	                            while($row2 = mysqli_fetch_array($res2)){
	                            $cartid = $row2['cart_id'];
	                            $proid = $row2['product_id'];
	                            $quan = $row2['quantity'];
	                            $ostatus = $row2['status'];

	                            $q4 = "SELECT * FROM product_detail WHERE product_id='$proid'";
	                            $res4 = mysqli_query($con, $q4);
	                            $row4 = mysqli_fetch_array($res4);
	                            $proname = $row4['product_name'];
	                            $proimg = $row4['product_image'];
	                            $proprice = $row4['product_price'];
	                            $price = $quan * $proprice;

	                            echo "<img style='width: 100px;height: 100px;' src='products/$proimg'><span style='margin-right:0.5rem;'>$proname</span><br><span style='margin-right:0.5rem;'><b>Quantity:</b> $quan</span><b>Price:</b> Rs. $proprice<br/>";
	                           	if ($ostatus==2) {
	                              		echo "<font color='red'>Sorry your order $proname is cancelled by store.</font><br/>";
	                              }
	                          }
	                          ?>
	                        </td>
	                        <td><?php echo $odate;?></td>
	                        <td><?php echo $ddate;?></td>
	                        <td>Rs. <?php echo $tamnt;?></td>
	                        <td>
	                            <?php
	                              $today=strtotime($today);
	                              $odate=strtotime($odate);
	                              $ddate=strtotime($ddate);
	                              if($today>$ddate){
	                                  	echo "<font color='green'>Order Delivered</font>";
	                              }
	                              else{
	                                  	echo "<font color='red'>Order will be delivered soon</font>";
	                              }
	                            ?>
	                        </td>
	                    </tr>
	                <?php
	                    }
	                ?>
	              </tbody>
					</table>
				</div>
			
			</div>

		</div>
	</section>
	<!-- //welcome -->
	<!-- //about page -->
<?php include 'footer.php'; ?>