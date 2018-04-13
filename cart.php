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
    <li><a href="index.php">Home</a></li> 
    <li ><a href="products.php">Products</a></li> 
    <li><a href="customer/my_account.php">My Account</a></li> 
    <li><a href="checkout.php">Sign Up</a></li> 
<li class="active"><a href="cart.php">My Cart</a></li> 
<li><a href="#">Contact us</a></li> 
</ul>
</nav>
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
                <input type="submit"name="search_product" value="Search">
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
                <span>- Item:<?php item(); ?> - Price:<?php price(); ?></span>
                <?php 
              if(!isset($_SESSION['customer_email'])){
                echo"<a href='checkout.php' style='color:red;font-weight: bold;'>Login</a>";
              }
              else{
                  echo"<a href='logout.php' style='color:red;font-weight: bold;'>Logout</a>";
              }
              ?>
            </div>
            <div style="margin-top:10px;text-align:center;color:red;padding:10px;margin-bottom:10px;" >
                <form action="cart.php" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered table-responsive" style="background:#F6EDE4;margin-top:20px;">
                    <tr style="margin-left:20px;">
                        <th>Remove</th>
                         <th>Product(s)</th>
                          <th>Quantity</th>
                           <th>Price</th>
                    </tr>
                
           <?php     
                $ip_add=getUserIP();
       $total_price=0;
      
    global $db;
    $get_id="select * from cart where ip_add='1'"; // $ip_add in place of 1
    $run_id=mysqli_query($db,$get_id);
     while($row_id=mysqli_fetch_array($run_id)){
       $p_id=$row_id['p_id'];
      $qty=$row_id['qty'];
      if($qty==0){
          $qty=1;
      }
      else{
          $qty=$qty;
      }
         $get_price="select * from products where products_id='$p_id'";
     $run_price=mysqli_query($db,$get_price);
     while($row_price=mysqli_fetch_array($run_price)){
         $product_title=$row_price['product_title'];
         $product_img=$row_price['products_image'];
         $product_price=$row_price['products_price'];
         $product_price1=$product_price*$qty;
                 
         $pricearray=array($product_price1);
         
     $price= array_sum($pricearray);
         $total_price += $price;
     
       
    ?>
                    <tr>
                        <th><input type="checkbox" name="remove[]" value="<?php echo $p_id; ?>"></th>
                        <th><?php echo $product_title; ?><br><img width="50" height="50" src="admin_area/<?php echo $product_img;  ?>"></th>
                        <th><input type="radio" name="select" value="<?php echo $p_id; ?>"> <input type="text" name="qty[]" placeholder="<?php echo $qty ?>" size="1"></th>
                         
                           
                            
                          
                        <td><?php echo $product_price; ?></td>
                        
                        
                    </tr>
                    
     <?php }}?>     
                     <?php
                        if(isset($_POST['update'])){
                            if(!isset($_POST['select'])){
                                echo "";                            }
                            else{
                            $pr_id=$_POST['select'];
                         foreach ($_POST['qty'] as $qty){
                              if($qty==0){
          $qty=1;
      }
      else{
          $qty=$qty;
      }
                          $q="update cart set qty='$qty' where ip_add='1' AND p_id='$pr_id'";                       //$ip_add in place of 1
                          mysqli_query($con,$q);
                        $product_price=$product_price*$qty;
                        echo  "<script>window.open('cart.php','_self')</script>";
                         }
                        }
                        
                        }
                        ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <th>Sub Total</th>
                        <td><b><?php echo $total_price; ?></b></td>
                    </tr>
                    </table>
                    <tr colspan="2"> 
                        <td><input class="btn btn-primary" style="color:white;background:red;" type="submit" name="update" value="Update Cart"</td>
                        <td><input class="btn btn-primary" style="color:white;background:red;" type="submit" name="continue" value="Continue Shopping"</td>
                        <td><a class='btn btn-primary' style="color:white;background:red;text-decoration:none;color:white;" href='checkout.php'>Checkout</a></td>
                       
                    </tr>
                
                </form>
                 
                
                <?php
               function update(){
                   global $con;
                if(isset($_POST['update'])){
                    foreach ($_POST['remove'] as $pro_id){
                        $delete_query="delete from cart where p_id=$pro_id";
                        $run_delete=mysqli_query($con,$delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                       
                }
                if(isset($_POST['continue'])){
                    echo "<script>window.open('products.php','_self')</script>";
                }
               }
               echo @$pro_update=  update();
                
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