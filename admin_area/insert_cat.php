<form action="" method="post">
  
        
    <h2 style="color: red;text-align: center">Insert New Category</h2>
    <br><br><br>
    <span style="color:red;text-align:center;margin-left:220px;text-decoration:bold;font-size:20px;margin-bottom:20px;">Enter the Category:</span><input  class="input-sm" type="text" name="category" style="border-color: red;margin-left:10px;margin-bottom: 20px;">
       
        <input class="btn btn-primary" style="background:red;color:white;height:28px;padding: 3px 8px;border-color: red"  type="submit" name="insert_cat" value="Insert Category">

    </form>

<?php
include 'includes/db.php';
if(isset($_POST['insert_cat'])){
  $cat_title=$_POST['category'];
    $insert_cat="INSERT INTO `categories`(`title`) VALUES ('$cat_title')";
    $run_cat=mysqli_query($con,$insert_cat);
    if($run_cat){
        echo "<script>alert('Category has been added')</script>";
     echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
}
?>