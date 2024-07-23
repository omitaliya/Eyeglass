<?php
  include "header.php";
  include "connection.php";
   
  if(!isset($_SESSION['semail']))
  {
    header("location:index.php");
  }

  else{
    if(isset($_POST['formsubmit']))
    {
      $lid=$_SESSION['lid'];
      $vname=$_POST['vname'];
      $vdes=$_POST['vdes'];
      $vprice=$_POST['vprice'];
      $vnumber=$_POST['vnumber'];

      $filename=addslashes($_FILES['image']['name']);
      $tmpname=addslashes($_FILES['image']['tmp_name']);
      date_default_timezone_set("Asia/Calcutta");
      $date = date('Y-m-d H:i:s');
      $iname=strtotime(date('Y-m-d H:i:s'));
      $extension=pathinfo($filename, PATHINFO_EXTENSION);
      $image_path= $iname.".".$extension;

      if($filename)
      {
        move_uploaded_file($_FILES["image"]["tmp_name"],"../photos/".$image_path);
      }

      $q4="INSERT INTO vehicle_detail_table(l_id,vehicle_name,vehicle_image,vehicle_description,vehicle_number,vehicle_price_per_hour) VALUES ('$lid','$vname','$image_path','$vdes','$vnumber','$vprice')";
      $res4=mysqli_query($con,$q4); 

      if ($res4){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Vehicle Details Added Successfully');
                  window.location.href='addvehicle.php';
                  </script>"); 
      }
    }  
  }
?>

  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Vehicle Details
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
                <div class="form-group">
                  <label>Vehicle Name <font style="color: red">*</font></label>
                  <input type="text" name="vname" class="form-control" placeholder="Enter Name" required />
                </div> 
                <div class="form-group">
                  <label>Vehicle Description <font style="color: red">*</font></label>
                  <textarea class="form-control" name="vdes" rows="3" required>Enter Description Here</textarea>
                </div>
                <div class="form-group">
                  <label>Price Per Hour<font style="color: red">*</font></label>
                  <input type="text" name="vprice" class="form-control" placeholder="Enter Price Per Hour" required />
                </div> 
                <div class="form-group">
                  <label>Vehicle Number<font style="color: red">*</font></label>
                  <input type="text" name="vnumber" class="form-control" placeholder="Enter Number" required />
                </div> 
                <div class="form-group">
                  <label>Vehicle Image: <font style="color: red">*</font></label>
                  <input type="file" id="photo-img" accept="image/png,image/jpg,image/jpeg" class="form-control" name="image" required>
                  <div id="myDiv"> 
                    <img id="photo-img-tag" width="200px" height="200px" />
                      <script type="text/javascript">
                        function readURL(input) {
                          if (input.files && input.files[0]) {
                            var reader = new FileReader();  
                            reader.onload = function (e) {
                              $('#photo-img-tag').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                          }
                        }
                        $("#photo-img").change(function(){
                          readURL(this);
                        });
                      </script>
                  </div>  
                </div>  
              </div>
              <div class="card-footer">
                <button type="submit" name="formsubmit" class="btn btn-primary">Add</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
  </div>
</div>
<?php
  include "footer.php";
?>