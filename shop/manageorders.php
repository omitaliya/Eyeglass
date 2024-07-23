<?php 
include "header.php"; 
include "connection.php";
?>
<div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <h3>Manage Orders</h3>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!--content-header-->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped text-center">
                
                <thead class="text-capitalize">
                  <tr>
                    <th >Sr No</th>
                    <th >User Name</th>
                    <th >Product Image</th>
                    <th >Product Name</th>
                    <th >Product Price</th>
                    <th >Order Quanity</th>
                    <th >Delivery Address</th>
                    <th >Payment Status</th>
  				          <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $logid=$_SESSION['slogid'];
                	$query="SELECT * FROM cart_table WHERE status=1 AND shop_l_id='$logid' ORDER BY cart_id DESC";
                	$result=mysqli_query($con,$query);
                  $count=1;
                	while($value=mysqli_fetch_array($result))
                	{
                    $cartid=$value['cart_id'];
                    $lid=$value['l_id'];
                    $pid=$value['product_id'];
                    $oid=$value['order_id'];
                    $qnt=$value['quantity'];

                    $query1="SELECT * FROM product_detail WHERE product_id='$pid'";
                    $result1=mysqli_query($con,$query1);
                    $value1=mysqli_fetch_array($result1);
                    $pname=$value1['product_name'];
                    $pprice=$value1['product_price'];
                    $pimg=$value1['product_image'];

                    $query2="SELECT * FROM product_order WHERE order_id='$oid'";
                    $result2=mysqli_query($con,$query2);
                    $value2=mysqli_fetch_array($result2);
                    $uadd=$value2['address'];
                    $upay=$value2['payment_status'];

                    $query3="SELECT * FROM detail_table WHERE l_id='$lid'";
                    $result3=mysqli_query($con,$query3);
                    $value3=mysqli_fetch_array($result3);
                    $uname=$value3['name'];
                	?>
              		<tr align="center">
                		<td><?php echo $count++; ?></td>
                    <td><?php echo $uname;?></td>
                    <td><?php 
                        if($pimg){
                        ?>
                          <img class="avatar user-thumb" height="60px" width="60px" src="../products/<?php echo $pimg; ?>" alt="avatar">
                      <?php
                        }
                      ?>
                    </td>
                    <td><?php echo $pname;?></td>
                    <td><?php echo 'Rs. '.$pprice;?></td>
                    <td><?php echo $qnt;?></td>
                    <td><?php echo $uadd;?></td>
                    <td><?php 
                      if ($upay==1) {
                          echo "Online";
                      }
                      elseif ($upay==2) {
                          echo "COD";
                      }
                    ?></td>
                		<td><a href="?cid=<?php echo $cartid;?>&pid=<?php echo $pid;?>&qnt=<?php echo $qnt;?>" onclick="return confirm('Are you sure you want to cancel this order?');" class="btn btn-danger btn-sm">Cancel Order</a> 
                    </td>
          				</tr>
                 </tbody>
          		<?php
          	   }
              if(isset($_GET['cid']) && isset($_GET['pid']) && isset($_GET['qnt']))
              {
                $sql="UPDATE cart_table SET status=2 WHERE cart_id=".$_GET['cid']."";
                $resultt=mysqli_query($con,$sql);
                if($resultt)
                {
                  $qnt1=$_GET['qnt'];
                  $sql2="UPDATE product_detail SET quantity=quantity+'$qnt1' WHERE product_id=".$_GET['pid']."";
                  $result2=mysqli_query($con,$sql2);
                  if ($result2) {
                    echo "<script LANGUAGE='JavaScript'>
                        window.alert('Order Deleted Successfully!!');
                        window.location.href='manageorders.php';
                        </script>";
                  }
                }
              }   
	           ?>
              </table>
          </div>
        </div>
      </div>
            <!-- /.box-body -->
      <!-- /.row (main row) -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php';
?>
