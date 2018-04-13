<?php
include 'includes/db.php';
    
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
  echo  $targetpath;
 echo $product_title=$_POST['product_title'];
 echo $product_cat=$_POST['product_cat'];
 echo $product_price=$_POST['product_price'];    
 echo $product_desc=$_POST['product_desc'];  
  $product_keywords=$_POST['product_keywords'];  
    $status='on';
    $q="INSERT INTO `products`(`cat_id`,`date`, `product_title`, `products_image`, `products_price`, `products_desc`, `status`) VALUES ($product_cat,NOW(),'$product_title','$targetpath',$product_price,'$product_desc','$status')";
$run_query=mysqli_query($con,$q);
 if($run_query){
     echo "<script>alert('Your data has been inserted')</script>";
 }   


?>
