<?php
include 'includes/db.php';
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
<script>
    function validateform() {
                var p = document.forms["myform"]["product_title"].value;
                if( p == ""){
                    alert("Enter The Product Title!");
                    return false;
                }
    if(document.myform.product_cat.selectedIndex==""){
        alert ( "Please Select A Category");
        return false;
    }
    if(document.myform.product_image.value==""){
     alert ( "Please Select An Image");
        return false;   
    }
    if(document.myform.product_price.value==""){
        alert("Enter the Product Price");
        return false;
    }
    if(document.myform.product_desc.value==""){
        alert("Enter Product Description");
        return false;
    }
     if(document.myform.product_keywords.value==""){
        alert("Enter Product Keywords");
        return false;
    }
    }
    
    </script>

    </head>
    <body style="background:#E2D9D0;">
        
       <!-- contact details-->
       
       <form action='' method="post" name="myform" enctype = "multipart/form-data">
       <table   width='1000px' align='center'style="width:850px;margin-top:0px" >
           <tr style="color:red;" align='center'>
               <td colspan="2"><h2>Insert New Product</h2></td>
           
           
           </tr>
           <tr>
               <th style="color:red;"> Product Title</th>
               <td><input type='text' name='product_title'></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Category </th>
               <td>
                   <select style="margin-top:10px;" name='product_cat'>
                       <option>Select a category</option>
                       <?php
                $q="select * from categories";
                $result=mysqli_query($con,$q);
                while($row_cat=mysqli_fetch_array($result)){
                    $cat_id=$row_cat['cat_id'];
                    $title=$row_cat['title'];
           echo    "<option value='$cat_id'>$title</option>";
                }
                  ?>
                   </select>
                   
               </td>
           </tr>
           <tr>
               <th style="color:red;"> Product Image </th>
               <td><input style="margin-top:10px;"style="margin-top:10px;" type="file" name="product_image" id="product_image"></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Price </th>
               <td><input style="margin-top:10px;" type='number' name='product_price'></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Description </th>
               <td><textarea  style="margin-top:10px;" name="product_desc" cols="35" rows="10"></textarea></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Keywords </th>
               <td><input  type='text' name='product_keywords'></td>
           </tr>
           
           <tr>
           
               <td colspan="2" align='center'><button  class="btn btn-primary" onclick="return validateform();"  name="insert_product" type='submit' style="background:red;margin-top:15px;margin-bottom:10px;">Insert Product</button></td>
           </tr>
           
           
       </table>
       
       
       
       
   </form>
   
   
</body>
</html>

<?php
if(isset($_POST['insert_product'])){
    
 if (!empty($_FILES["product_image"]["name"])) {
     $file_name=$_FILES["product_image"]["name"];
     $temp_name=$_FILES["product_image"]["tmp_name"];
    $imgtype=$_FILES["product_image"]["type"];
  //  $ext= GetImageExtension($imgtype);
   $targetpath = "product_images/".$file_name;

    
}
else{
    $targetpath="";
}

   
   $product_title=$_POST['product_title'];
   $product_cat=$_POST['product_cat'];
   $product_price=$_POST['product_price'];    
   $product_desc=$_POST['product_desc'];  
   $product_keywords=$_POST['product_keywords'];  
    $status='on';
    
    move_uploaded_file($temp_name,"$targetpath");
  $q="INSERT INTO `products`(`cat_id`, `date`, `product_title`, `products_image`, `products_price`, `products_desc`, `products_keywords`, `status`) VALUES ('$product_cat',NOW(),'$product_title','$targetpath','$product_price','$product_desc','$product_keywords','$status')";
$run_query=mysqli_query($con,$q);
 if($run_query){
     echo "<script>alert('Your data has been inserted')</script>";
     echo "<script>window.open('index.php?insert_product','_self')</script>";
 }   
    
}
?>
