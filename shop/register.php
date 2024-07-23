<?php 
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register</title>
   <link rel='icon' type="image/png" href="">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b> Eyewear Shop Register </b> 
  </div>
  <!-- /.login-logo -->
   <div class="card"  height="300" width="500">
    <div class="card-body register-card-body">
      <!-- <p class="login-box-msg">Register a new member</p> -->

      <form action="addshop.php" method="POST" enctype="multipart/form-data">
                        <div class="register__header text-center mb-lg-5 mb-4">
                            <h3 class="register__title mb-2"> Signup</h3>
                            <p>Create your account here</p>
                        </div>
                        <?php
                        if(isset($_GET['flag'])){
                            if ($_GET['flag']==0){
                                echo "<div class='alert alert-danger'><strong>Sorry Something went wrong please try again!!</strong></div>";
                            }
                            if ($_GET['flag']==1){
                                echo "<div class='alert alert-success'><strong>Thank you for registering with us! You can now proceed to login. <a href='index.php'>Click Here for login.</a> </strong></div>";
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputName" class="input__label">Shop Name</label>
                            <input type="text" name="shopname" class="form-control login_text_field_bg input-style" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter Shop Name" required="" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="input__label">Email address</label>
                            <input type="email" name="uemail" class="form-control login_text_field_bg input-style" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter correct Email " required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="input__label">Password</label>
                            <input type="password" name="upass" class="form-control login_text_field_bg input-style" id="pass1" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="input__label"> Confirm Password</label>
                            <input type="password" name="cpass" class="form-control login_text_field_bg input-style" placeholder="Re-Enter Password" id="checkcpass" oninput="check(this)" required>
                            <script language='javascript' type='text/javascript'>
                              function check(input) {
                                if (input.value != document.getElementById('pass1').value) {
                                  input.setCustomValidity('Password and Confirm Password Must be same!!.');
                                } else {
                                  input.setCustomValidity('');
                                }
                              }
                            </script>
                        </div>
                        <div class="form-group">
                            <label class="input__label"> Phone Number </label>
                            <input type="text" name="uphone" class="form-control login_text_field_bg input-style" placeholder="Enter correct Phone number " required>
                        </div>
                        <div class="form-group">
                            <label class="input__label"> Select Shop Category </label>
                            <select name="shopcat" class="form-control input-style">
                              <option value="a" selected disabled>Select Category</option>
                              <?php 
                                $query="SELECT * FROM shop_category";
                                $result=mysqli_query($con,$query);
                                while($value=mysqli_fetch_array($result))
                                {
                                  $scid=$value['shop_cat_id'];
                                  $cname=$value['shop_cat_name'];
                              ?>
                                  <option value="<?php echo $scid; ?>"><?php echo $cname; ?></option>
                              <?php   
                                }
                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="input__label"> Shop Address </label>
                            <textarea name="uaddress" class="form-control login_text_field_bg input-style" placeholder="Enter Shop Address" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label class="input__label"> Shop Contact No </label>
                            <input type="text" name="shopcontact" class="form-control login_text_field_bg input-style" placeholder="Enter Shop Contact No" required>
                        </div>
                        <div class="form-group custom-file">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="image" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose Shop Profile Photo</label>
                        </div>
                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                            <button type="submit" name="formsubmit" class="btn btn-primary btn-style mt-4">Create Account</button>
                            <p class="signup mt-4">Already have an account? <a href="index.php" class="signuplink">Login</a>
                            </p>
                        </div>
                    </form>
    
     <div class="form">
           
    
     
          </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE Responsiveness -->
<script src="dist/js/responsive.js"></script>
</body>
</html>