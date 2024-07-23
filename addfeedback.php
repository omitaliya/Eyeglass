<?php 
include 'connection.php';
session_start();

if(isset($_POST['formsubmit'])){
    $lgid=$_SESSION['ulogid'];
    $rate=$_POST['rating'];
    $message=$_POST['message'];
    
    $q="INSERT INTO feedback(l_id,ratings,comment) VALUES ('$lgid','$rate','$message')";
    $ans=mysqli_query($con,$q);
    if($ans){
      echo "<script>window.location.href='feedback.php?flag=1'</script>";
    }
    else{
      echo "<script>window.location.href='feedback.php?flag=0'</script>";
    }
}

?>