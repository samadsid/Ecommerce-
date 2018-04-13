<?php
include 'includes/db.php';
if(isset($_GET['cat_id'])){
  $c_id=$_GET['cat_id'];
    $q="delete from categories where cat_id='$c_id'";
    $result=mysqli_query($con,$q);
    if($result){
        echo "<script>alert('Category has been deleted')</script>";
     echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}
?>
