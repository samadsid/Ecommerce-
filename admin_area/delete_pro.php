<?php 
include 'includes/db.php';
if(isset($_GET['delete_pro'])){
    $p_id=$_GET['delete_pro'];
    $q="delete from products where products_id='$p_id'";
   $result= mysqli_query($con,$q);
   if($result){
       echo "<script>alert('One product has been deleted')</script>";
     echo "<script>window.open('index.php?view_products','_self')</script>";
 
   }
}
?>
