<form action="" method="post">
    <table class="table-responsive" align="center">
        <tr>
            <td><h2>Do you really want to delete your account!</h2></td>
        </tr>
        
        <tr><td><input class="btn btn-primary" style="background:red;color:white;border-color:white;" type="submit" value="Yes,I want to delete" name="yes"</td>
            <input class="btn btn-primary" style="background:red;color:white;border-color:white;" type="submit" value="No,I do not want to delete" name="no"</td></tr>
   
        </tr>
    </table>
    
</form>

<?php
include 'includes/db.php';
$c=$_SESSION['customer_email'];
if(isset($_POST['yes'])){
    $q="delete from customers where customer_email='$c'";
    $run_query=mysqli_query($con,$q);
    if($run_query){
        session_destroy();
        echo "<script>window.open('../products.php','_self')</script>";
    }
    
    }
if(isset($_POST['no'])){
    echo "<script>window.open('my_account.php','_self')</script>";
}
?>