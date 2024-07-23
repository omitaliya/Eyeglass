<?php
include "connection.php";
session_start();


if(isset($_GET['proid']) && isset($_GET['slid'])){
	$proid = $_GET['proid'];
	$slid = $_GET['slid'];
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