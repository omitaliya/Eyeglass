<?php

include "header.php";
if(!isset($_SESSION['semail']))
{
  header("location:index.php");
}
  
else
{
  $email = $_SESSION['semail'];
  $query="SELECT * FROM login_table WHERE email_id='$email'";
  $result2 = mysqli_query($con,$query);
  $ans = mysqli_fetch_array($result2);
  $lid= $ans['l_id'];
  $phone= $ans['phone_no'];

  $query2="SELECT * FROM shop_table WHERE l_id='$lid'";
  $result3 = mysqli_query($con,$query2);
  $value3 = mysqli_fetch_array($result3);
  $name= $value3['shop_name'];
  $address= $value3['shop_address'];
  $img = $value3['shop_image'];
  $contact = $value3['shop_contactno'];
}
  
    
?>
<?php
  
  if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $address=$_POST['address'];
      $cno=$_POST['contactno'];

      $filename=addslashes($_FILES['image']['name']);
      $tmpname=addslashes($_FILES['image']['tmp_name']);
      date_default_timezone_set("Asia/Calcutta");
      $date = date('Y-m-d H:i:s');
      $iname=strtotime(date('Y-m-d H:i:s'));
      $extension=pathinfo($filename, PATHINFO_EXTENSION);
      $image_path= $iname.".".$extension;

      $q4="UPDATE shop_table SET shop_name='$name',shop_address='$address',shop_contactno='$cno' WHERE l_id='$lid'";
      $res4=mysqli_query($con,$q4); 

      if($filename)
      {
        move_uploaded_file($_FILES["image"]["tmp_name"],"photos/".$image_path);
        $q5="UPDATE shop_table SET shop_image='$image_path' WHERE l_id=$lid";
        $res5=mysqli_query($con,$q5);
      }
      if ($res4 || $res5){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Profile Updated Successfully');
                  window.location.href='editprofile.php';
                  </script>"); 
      }
  }       
?>

  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profile
      </h1>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
          <div class="container-fluid">
            <div class="card card-warning">
              <div class="row">
                <div class="col-md-12">
                  <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Shop Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Enter Store name ..." required />
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter Email ..." disabled>
                      </div>
                      <div class="form-group">
                        <label>Contact No</label>
                        <input type="text" name="phn" class="form-control" placeholder="Enter Phone no ..." pattern="([6|7|8|9]{1})([0-9]{9})" oninput="setCustomValidity('')" title='Enter 10 Digit mobile number starting with 7 or 8 or 9' value="<?php echo $phone; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label>Shop Contact No</label>
                        <input type="text" name="contactno" class="form-control" placeholder="Enter Aletrnate Phone no ..." pattern="([6|7|8|9]{1})([0-9]{9})" oninput="setCustomValidity('')" title='Enter 10 Digit mobile number starting with 7 or 8 or 9' value="<?php echo $contact; ?>"/>
                      </div>
                  
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3"><?php echo $address; ?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Store Pic</label>
                        <input type="file" id="profile-img" name="image" accept="image/png,image/jpg,image/jpeg" class="form-control" placeholder="">
                        <div id="myDiv"> 
                          <!--<p class="square"> -->
                          <img src="/photos/<?php echo $img; ?>" id="profile-img-tag" alt="Profile Pic" width="200px" height="200px" style="border:5px solid #ffffff; background-color: #ffffff;" />

                          <script type="text/javascript">
                            function readURL(input) {
                              if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                
                                reader.onload = function (e) {
                                  $('#profile-img-tag').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                              }
                            }
                            $("#profile-img").change(function(){
                              readURL(this);
                            });
                          </script>
                        </div>  
                      </div>
                    </div>
                    <div class="card-footer" align="center">
                      <button type="submit" name="submit" class="btn btn-primary">Modify</button>
                    </div>
               </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->
    <!-- /.content -->
  
  </div>
  </section>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
  </div>
</div>
<?php
  include "footer.php";
?>