<?php include "header.php";
include "connection.php"; 
if(!isset($_SESSION['aemail']))
{
    header("location:index.php");
}

else{

  if (isset($_GET['scid'])) {
    $scid=$_GET['scid'];
    $query="SELECT * FROM shop_category WHERE shop_cat_id='$scid'";
    $result=mysqli_query($con,$query);
    $value=mysqli_fetch_array($result);
    $cname=$value['shop_cat_name'];
  }

  if (isset($_POST['formsubmit'])) {
    $cid=$_GET['scid'];
    $sname=$_POST['catname'];

    $query1="UPDATE shop_category SET shop_cat_name='$sname' WHERE shop_cat_id='$cid'";
    $result1=mysqli_query($con,$query1);

    if($result1)
    {
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Shop Category Editted Successfully!!');
            window.location.href='manageshopcat.php';
            </script>"; 
    }
    else{
      echo "<script LANGUAGE='JavaScript'>
            window.alert('Error Occured Please Try Again.');
            window.location.href='manageshopcat.php';
          </script>";
    }
  }
}
?>
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Shop Category
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
          <div class="container-fluid">
            <div class="card card-warning">
              <div class="row">
                <div class="col-md-12">
                <form role="form" method="POST">
                  <div class="card-body">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Shop Category name:</label>
                  <input type="text" name="catname" class="form-control" placeholder="Enter Category Name" value="<?php echo $cname; ?>">
                  </div>
                  <div>
                    <input type="submit" name="formsubmit" value="EDIT" class="btn btn-primary">
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
