<?php
$db=mysqli_connect("localhost","root","","mts");


function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function getDefault(){
    global $db;
    
    if(isset($_SESSION['customer_email'])){
    $c=$_SESSION['customer_email'];
    }
    else{
        $c='';
    }
    $get_c="select * from customers where customer_email='$c'";
    $run_c=mysqli_query($db,$get_c);
    $row_c=mysqli_fetch_array($run_c);
    $customer_id=$row_c['customer_id'];
     
   if(!isset($_GET['my_orders'])){
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['change_pass'])){
                if(!isset($_GET['delete_account'])){
    
    
    $get_orders="select * from customer_orders where customer_id='$customer_id' AND order_status='pending'";
    $run_orders=mysqli_query($db,$get_orders);
    $count_orders=mysqli_num_rows($run_orders);
    $count_orders;
    if($count_orders>0){
        echo "
            <div style='padding:10px;'>
<h1 style='color:red;font-weight:bold;text-decoration:underline'>Important!<h1>
<h2>You have ($count_orders) pending orders<h2>
    <h3>Please see your order details by clicking this <a href='my_account.php?my_orders'>LINK</a><br>or you can <a href='#'>pay offline now</a></h2>
</div>
";
      }
      
      else {
          echo " 
            <div style='padding:10px;'>
<h1 style='color:red;font-weight:bold;text-decoration:underline'>Important!<h1>
<h2>You have no pending orders<h2>
    <h2>You can see your orders history by clicking this <a href='my_account.php?my_orders'>LINK</a><br>or you can <a href='#'>pay offline now</a></h2>
</div>
";
      }
     
                }
            }
        }
    }
    
    
    
}

function cart(){
    if(isset($_GET['add_cart'])){
        global $db;
        $pro_id=$_GET['add_cart'];
        $ip_add=getUserIP();
        $check="select * from cart where ip_add='$ip_add' AND p_id='$pro_id'";
        $result=mysqli_query($db,$check);
        $count=mysqli_num_rows($result);
        if($count>0){
            echo "";
        }
 else {
  global $db;
     $q="INSERT INTO `cart`(`p_id`, `ip_add`,`qty`) VALUES ('$pro_id','1','0')"; // $ip_add in place of 1
     $run_query=mysqli_query($db,$q);
     echo "<script>window.open('products.php','_self')</script>";
 }
    }
}

function item(){
    if(isset($_GET['add_cart'])){
       $ip_add=getUserIP();
    global $db;
    $get_items="select * from cart where ip_add='1'"; // $ip_add in place of 1
    $run_items=mysqli_query($db,$get_items);
     $count_items=mysqli_num_rows($run_items);
   
    }
    else
    {
          global $db;
    $get_items="select * from cart where ip_add='1'"; // $ip_add in place of 1
    $run_items=mysqli_query($db,$get_items);
     $count_items=mysqli_num_rows($run_items);

    }
    echo $count_items;
}

function price(){
    $ip_add=getUserIP();
       $total_price=0;
      
    global $db;
    $get_id="select * from cart where ip_add='1'";// $ip_add in place of 1
    $run_id=mysqli_query($db,$get_id);
     while($row_id=mysqli_fetch_array($run_id)){
       $p_id=$row_id['p_id'];
         $get_price="select * from products where products_id='$p_id'";
     $run_price=mysqli_query($db,$get_price);
     while($row_price=mysqli_fetch_array($run_price)){
         $pricearray=array($row_price['products_price']);
     $price= array_sum($pricearray);
         $total_price += $price;
     }
     }
       
    
echo $total_price;
}
    
    
    
    




?>