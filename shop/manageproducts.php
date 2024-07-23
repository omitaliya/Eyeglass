<?php include "header.php";
  include "connection.php";
    if(!isset($_SESSION['semail']))
    {
     header("location:index.php");
       
    }
?>

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <h3>Manage Vehicles</h3>
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
                    <th>Sr No</th>
                    <th>Product Category</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Remaining Quantity</th>
                    <th>Action</th> 
                  </tr>
                </thead>
                <tbody>
                <?php
                  $count=0;
                  $logid=$_SESSION['slogid'];
                  $q2="SELECT * FROM product_detail WHERE l_id='$logid' AND status=1";
                  $ans2=mysqli_query($con,$q2);
                  while($row2=mysqli_fetch_array($ans2))
                  {
                      $pid=$row2['product_id'];
                      $cid=$row2['cat_id'];
                      $pname=$row2['product_name'];
                      $pprice=$row2['product_price']; 
                      $pimage=$row2['product_image']; 
                      $pqnt=$row2['quantity']; 

                      $qry2="SELECT * FROM product_category WHERE cat_id='$cid'";
                      $rt2=mysqli_query($con,$qry2);
                      $value2=mysqli_fetch_array($rt2);
                      $category=$value2['cat_name'];
                  ?>
                  <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $category; ?></td>         
                    <td><?php echo $pname; ?></td>
                    <td><?php echo $pprice; ?></td>
                    <td><?php 
                        if($pimage!="")
                        {
                        ?>
                          <img src="../products/<?php echo $pimage; ?>" class="img-circle" height="50px" width=50px alt="Product Image">
                        <?php
                        }   
                        ?>
                    </td>
                    <td><?php
                        if ($pqnt<=5 AND $pqnt>=1) {
                          echo "<b><font color='red'> Only ".$pqnt." Stock left</font></b>";
                        }
                        elseif ($pqnt==0) {
                          echo "<b><font color='red'> No stock left. Please update the quantity.</font></b>";
                        }
                        else{
                          echo $pqnt;
                        }
                    ?></td>
                    <td>
                      <a href="editproduct.php?pid=<?php echo $pid;?>" class="btn btn-success btn-sm">Edit</a> 
                      <a href="?pid=<?php echo $pid;?>" onclick="return confirm('Are you sure you want to delete');" class="btn btn-sm btn-danger">Delete
                      </a>
                    </td>
                  </tr>
                 </tbody>
              <?php
               }
              if(isset($_GET['pid']))
                  {
                    $sql="UPDATE product_detail SET status=0 WHERE product_id=".$_GET['pid']."";
                    $resultt=mysqli_query($con,$sql);
                    if($resultt)
                    {
                      echo "<script LANGUAGE='JavaScript'>
                            window.alert('Product Deleted Successfully!!');
                            window.location.href='manageproducts.php';
                            </script>";
                    }
                  }    
             ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "footer.php" ?>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
     });
  });
</script>
  