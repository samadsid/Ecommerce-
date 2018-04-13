<?php
include 'includes/db.php';

$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email'";
$run_customer=mysqli_query($con,$get_customer);
$row_customer=mysqli_fetch_array($run_customer);
$c_id=$row_customer['customer_id'];
$c_name=$row_customer['customer_name'];
$c_email=$row_customer['customer_email'];
$c_pass=$row_customer['customer_pass'];
$c_country=$row_customer['customer_country'];
$c_city=$row_customer['customer_city'];
$c_contact=$row_customer['customer_contact'];
$c_address=$row_customer['customer_address'];

?>
<form action="" method="post">
    <table class="table table-responsive" align="center">
        <tr>
            <td colspan="8" align="center"><h2>Update Your Account:</h2></td>
        </tr>
        <tr>
            <td align="right">Customer Name:</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="text" value="<?php echo $c_name ?>" name="name"</td>
        </tr>
        <tr>
            <td align="right">Customer Email:</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="text" value="<?php echo $c_email ?>" name="email" disabled></td>
        </tr>
         <tr>
            <td align="right">Customer Password:</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="text" value="<?php echo $c_pass ?>" name="pass" disabled></td>
        </tr>
         <tr>
            <td align="right">Customer Country</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="text" value="<?php echo $c_country ?>" name="country" disabled></td>
        </tr>
         <tr>
            <td align="right">Customer City</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="text" value="<?php echo $c_city ?>" name="city"></td>
        </tr>
         <tr>
            <td align="right">Customer Contact No</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="text" value="<?php echo $c_contact ?>" name="contact"></td>
        </tr>
         <tr>
            <td align="right">Customer Address</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="text" value="<?php echo $c_address ?>" name="address"></td>
        </tr>
        <tr><td colspan="8"><input class="btn btn-primary" style="background:red;color:white;border-color:white;" type="submit" value="Update Account" name="update_account"</td></tr>
    </table>
    </form>
 
<?php

if(isset($_POST['update_account'])){
    $update_id=$c_id;
    $update_name=$_POST['name'];
    $update_city=$_POST['city'];
    $update_contact=$_POST['contact'];
    $update_address=$_POST['address'];
    
    $update_query="update customers set customer_name='$update_name',customer_city='$update_city',customer_contact='$update_contact',customer_address='$update_address' where customer_id='$update_id'";
    $run_query=mysqli_query($con,$update_query);
    if($run_query){
        echo "<script>alert('Your data is updated successfully')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}







?>