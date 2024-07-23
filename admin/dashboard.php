<?php 
  include "header.php";
  include "connection.php";

    $q1="SELECT * FROM feedback";
    $ans1=mysqli_query($con,$q1);
    $cnt1=mysqli_num_rows($ans1);

    $q2="SELECT * FROM login_table WHERE status=1 AND role=3";
    $ans2=mysqli_query($con,$q2);
    $cnt2=mysqli_num_rows($ans2);

    $q4="SELECT * FROM login_table WHERE status=1 AND role=2";
    $ans4=mysqli_query($con,$q4);
    $cnt4=mysqli_num_rows($ans4);

    $q3="SELECT * FROM product_detail";
    $ans3=mysqli_query($con,$q3);
    $cnt3=mysqli_num_rows($ans3);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $cnt1;?></h3>
                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $cnt2;?></h3>
                <p>Total Shops</p>
              </div>
              <div class="icon">
                <i class="fas fa-bicycle"></i>
              </div>
             </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $cnt3;?></h3>
                <p>Total Products</p>
              </div>
              <div class="icon">
                <i class="fas fa-bicycle"></i>
              </div>
             </div>
          </div>
  <!-- Content Wrapper. Contains page content -->        
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
 <?php include "footer.php"; ?>