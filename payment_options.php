<!DOCTYPE html>
<html>
    <head>
    <title>Payment Options</title>
    </head>
    <body>
        <?php
        include 'includes/db.php';
        ?>
        
<div style="text-align:center;margin-bottom: 20px;">
    <h2 ><b>Payment Options For You</b></h2>
    <?php 
    $ip=getUserIP();
    $get_customer="select * from customers where customer_ip='1'";  //$ip instead of 1
    $run_customer=mysqli_query($con,$get_customer);
    $customer=mysqli_fetch_array($run_customer);
    $customer_id=$customer['customer_id'];
    
    
    ?>
    <b>Pay with</b> <a href="http://www.paypal.com">  <img class="img-responsive" style="display:block;margin:0 auto;" src="images/paypal.png"> </a><b>OR <br> <br><a style="color:red;" href="order.php?c_id=<?php echo $customer_id ?>"><b>Pay Offline</b></a></b>
    <br> <br><b>If you selected "Pay Offline" option then please check your email or account to find the Invoice No for your order</b>
    
    
</div>
    </body>
</html>