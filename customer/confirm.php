<?php

include 'includes/db.php';
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
}
?>


    
        <h1 style="color:red;text-align:center;"><b>Please Confirm Your Payment</b></h1><br>
        <br>
        <form action="" method="post">
            <table class="table table-responsive" align="center">
            <tr align="center">
                <td><b>Invoice No:</b></td>
                <td><input type="text" name="invoice_no" class="input-sm" style="border-color:red"></td>
            </tr>
             <tr align="center">
                 <td ><b>Amount:</b></td>
                <td><input type="text" name="amount" class="input-sm" style="border-color:red;margin-top:10px;"></td>
            </tr>
            <td><b>Select Payment Mode:</b></td>
            <td>  <select class="input-sm" name="mode" style="border-color:red;margin-top:10px;width:170px;">
            
    <option >Select Payment Mode  </option>
    <option >Paytm</option>
    <option >MobiKwik</option>
    <option >FreeCharge</option>
    <option>Net Banking</option>

            </select>
            </td>
            <tr align="center">
                 <td ><b>Transaction/Refferece ID:</b></td>
                <td><input type="text" name="r_id" class="input-sm" style="border-color:red;margin-top:10px;"></td>
            </tr>
            <tr align="center">
                 <td ><b>Date:</b></td>
                 
                <td><input type="date" name="date" class="input-sm" style="border-color:red;margin-top:10px;width:170px;"></td>
            </tr>
            <tr align="center">
                <td colspan="4">
                 <input class="btn btn-primary" style="background:red;color:white;height:28px;padding: 3px 8px;margin-top:15px;"  type="submit" name="confirm" value="Confirm">
                </td></tr>
        </table>
        </form>
  
<?php
if(isset($_POST['confirm'])){
 
   $invoice_no=$_POST['invoice_no'];
  $amount=$_POST['amount'];
   $mode=$_POST['mode'];
   $r_id=$_POST['r_id'];
   $date=$_POST['date'];
    
   $insert_payment="insert into payments (invoice_no,amount,payment_mode,reference_no,date) values ('$invoice_no','$amount','$mode','$r_id',$date)";
    $run_payment=mysqli_query($con,$insert_payment);
    if($run_payment){
        echo "
            <script>alert('Payment Recieved');</script>";
        $update_query="update customer_orders set order_status='Complete' where  order_id='$order_id'";
        $run_query=mysqli_query($con,$update_query);
          $update_pending="update pending_orders set order_status='Complete' where  order_id='$order_id'";
      $run_pending=mysqli_query($con,$update_pending);
      echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
}
?>