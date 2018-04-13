<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
   
    <body>
        <table width="850" align="center" style="color:red;">
            <tr align="center">
                <td colspan="8"><h2>View All Products</h2></td>
            </tr>
            <tr >
                <th>Product No</th>
                <th>Tittle</th>
                <th>Image</th>
                <th>Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
             </tr>
             <?php
             include 'includes/db.php';
             $i=0;
             $get_pro="select * from products";
             $run_pro=mysqli_query($con,$get_pro);
             while($row_pro=mysqli_fetch_array($run_pro)){
                 $product_id=$row_pro['products_id'];
                 $product_title=$row_pro['product_title'];
                 $product_img=$row_pro['products_image'];
                 $product_price=$row_pro['products_price'];
                 $status=$row_pro['status'];
                 $i++;
             
             ?>
             <tr >
                 <td><?php echo $i ?></td>
                 <td><?php echo $product_title ?></td>
                 <td><img src="<?php echo $product_img ?>" width="60" height="60" style="border:solid 1px white;"></td>
                 <td><?php echo $product_price ?></td>
                 <td>
                     <?php
                     $get_sold="select * from pending_orders where product_id='$product_id'";
                     $run_sold=mysqli_query($con,$get_sold);
                     $count=mysqli_num_rows($run_sold);
                     echo $count;
                     ?>
                 </td>
                 <td><?php echo $status; ?></td>
                 <td><a href="index.php?edit_pro=<?php echo $product_id ?>">Edit</a></td>
                 <td><a href="delete_pro.php?delete_pro=<?php echo $product_id ?>">Delete</a></td>
                 
             <?php } ?>
                 
                 
             </tr>
            
        </table>
        
        
        
        
    </body>
</html>
