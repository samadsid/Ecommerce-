<table align="center" width="650" style="color:red;">
    
        <h2 style="color:red;text-align:center;">View All Payments:</h2>
    
    <tr align="center">
        <th>Payment No</th> 
        <th>Invoice No</th>
        <th>Amount Paid</th>
        <th>Payment Method</th>
        <th>Ref No</th>
        <th>Payment Date</th>
        
    </tr>
    <?php
    include 'includes/db.php';
    $get_orders="select * from payments";
    $run_orders=mysqli_query($con,$get_orders);
    $i=0;
    while($row_orders=mysqli_fetch_array($run_orders)){
       $payment_id=$row_orders['payment_id'];
       $amount=$row_orders['amount'];
       $invoice_no=$row_orders['invoice_no'];
       $payment_mode=$row_orders['payment_mode'];
       $reference_no=$row_orders['reference_no'];
       $payment_date=$row_orders['payment_date'];
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $invoice_no ?></td>
        <td><?php echo $amount ?></td>
        <td><?php echo $payment_mode ?></td>
        <td><?php echo $reference_no ?></td>
         <td><?php echo $payment_date ?></td>
        
        
       
    </tr>
    <?php
    
    }
    ?>
</table>