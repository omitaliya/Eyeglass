<?php 
  include "header.php";
  
  if(!isset($_SESSION['semail']))
  {
    header("location:index.php");
  }
  
  else
  {
    $email = $_SESSION['semail'];
    $qry = "SELECT * FROM login_table WHERE email_id='$email'";
    $result = mysqli_query($con,$qry);
    $value = mysqli_fetch_array($result);
    $pass = $value['password'];
    
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
<!-- Main content -->
  <br/>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <h3>To change password you must know your old password.</h3>
	     <div class="card card-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" style="margin-left: 20px; margin-top: 10px">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Password</label>
                  <input type="password" name="old_pass" class="form-control" id="exampleInputEmail1" placeholder="Enter old password" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Enter new password" pattern=.{8,12} required title="Enter 8 to 12 characters" />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Retype New Password</label>
                  <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Re-Enter new password" oninput="check(this)" pattern=.{8,12} required title="Enter 8 to 12 characters" />
          <script language='javascript' type='text/javascript'>
            function check(input) {
              if (input.value != document.getElementById('pass1').value) {
                input.setCustomValidity('Password Must be Matching.');
              } else {
                // input is valid -- reset the error message
                input.setCustomValidity('');
              }
            }
          </script><br>
                <input type="submit" name="submit" class="btn btn-primary" value="Change">
              
              </form>
                </div>
              <!-- /.box-body -->
              
          </div>
        </div>
        </div>
      </section>
		
   
<?php

  if(isset($_POST['submit']))
  {
    
    $old_pass = $_POST['old_pass'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
  
    if($pass==$old_pass)
    {
      if($pass1==$pass2)  
      {
        $update = "UPDATE login_table SET password='$pass1' WHERE email_id='$email'";
        $result1 = mysqli_query($con,$update);
        
        if($result1)
        {
          echo "<script>  alert('Password Changed Successfully!!'); </script>";
          echo ("<script>location.href='changepass.php'</script>");
        }
        else
        {
          echo "<script>  alert('Error occured please try again!!'); </script>";
          echo ("<script>location.href='changepass.php'</script>");
        }
      }
    }
    
    else
    {
      echo "<script>  alert('Old Password Incorrect'); </script>";
      echo ("<script>location.href='changepass.php'</script>");
    }
  }
}

 include 'footer.php';
?>