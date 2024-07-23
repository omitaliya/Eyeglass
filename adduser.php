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
            <li>Sign up</li>
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
      <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Sign up</h3>
      <div class="inner_sec">
        <!-- <p class="sub text-center mb-lg-5 mb-3">We love to discuss your idea</p> -->
        <div class="address row" style="margin-left: 400px;">
         
          <div class="col-lg-12 address-grid" >
        <div class="contact_grid_right">
          <form action="adduser.php" method="post">
            <div class="row contact_left_grid">
              <div class="col-md-6 con-left">
                <div class="form-group">
                  <label class="my-1">Name</label>
                  <input class="form-control" type="text" name="uname" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" type="email" name="uemail" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="password" name="upass" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input class="form-control" type="phone" name="uphone" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label>DOB</label>
                  <input class="form-control" type="date" name="bdate" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label>Adress</label>
                  <input class="form-control" type="text" name="uaddress" placeholder="" required="">
                </div>
                <div class="form-group">
                  <label>Dp</label>
                  <input class="form-control" type="file" name="image" accept='image/*' required="">
                </div><br>
                <div class="form-group">
                   <input class="form-control" type="submit" value="Sign up" name="formsubmit">
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
  

  if(isset($_POST['formsubmit'])){
    $uname=$_POST['uname'];
    $email=$_POST['uemail'];
    $pass=$_POST['upass'];
    $phone=$_POST['uphone'];
    $dob=$_POST['bdate'];
    $address=$_POST['uaddress'];
    $role=2;
    $status=1;
    $filename=addslashes($_FILES['image']['name']);
    $tmpname=addslashes($_FILES['image']['tmp_name']);

    date_default_timezone_set("Asia/Kolkata");
    $iname=strtotime(date('Y-m-d H:i:s'));
    $extension=pathinfo($filename, PATHINFO_EXTENSION);
    $image_path= $iname.".".$extension;
        
    if($filename){
        move_uploaded_file($_FILES["image"]["tmp_name"],"photos/".$image_path);
    }

    $q1="INSERT INTO login_table(email_id,phone_no,password,role,status) VALUES ('$email',$phone,'$pass','$role','$status')";
    $ans1= mysqli_query($con,$q1);

    $q3="SELECT * FROM login_table WHERE email_id='$email'";
    $ans3=mysqli_query($con,$q3);
    $row3=mysqli_fetch_array($ans3);
    $lid=$row3['l_id'];
        
    $q2="INSERT INTO detail_table(l_id,name,dob,address,dp) VALUES ('$lid','$uname','$dob','$address','$image_path')";
    $ans2= mysqli_query($con,$q2);

    if($ans1 && $ans2){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Thank you for registering with us!! You can now proceed to login!');
                window.location.href='login.php';
                </script>");
  }
    else{
      echo ("<script LANGUAGE='JavaScript'>
              window.alert('Error occured something went wrong!!');
             window.location.href='adduser.php';
            </script>");
    }
}

  include "footer.php";

?>