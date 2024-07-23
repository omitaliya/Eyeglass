<?php 
include "header.php"; 
include "connection.php";
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <h3>View Feedbacks</h3>
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
                    <th>User Name</th>
                    <th>Ratings</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                  $query="SELECT * FROM feedback ORDER BY feed_id DESC";
                  $result=mysqli_query($con,$query);
                  $count=1;
                  while($value=mysqli_fetch_array($result))
                  {
                    $lid=$value['l_id'];

                    $qry="SELECT * FROM detail_table WHERE l_id='$lid'";
                    $rt=mysqli_query($con,$qry);
                    $value2=mysqli_fetch_array($rt);
                  ?>
                  <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $value2['name'];?></td>
                  <td><?php for($i=1; $i<=5; $i++) { 
                      if ($value['ratings'] >= 1) { 
                        echo '<img src="photos/Star (Full).png" width="20"/>';
                        $value['ratings']--;
                      }else {
                          echo '<img src="photos/Star (Empty).png" width="20"/>';
                        }
                  }?></td>
                  <td><?php echo $value['comment'];?></td>
                  <td><a href="?fid=<?php echo $value['feed_id'];?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-xs">Delete</a> 
                  </td>
                  </tr>
                </tbody>
                <?php
                }
                  if(isset($_GET['fid']))
                  {
                    $sql="DELETE FROM feedback WHERE feed_id=".$_GET['fid']."";
                    $resultt=mysqli_query($con,$sql);
                    if($resultt)
                    {
                      echo "<script LANGUAGE='JavaScript'>
                        window.alert('Feedback Deleted Successfully!!');
                        window.location.href='viewfeedback.php';
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