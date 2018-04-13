<?php
include 'includes/db.php';
if(isset($_GET['edit_pro'])){
    $p_id=$_GET['edit_pro'];
    $q="select * from products where products_id='$p_id'";
    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_array($result);
    $product_title=$row['product_title'];
    $cat_id=$row['cat_id'];
    $product_img=$row['products_image'];
    $product_price=$row['products_price'];
    $product_desc=$row['products_desc'];
    $product_keyword=$row['products_keywords'];
    $update_id=$row['products_id'];
}
$get_cat="select * from categories where cat_id='$cat_id'";
$run_cat=mysqli_query($con,$get_cat);
$row_cat=mysqli_fetch_array($run_cat);
$category=$row_cat['title'];
?>
<html>
    <head></head>
    <body>
<form action='' method="post" name="myform"S enctype = "multipart/form-data">
       <table   width='1000px' align='center'style="width:850px;margin-top:0px" >
           <tr style="color:red;" align='center'>
               <td colspan="2"><h2>Edit or Update Product</h2></td>
           
           
           </tr>
           <tr>
               <th style="color:red;"> Product Title</th>
               <td><input type='text' name='product_title' value="<?php echo $product_title ?>"></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Category </th>
               <td>
                   <select style="margin-top:10px;" name='product_cat' >
                       <option value="<?php echo $cat_id ?>"><?php echo $category ?></option>
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
               <td><input style="margin-top:10px;"style="margin-top:10px;" type="file" name="product_image" id="product_image"><img src="<?php echo $product_img ?>" height="80" width="80"></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Price </th>
               <td><input style="margin-top:10px;" type='number' name='product_price'  value="<?php echo $product_price ?>"></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Description </th>
               <td><textarea  style="margin-top:10px;" name="product_desc" cols="35" rows="10"><?php echo $product_desc ?></textarea></td>
           </tr>
           <tr>
               <th style="color:red;"> Product Keywords </th>
               <td><input  type='text' name='product_keywords'  value="<?php echo $product_keyword ?>"></td>
           </tr>
           
           <tr>
           
               <td colspan="2" align='center'><button  class="btn btn-primary" onclick="return validateform();"  name="update_product" type='submit' style="background:red;margin-top:15px;margin-bottom:10px;">Update Product</button></td>
           </tr>
           
           
       </table>
       
       
       
       
   </form>
   
   
</body>
</html>

<?php
if(isset($_POST['update_product'])){
    $p_title=$_POST['product_title'];
    $p_cat=$_POST['product_cat'];
    $p_price=$_POST['product_price'];
    $p_desc=$_POST['product_desc'];
    $p_keywords=$_POST['product_keywords'];
    $p_img=$_FILES['product_image']['name'];
    if($p_img==''){
        $p_img=substr("$product_img",15);
    }
     $temp_name=$_FILES['product_image']['tmp_name'];
    move_uploaded_file($temp_name,"product_images/$p_img");
    $q="update products set cat_id='$p_cat',date=NOW(), product_title='$p_title',products_image='product_images/$p_img',products_price='$p_price',products_desc='$p_desc',products_keywords='$p_keywords' where products_id='$update_id'";
    $run_query=mysqli_query($con,$q);
 if($run_query){
     echo "<script>alert('Your data has been updated')</script>";
     echo "<script>window.open('index.php?view_products','_self')</script>";
 }   
    
}
?>
