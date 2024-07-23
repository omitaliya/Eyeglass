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
                <thead>
                <tr align="center">
                  <th>Sr No.</th>
                  <th>Vehicle Name</th>
                  <th>Vehicle Number</th>
                  <th>Veicle Price</th>
                  <th>Vehicle Image</th>
                  <th>Action</th> 
                </tr>
                </thead>
                <?php
                $count=0;
                  $lid=$_SESSION['lid'];
                  $q2="SELECT * FROM vehicle_detail_table WHERE l_id='$lid'";
                  $ans2=mysqli_query($con,$q2);
                  while($row2=mysqli_fetch_array($ans2))
                  {
                      $vid=$row2['vehicle_id'];
                      $vname=$row2['vehicle_name'];
                      $vnumber=$row2['vehicle_number'];
                      $vprice=$row2['vehicle_price_per_hour']; 
                      $vimage=$row2['vehicle_image']; 

                  ?>
                  <tr align="center">
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $vname; ?></td>         
                    <td><?php echo $vnumber; ?></td>
                    <td><?php echo $vprice; ?></td>
                    <td><?php 
                        if($vimage!="")
                        {
                        ?>
                          <img src="../photos/<?php echo $vimage; ?>" class="img-circle" height="50px" width=50px alt="Vehicle Image">
                        <?php
                        }   
                        ?>
                    </td>
                    <td>
                      <a href="editvehicle.php?vid=<?php echo $vid;?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a> 
                      <a href="?vid=<?php echo $vid;?>" onclick="return confirm('Are you sure you want to delete');" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }
                  if(isset($_GET['vid']))
                  {
                   
                    $sql="DELETE vehicle_detail_table WHERE vehicle_id=".$_GET['vid']."";
                    $resultt=mysqli_query($con,$sql);
                    if($resultt)
                    {
                      echo "<script LANGUAGE='JavaScript'>
                            window.alert('Vehicle Details Deleted Successfully!!');
                            window.location.href='managevehicle.php';
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
  