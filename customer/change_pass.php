<form action="" method="post">
    <table class="table table-responsive" align="center">
        <tr>
            <td colspan="4"><h2>Change Your Password:</h2></td>
        </tr>
        <tr>
            <td>Enter Your Current Password</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="password" name="old_pass" required></td>
        </tr>
        <tr>
            <td>Enter Your New Password</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="password" name="new_pass" required></td>
        </tr>
        <tr>
            <td>Enter Your New Password Again</td>
            <td><input class="input-sm" style="margin-bottom:10px;border-color:red;" type="password" name="new_pass_again" required></td>
        </tr>
        <tr><td colspan="4"><input class="btn btn-primary" style="background:red;color:white;border-color:white;" type="submit" value="Change Password" name="change_pass"</td></tr>
   </table>
    </form>

<?php
include 'includes/db.php';
$c=$_SESSION['customer_email'];
if(isset($_POST['change_pass'])){
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $new_pass_again=$_POST['new_pass_again'];
    
    $q="select * from customers where customer_pass='$old_pass'";
    $result=mysqli_query($con,$q);
    $n=mysqli_num_rows($result);
    if($n==0){
        echo "<script>alert('Your current password is not valid,try again!')</script>";
        exit();
    }
    if($new_pass!=$new_pass_again){
         echo "<script>alert('New password did not match,try again!')</script>";
         exit();
    }
    else{
        $change_pass="update customers set customer_pass='$new_pass' where customer_email='$c'";
        $run_change=mysqli_query($con,$change_pass);
        echo "<script>alert('Your password has been changed')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}
?>