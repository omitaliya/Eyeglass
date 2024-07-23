<?php
  include "header.php";
   
  if(!isset($_SESSION['semail']))
  {
    header("location:index.php");
  }

  else{
    if(isset($_POST['formsubmit']))
    {
      $logid=$_SESSION['slogid'];
      $pcat=$_POST['pcat'];
      $pname=$_POST['pname'];
      $pdes=$_POST['pdes'];
      $pprice=$_POST['pprice'];
      $pqnt=$_POST['quantity'];

      $filename=addslashes($_FILES['image']['name']);
      $tmpname=addslashes($_FILES['image']['tmp_name']);
      date_default_timezone_set("Asia/Calcutta");
      $date = date('Y-m-d H:i:s');
      $iname=strtotime(date('Y-m-d H:i:s'));
      $extension=pathinfo($filename, PATHINFO_EXTENSION);
      $image_path= $iname.".".$extension;
      $status=1;

      if($filename)
      {
        move_uploaded_file($_FILES["image"]["tmp_name"],"../products/".$image_path);
      }

      $q4="INSERT INTO product_detail(cat_id,l_id,product_name,product_image,product_description, product_price,quantity,status) VALUES ('$pcat','$logid','$pname','$image_path','$pdes','$pprice','$pqnt','$status')";
      $res4=mysqli_query($con,$q4); 

      if ($res4){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Product Added Successfully');
                  window.location.href='addproducts.php';
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
        Add Product Details
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
          <form role="form" method="POST" id="quickForm" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Select Product Brand: <font style="color: red">*</font></label>
                      <select name="pcat" class="form-control" required="">
                        <option value="a" selected disabled> Select Category </option>
                      <?php 
                        $qry="SELECT * FROM product_category";
                        $ans=mysqli_query($con,$qry);

                        while($row2=mysqli_fetch_array($ans)){  
                          $cid=$row2['cat_id'];
                          $cname=$row2['cat_name'];
                        ?>
                          <option value="<?php echo $cid; ?>"><?php echo $cname; ?></option>
                    <?php
                        }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label>Product Name <font style="color: red">*</font></label>
                      <input type="text" name="pname" class="form-control" placeholder="Enter Product Name" required />
                  </div>
                  <div class="form-group">
                      <label>Product Description <font style="color: red">*</font></label>
                      <textarea class="form-control" placeholder="Enter Product Description Here" name="pdes" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Product Price <font style="color: red">*</font></label>
                    <input type="text" name="pprice" class="form-control" placeholder="Enter Product Price" required />
                  </div>
                    <div class="form-group">
                      <label> Product Image: <font style="color: red">*</font></label>
                      <input type="file" id="photo-img" class="form-control" name="image">
                      <div id="myDiv"> 
                          <!--<p class="square"> -->
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
                      <div class="form-group">
                        <label>Quanity <font style="color: red">*</font></label>
                        <input type="text" name="quantity" class="form-control" placeholder="Enter Product Stock Quanity" required />
                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="formsubmit" class="btn btn-primary">ADD</button>
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