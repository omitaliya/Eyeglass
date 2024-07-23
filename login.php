<?php
  include "connection.php";
  include "header.php";
  ?>
    <!-- banner -->
    <div class="banner_inner">
      <div class="services-breadcrumb">
        <div class="inner_breadcrumb">

          <ul class="short">
            <li>
              <a href="index.php">Home</a>
              <i>|</i>
            </li>
            <li>Login</li>
          </ul>
        </div>
      </div>

    </div>
    <!--//banner -->
  </div>
  <!--// header_top -->
  <!-- top Products -->
  <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
      <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Login</h3>
      <div class="inner_sec">
        <!-- <p class="sub text-center mb-lg-5 mb-3">We love to discuss your idea</p> -->
        <div class="address row" style="margin-left: 400px;">
         
          <div class="col-lg-12 address-grid" >
        <div class="contact_grid_right">
          <form action="login.php" method="post">
            <div class="row contact_left_grid">
              <div class="col-md-6 con-left">
                <div class="form-group">
                  <label class="my-1">Email</label>
                  <input class="form-control" type="email" name="uemail" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="pass" name="upass" placeholder="" required="">
                </div>
                <div class="form-group">
                 
                   <input class="form-control" type="submit" value="Submit" name="submit">
                </div>
              </div>
            
            </div>
          </form>
        </div> </div>
          
        </div>
      </div>
    </div>
  </section>
  <?php 
  if(isset($_POST['submit'])){
  $log = strtolower($_POST['uemail']);
  $pass=$_POST['upass'];
  $qry = "SELECT * FROM login_table WHERE (email_id='$log' AND password='$pass' AND role=2) OR (phone_no='$log' AND password='$pass' AND role=2)";
  $result = mysqli_query($con,$qry);
  $row=mysqli_fetch_array($result);
  $lid=$row['l_id'];
  $email=$row['email_id'];
  $pwd=$row['password'];
  $role=$row['role'];
  $phone=$row['phone_no'];
  $as=$row['status'];

  if($email==$log OR $phone==$log){
      if($pwd==$pass){
        $_SESSION['pass']=$pwd;
        if($role==2)
        {
          $_SESSION['useremail']=$email;
          $_SESSION['ulogid']=$lid;
          $_SESSION['userphone']=$phone;
        echo "<script LANGUAGE='JavaScript'>
            window.alert('Login Successfull');
            window.location.href='index.php';
            </script>";         
        }
      }  
    }
    else
    {
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Incorrect Email or Password Please Try Again!!');
            window.location.href='login.php';
            </script>";
    }
}
          include "footer.php";
       ?>