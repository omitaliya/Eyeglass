<?php include "header.php"; 
if(!isset($_SESSION['aemail']))
{
    header("location:index.php");
}
else{
  if (isset($_POST['formsubmit'])) {
    $type=$_POST['catname'];

    $query="INSERT INTO product_category(cat_name) VALUES('$type')";
    $result=mysqli_query($con,$query);

    if($result)
    {
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Product Category Inserted Successfully!!');
            window.location.href='addproductcat.php';
            </script>"; 
    }
    else{
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Error Occured Please Try Again.');
            window.location.href='addproductcat.php';
          </script>";
    }
  }
}
?>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product Brand
      </h1>
    </section>   
    <section class="content">
      <div class="container-fluid">
            <div class="card card-warning">
              <div class="row">
                <div class="col-md-12">
                  <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <!-- text input -->
                      <div class="form-group">
                          <label>Add product Brand</label>
                          <input type="text" name="catname" class="form-control" placeholder="Enter product brand name" required />
                      </div>
                      <div>
                          <input type="submit" name="formsubmit" value="ADD" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
<?php
  include 'footer.php';
?>  
