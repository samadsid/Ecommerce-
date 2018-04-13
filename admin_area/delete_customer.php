<?php
include 'includes/db.php';
if(isset($_GET['cust_id'])){
  $cust_id=$_GET['cust_id'];
    $q="delete from customers where customer_id='$cust_id'";
    $result=mysqli_query($con,$q);
    if($result){
        echo "<script>alert('Customers has been deleted')</script>";
     echo "<script>window.open('index.php?view_customers','_self')</script>";
    }
}
?>
