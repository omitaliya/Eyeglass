<?php 
  include "connection.php";
  session_start();
    if(!isset($_SESSION['aemail']))
    {
       header("location:index.php");
    }
    else
    {
      $email = $_SESSION['aemail'];
      $phone=$_SESSION['aphone'];

      $q1 = "SELECT * FROM login_table WHERE email_id='$email' OR phone_no=$phone";
      $ans1 = mysqli_query($con,$q1);
      $row1 = mysqli_fetch_array($ans1);
      $lid = $row1['l_id'];
      $_SESSION['lid'] = $lid;
      $currpass = $row1['password'];
      

      $q2 = "SELECT * FROM detail_table WHERE l_id='$lid'";
      $ans2 = mysqli_query($con,$q2);
      $row2 = mysqli_fetch_array($ans2);
      $n = $row2['name'];
      $image=$row2['dp'];

 }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    Admin | Dashboard</title>
   <link rel='icon' type="image/png" href="">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">

  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <!-- Bootstrap -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="photos/<?php echo $image; ?>" class="user-image" alt="Admin Image">
              <span class="hidden-xs"> <?php echo ucwords($n); ?> </span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
              <img src="photos/<?php echo $image; ?>" class="img-circle" alt="Admin Image">
              <p>
                  <?php echo ucwords($n); ?>
                  <small><?php echo $email ?></small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-md-8">
                    <a href="changepass.php">Change Password</a>
                  </div>
                  <div class="col-md-8">
                    <a href="editprofile.php">Edit Profile</a>
                  </div>
                </div>
              </li>
              <li>
                <div align="center">
                  <a href="logout.php" class="btn btn-primary">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Company Logo" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="editprofile.php">
              <img src="photos/<?php echo $image; ?>" class="img-circle elevation-2" alt="Admin Image">
          </a>
        </div>
        <div class="info">
          <a href="dashboard.php" class="d-block"><?php echo ucwords($n); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
             <li class="nav-item">
            <a href="dashboard.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "dashboard.php")?"nav-link active":"nav-link"; ?>">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Dashboard
              </p>
            </a>
            </li>
            <li class="nav-item has-treeview">
            <a href="#" class="<?php if((basename($_SERVER['PHP_SELF']) == "addshopcat.php") || (basename($_SERVER['PHP_SELF']) == "managelocation.php")){
                  echo "nav-link active";
                }
                else{
                  echo "nav-link";
                }?>">
              <i class="nav-icon far fa-building"></i>
              <p>
                Shop Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addshopcat.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "addshopcat.php")?"nav-link active":"nav-link"; ?>">
                  <i class="nav-icon fa fa-plus "></i>
                  <p>Add Shop Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manageshopcat.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "manageshopcat.php")?"nav-link active":"nav-link"; ?>">
                  <i class="nav-icon fa fa-list "></i>
                  <p>Manage Shop Category</p>
                </a>
              </li>
            </ul>
             </li> 
            <li class="nav-item has-treeview">
            <a href="#" class="<?php if((basename($_SERVER['PHP_SELF']) == "addshopcat.php") || (basename($_SERVER['PHP_SELF']) == "manageshopcat.php")){
                  echo "nav-link active";
                }
                else{
                  echo "nav-link";
                }?>">
              <i class="nav-icon fas fa-glasses"></i>
              <p>
                Product Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addproductcat.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "addproductcat.php")?"nav-link active":"nav-link"; ?>">
                  <i class="nav-icon fa fa-plus "></i>
                  <p>Add Product Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manageproductcat.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "manageproductcat.php")?"nav-link active":"nav-link"; ?>">
                  <i class="nav-icon fa fa-list "></i>
                  <p>Manage Product Brands</p>
                </a>
              </li>
            </ul>
             </li>
           
             <li class="nav-item">
            <a href="manageshops.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "manageshops.php")?"nav-link active":"nav-link"; ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Manage shops
              </p>
            </a>
            </li>
             <li class="nav-item">
            <a href="manageusers.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "manageusers.php")?"nav-link active":"nav-link"; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Users
              </p>
            </a>
            </li>
             <li class="nav-item">
            <a href="viewfeedback.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "viewfeedback.php")?"nav-link active":"nav-link"; ?>">
              <i class="nav-icon fas fa-eye" ></i>
              <p>
                View feedback
              </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="logout.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == "logout.php")?"nav-link active":"nav-link"; ?>">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </div><!-- /.container-fluid -->
  </div>
  </aside>
  <!-- Control Sidebar -->