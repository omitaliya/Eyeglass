<?php
include "connection.php";
session_start();

if(isset($_GET['proid'])){
		$proid = $_GET['proid'];
		$cartid = $_GET['cartid'];
		$cqnt = $_GET['cqnt'];
		$ulid = $_SESSION['ulogid'];

		$q1 = "DELETE FROM cart_table WHERE l_id='$ulid' AND product_id='$proid' AND cart_id='$cartid'";
		$res1 = mysqli_query($con, $q1);

		$q2 = "UPDATE product_detail SET quantity = quantity + $cqnt WHERE product_id='$proid'";
		$res2 = mysqli_query($con, $q2);

		if($res1){
			echo "<script LANGUAGE='JavaScript'>
					window.alert('Product Removed From Your Cart!!');
					window.location.href='cart.php';
					</script>";
		}
}
?>