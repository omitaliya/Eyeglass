<?php 
include "header.php"; 
include "connection.php";
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <h3>Manage Shop </h3>
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
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                  $query="SELECT * FROM shop_category ORDER BY shop_cat_id";
                  $result=mysqli_query($con,$query);
                  $count=1;
                  while($value=mysqli_fetch_array($result))
                  {
                    $scid=$value['shop_cat_id'];
                    $cname=$value['shop_cat_name'];
                  ?>
                  <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $cname;?></td>
                  <td><a href="editshopcat.php?scid=<?php echo $scid;?>" onclick="return confirm('Are you sure you want to edit?');" class="btn btn-success btn-xs">Edit</a>
                    <a href="?scid=<?php echo $scid;?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-xs">Delete</a> 
                  </td>
                  </tr>
                </tbody>
                <?php
                }
                  if(isset($_GET['scid']))
                  {
                    $sql="DELETE FROM shop_category WHERE shop_cat_id=".$_GET['scid']."";
                    $resultt=mysqli_query($con,$sql);
                    if($resultt)
                    {
                      echo "<script LANGUAGE='JavaScript'>
                        window.alert('Shop Category Deleted Successfully!!');
                        window.location.href='manageshopcat.php';
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