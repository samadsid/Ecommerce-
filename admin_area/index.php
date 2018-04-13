<?php
session_start();
if(!isset($_SESSION['username'])){
     echo "<script>window.open('admin_login.php','_self')</script>";
}
else{
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

</div>
       <div class="container">
    <div class="row">
        <div class="col-sm-3" style="background:#F6EDE4;margin-top:15px;height:65px;border:2px outset #888888 ; ">
           <h3 style="color:red;font-weight:bold;text-align:center;">Admin Area:</h3>
        </div>
        <div class="col-sm-9" style="background:red;margin-top:15px;height:65px;border:2px outset #888888;">
            
                <h1 style="text-align:center;margin-top:12px;color:white;">Manage Your Content:</h1>
            
        </div>
</div>
           
           <div class="row">
        <div class="col-sm-3" style="background:red;height:auto;border:2px outset #888888;">
            <ul style="list-style:none;text-align:center;padding:10px;font-weight:bold;font-size:20px;">
                <li style="margin:40px;margin-top:10px;"><a style="text-decoration:none;color:white;" href="index.php?insert_product">Insert New Product</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="index.php?view_products">View All Products</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="index.php?insert_cat">Insert New Category</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="index.php?view_cats">View All Categories</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="index.php?view_customers">View Customers</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="index.php?view_orders">View Orders</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="index.php?view_payments">View Payments</a></li>
                <li style="margin:40px;margin-top:40px;"><a style="text-decoration:none;color:white;" href="logout.php">Admin Logout</a></li>
            </ul>
            
            </div>
        
        
        <div class="col-sm-9" id="content" style="background:#F6EDE4;height:auto;border:2px outset #888888;">
           
           <?php
           if(isset($_GET['insert_product'])){
               include 'insert_product.php';
           }
           if(isset($_GET['view_products'])){
               include 'view_products.php';
           }
            if(isset($_GET['edit_pro'])){
               include 'edit_pro.php';
           }
           if(isset($_GET['insert_cat'])){
               include 'insert_cat.php';
           }
            if(isset($_GET['view_cats'])){
               include 'view_cats.php';
           }
           if(isset($_GET['view_customers'])){
               include 'view_customers.php';
           }
            if(isset($_GET['view_orders'])){
               include 'view_orders.php';
           }
           if(isset($_GET['view_payments'])){
               include 'view_payments.php';
           }
           ?>
            
            </div>
               
<?php } ?>