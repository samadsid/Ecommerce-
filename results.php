<?php
session_start();
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
   <span class="glyphicon glyphicon-earphone"></span> +91-9560717170
</div><!-- end of container -->

</div><!-- end of container-fluid -->
<!-- end of contact details-->
<!-- navigation starts here -->
<div class="container">
<div class="container menu"> 
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-9" style="box-shadow: 10px 10px 5px #888888;width:566px;">
    <nav class="nav navbar-default" style="background:#E2D9D0;">
<ul class="nav navbar-nav " >
    <li><a href="index.php">Home</a></li> 
    <li class="active"><a href="products.php">Products</a></li> 
<li><a href="dgd">My Account</a></li> 
<li><a href="dgg">Sign Up</a></li> 
<li><a href="gd">My Cart</a></li> 
<li><a href="gh">Contact us</a></li> 
</ul>
</nav>
</div>
</div>
</div>
</div>
<!-- navigation ends here -->
<div class="container">
    <div class="row">
        <div class="col-sm-2" style="background:#F6EDE4;margin-top:15px;height:65px;border:2px outset #888888 ; ">
           <h3 style="color:red;font-weight:bold;text-align:center;">CATEGORIES</h3>
        </div>
        <div class="col-sm-10" style="background:red;margin-top:15px;height:65px;border:2px outset #888888;">
            <div style="float:right;margin-top:20px; "> 
                <form action="results.php" method="post">
                    <input type="text" name="search" placeholder="Search a Product">
                <input type="submit" name="search_product" value="Search">
            </form>
            </div>
        </div>
</div>
  
    <div class="row">
        <div class="col-sm-2" style="background:red;height:auto;border:2px outset #888888;">
            
            <ul style="list-style:none;text-align:center;padding:10px;font-weight:bold;font-size:20px;">
              <?php
                $q="select * from categories";
                $result=mysqli_query($con,$q);
                while($row_cat=mysqli_fetch_array($result)){
                    $cat_id=$row_cat['cat_id'];
                    $title=$row_cat['title'];
           echo    " <li style='margin:40px;margin-top:40px;'><a style='text-decoration:none;color:white;' href='products.php?cat=$cat_id'>$title</a></li>";
                }
                  ?>
            </ul>
            </div>
        
        
        <div class="col-sm-10" id="content" style="background:#F6EDE4;height:auto;border:2px outset #888888;">
            <?php echo cart(); ?>
           <div style="float:right;color:red;">
                <b> <?php
              if(!isset($_SESSION['customer_email'])){
                  echo "Welcome Guest!";
              }
              else{
                  $em=$_SESSION['customer_email'];
                  echo "Welcome $em";
              }
                ?></b>
                <b>Shopping Cart</b>
                 <span>- Item:<?php item(); ?> - Price:<?php price(); ?></span> <a href="cart.php" style="color: red;font-weight:bold;">Go to Cart</a>
                 <?php 
              if(!isset($_SESSION['customer_email'])){
                echo"<a href='checkout.php' style='color:red;font-weight: bold;'>Login</a>";
              }
              else{
                  echo"<a href='logout.php' style='color:red;font-weight: bold;'>Logout</a>";
              }
              ?>
            </div>
            <div style="margin-top:10px;text-align:center;color:red;width:860px;padding:10px;margin-left:30px;margin-bottom:10px;" >
                
                <?php
               if(isset($_POST['search_product'])){
                $user_search=$_POST['search'];
               $q1="select * from products where products_keywords like '%$user_search%'";
                $run_products=mysqli_query($con,$q1);
                while ($row_product=mysqli_fetch_array($run_products)){
                    $pro_id=$row_product['products_id'];
                   $pro_title= $row_product['product_title'];
                   $pro_image=$row_product['products_image'];
                   $pro_price=$row_product['products_price'];
                    echo"
                        <div style='float:left;padding:10px;margin-right:10px;'>
                        <h3>$pro_title</h3>
                            <img style='border:2px solid #888888;margin-left:25px;' src='admin_area/$pro_image' width='220px' height='220px'>
                       <br><b>Price :Rs $pro_price pp</b>
                            <br> <a href='details.php?pro_id=$pro_id' style='float:left;margin-top:2px;margin-left:25px;color:red;'>Details</a>
                            <a href='products.php?add_cart=$pro_id'><button class='btn btn-primary' style='float:right;margin-top:2px;margin-right:5px;color:white;background:red;margin-bottom:66px;'>Add to Cart</button></a>
</div>



";
                }
                      
                }                
                
            ?>
                </div>
                
        </div>
    </div>
</div>
<div class="container" style="height:120px;background:red;text-align:center;margin-top:10px;border:2px outset #888888; ">
    
        <h1>Footer area</h1>
   
</div>
    </body>
</html>