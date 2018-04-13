<?php
include 'includes/db.php';
if(isset($_GET['order_id'])){
  $order_id=$_GET['order_id'];
    $q="delete from pending_orders where order_id='$order_id'";
    $result=mysqli_query($con,$q);
    if($result){
        echo "<script>alert('Order has been deleted')</script>";
     echo "<script>window.open('index.php?view_orders','_self')</script>";
    }
}
?>
