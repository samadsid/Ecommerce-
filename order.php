<?php
include 'includes/db.php';
include 'functions/function.php';

if(isset($_GET['c_id'])){
    $customer_id=$_GET['c_id'];
   }

$ip_add=getUserIP();
       $total_price=0;
   $status='Pending';
$invoice_no=mt_rand();   
   
    $get_id="select * from cart where ip_add='1'";// $ip_add in place of 1
    $run_id=mysqli_query($db,$get_id);
    $count_pro=mysqli_num_rows($run_id);
     while($row_id=mysqli_fetch_array($run_id)){
       $p_id=$row_id['p_id'];
         $get_price="select * from products where products_id='$p_id'";
     $run_price=mysqli_query($db,$get_price);
     while($row_price=mysqli_fetch_array($run_price)){
         $title=$row_price['product_title'];
         $pricearray=array($row_price['products_price']);
     $price= array_sum($pricearray);
         $total_price += $price;
     }
     
       
$get_cart="select * from cart";
$run_cart=mysqli_query($con,$get_cart);
$get_qty=mysqli_fetch_array($run_cart);
$qty=$get_qty['qty'];
 if($qty==0){
     $qty=1;
     $sub_total=$total_price;
 }
else{
    $qty=$qty;
    $sub_total=$total_price*$qty;
}

$insert_order="INSERT INTO `customer_orders`(`customer_id`, `due_amount`, `invoice_no`, `title`, `order_date`, `order_status`) VALUES ('$customer_id','$sub_total','$invoice_no','$title',NOW(),'$status')";


$run_order=mysqli_query($con,$insert_order);


    
    
    
    $insert_into_pending_orders="INSERT INTO `pending_orders`(`customer_id`, `invoice_no`, `product_name`, `qty`, `order_status`) VALUES ('$customer_id','$invoice_no','$title','$qty','$status')";
$run_pending_orders=mysqli_query($con,$insert_into_pending_orders);
    
$cart_empty="delete from cart where ip_add='1'"; //$ip_add instead of 1
    $run_empty=mysqli_query($con,$cart_empty);




     }
echo "<script>alert('Order Successfully Submitted..')</script>";
    echo "<script>window.open('customer/my_account.php','_self')</script>";

?>