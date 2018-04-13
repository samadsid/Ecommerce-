
<?php
include 'includes/db.php';

$c=$_SESSION['customer_email'];
    $get_c="select * from customers where customer_email='$c'";
    $run_c=mysqli_query($db,$get_c);
    $row_c=mysqli_fetch_array($run_c);
    $customer_id=$row_c['customer_id'];
?>
<h3>All Order Details</h3>
<table class="table table-responsive">
    <tr >
    <th>Order No</th>
    <th>Due Amount</th>
    <th>Invoice No</th>
    <th>Product Name</th>
    <th>Order Date</th>
    <th>Paid/Unpaid</th>
    <th>Status</th>
    </tr>
    
    <?php
    $get_orders="select * from customer_orders where customer_id='$customer_id'";
    $run_orders=mysqli_query($con,$get_orders);
    $i=0;
    while($row_orders=mysqli_fetch_array($run_orders)){
        $order_id=$row_orders['order_id'];
        $due_amount=$row_orders['due_amount'];
        $invoice_no=$row_orders['invoice_no'];
        
        $date=$row_orders['order_date'];
        $status=$row_orders['order_status'];
        $title=$row_orders['title'];
        $i++;
        if($status=='Pending'){
            $status='Unpaid';
        }
        else{
            $status='Paid';
        }
        echo "
            <tr style='text-align:left'>
            <td>$i</td>
<td>$due_amount</td>
<td>$invoice_no</td>
<td>$title</td>
<td>$date</td>
<td>$status</td>
<td><a  href='my_account.php?order_id=$order_id'>Confirm If Paid</td>
</tr>







";
    }
    ?>
    
    
    
</table>
                