<?php 
    include 'connection.php';

    if(isset($_POST['formsubmit'])){
    $uname=$_POST['shopname'];
    $email=$_POST['uemail'];
    $pass=$_POST['upass'];
    $phone=$_POST['uphone'];
    $scat=$_POST['shopcat'];
    $address=$_POST['uaddress'];
    $scon=$_POST['shopcontact'];
    $role=3;
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

    $q1="INSERT INTO login_table(email_id,phone_no,password,role,status) VALUES ('$email','$phone','$pass','$role','$status')";
    $ans1= mysqli_query($con,$q1);

    $q3="SELECT * FROM login_table WHERE email_id='$email'";
    $ans3=mysqli_query($con,$q3);
    $row3=mysqli_fetch_array($ans3);
    $lid=$row3['l_id'];

    $q2="INSERT INTO shop_table(l_id,shop_cat_id,shop_name,shop_address,shop_contactno,shop_image) VALUES ('$lid','$scat','$uname','$address','$scon','$image_path')";

    $q2="INSERT INTO shop_table (l_id,shop_cat_id,shop_name,shop_address,shop_contactno,shop_image) VALUES ('$lid','$scat','$uname','$address','$scon','$image_path')";
    $ans2= mysqli_query($con,$q2);

    if($ans1 && $ans2){
        header("location:register.php?flag=1");
    }
    else{
      header("location:register.php?flag=0");
    }
}
?>