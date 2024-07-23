<?php 
include "header.php"; 
include "connection.php";
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <h3>Manage Shops</h3>
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
                    <th>Image</th>
                    <th>Shop Name</th>
                    <th>Shop Category</th>
                    <th>Shop Address</th>
                    <th>Shop Contact</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $query="SELECT * FROM login_table WHERE status=1 AND role=3 ORDER BY l_id DESC";
                  $result=mysqli_query($con,$query);
                  $count=1;
                  while($value=mysqli_fetch_array($result))
                  {
                    $lid=$value['l_id'];
                    $query1="SELECT * FROM shop_table WHERE l_id='$lid'";
                    $result1=mysqli_query($con,$query1);
                    $value1=mysqli_fetch_array($result1);
                    $name=$value1['shop_name'];
                    $dp=$value1['shop_image'];
                    $sadd=$value1['shop_address'];
                    $scat=$value1['shop_cat_id'];
                    $scon=$value1['shop_contactno'];

                    $query2="SELECT * FROM shop_category WHERE shop_cat_id='$scat'";
                    $result2=mysqli_query($con,$query2);
                    $value2=mysqli_fetch_array($result2);
                    $cname=$value2['shop_cat_name'];
                  ?>
                  <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php 
                        if($dp){
                        ?>
                          <img class="avatar user-thumb" height="60px" width="60px" src="../shop/photos/<?php echo $dp; ?>" alt="avatar">
                      <?php
                        }
                      ?>
                    </td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $cname;?></td>
                    <td><?php echo $sadd;?></td>
                    <td><?php echo $scon;?></td>
                    <td><a href="?lid=<?php echo $lid;?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-xs">Delete</a> 
                    </td>
                  </tr>
                 </tbody>
              <?php
               }
              if(isset($_GET['lid']))
              {
               
                $sql="DELETE FROM shop_table WHERE l_id=".$_GET['lid']."";
                $resultt=mysqli_query($con,$sql);
                $sql2="DELETE FROM login_table WHERE l_id=".$_GET['lid']."";
                $resultt2=mysqli_query($con,$sql2);

                if($resultt && $resultt2)
                {
                  echo "<script LANGUAGE='JavaScript'>
                        window.alert('Shop Deleted Successfully!!');
                        window.location.href='manageshops.php';
                        </script>";
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