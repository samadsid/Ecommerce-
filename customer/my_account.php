<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_self')</script>";
}
else{
include 'includes/db.php';
include 'functions/function.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>MTS TRADERS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/mystyle.css"/>
<style>
   
ul a:hover {
   background:black;
}
    </style>
    </head>
    <body style="background:#E2D9D0;">
        
       <!-- contact details-->
       <div class="container header" style="box-shadow: 10px 10px 5px #888888;">
<div class="container text-right">
<span class="glyphicon glyphicon-envelope"></span> mohdtariq786@yahoo.com  
   <span class="glyphicon glyphicon-earphone"></span> +91-9891483868
</div><!-- end of container -->

</div><!-- end of container-fluid -->
<!-- end of contact details-->
<!-- navigation starts here -->
<div class="container">
<div class="container menu"> 
<div class="row">
<div class="col-sm-3"></div>

    <nav class="nav navbar-default" style="background:#E2D9D0;">
<ul class="nav navbar-nav " >
    <li><a href="../index.php">Home</a></li> 
    <li><a href="../products.php">Products</a></li> 
    <li class="active"><a  href="my_account.php">My Account</a></li> 
<li><a href="../checkout.php">Sign Up</a></li> 
<li><a href="../cart.php"">My Cart</a></li> 
<li><a href="#">Contact us</a></li> 
</ul>
</nav>
</div>
</div>
</div>
<!-- navigation ends here -->
<div class="container">
    <div class="row">
        <div class="col-sm-3" style="background:#F6EDE4;margin-top:15px;height:65px;border:2px outset #888888 ; ">
           <h3 style="color:red;font-weight:bold;text-align:center;">Manage Account:</h3>
        </div>
        <div class="col-sm-9" style="background:red;margin-top:15px;height:65px;border:2px outset #888888;">
            <div style="float:right;margin-top:20px; "> 
                <form action="results.php" method="post">
                    <input type="text" name="search" placeholder="Search a Product">
                <input style="background:#F6EDE4;color:red;height:28px;padding:3px;" class="btn btn-primary" type="submit" name="search_product" value="Search">
            </form>
            </div>
        </div>
</div>
  
    <div class="row">
        <div class="col-sm-3" style="background:red;height:auto;border:2px outset #888888;">
            
            <ul style="list-style:none;text-align:center;padding:10px;font-weight:bold;font-size:20px;">
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="my_account.php?my_orders">My Orders</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="my_account.php?edit_account">Edit Account</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="my_account.php?change_pass">Change Password</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="my_account.php?delete_account">Delete Account</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="logout.php">Logout</a></li>
            </ul>
            </div>
        
        
        <div class="col-sm-9" id="content" style="background:#F6EDE4;height:auto;border:2px outset #888888;">
       
           <div style="float:right;color:red;">
                <b>
                <?php
              if(!isset($_SESSION['customer_email'])){
                  
              }
              else{
                  $em=$_SESSION['customer_email'];
                  echo "Welcome $em";
              }
                ?>
                </b>
               
                
              <?php 
              if(!isset($_SESSION['customer_email'])){
                echo"<a href='../checkout.php' style='color:red;font-weight: bold;'>Login</a>";
              }
              else{
                  echo"<a href='logout.php' style='color:red;font-weight: bold;'>Logout</a>";
              }
              ?>
            </div>
            <div style="margin-top:10px;text-align:center;color:red;padding:10px;margin-left:20px;margin-bottom:10px;" >
                <h2 style="color:red;font-weight: bold;padding:20px;font-size:40px;">Manage Your Account Here</h2> 
               <?php getDefault(); ?>
                <?php
                if(isset($_GET['my_orders'])){
                    include 'my_orders.php';
                }
                 if(isset($_GET['edit_account'])){
                    include 'edit_account.php';
                 }
                     if(isset($_GET['change_pass'])){
                    include 'change_pass.php';
                }
                 if(isset($_GET['delete_account'])){
                    include 'delete_account.php';
                }
                  if(isset($_GET['order_id'])){
                    include 'confirm.php';
                }
                 
                ?>
                </div>
                
        </div>
    </div>
</div>
    
<div class="container" style="height:120px;background:red;text-align:center;margin-top:10px;border:2px outset #888888; ">
    
        <p style="color:white;font-size:23px;margin-top:50px;"><span class="glyphicon glyphicon-copyright-mark"></span><b>DEVELOPED BY ABDUS SAMAD</b></p>
   
   
</div>
    </body>
</html>
<?php
}
?>