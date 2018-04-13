<table align="center" width="650" style="color:red;">
    
        <h2 style="color:red;text-align:center;">View All Orders:</h2>
    
    <tr align="center">
        <th>Order No</th> 
        <th>Customer</th>
        <th>Invoice No</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>DELETE</th>
        
    </tr>
    <?php
    include 'includes/db.php';
    $get_orders="select * from pending_orders";
    $run_orders=mysqli_query($con,$get_orders);
    $i=0;
    while($row_orders=mysqli_fetch_array($run_orders)){
       $order_id=$row_orders['order_id'];
       $customer_id=$row_orders['customer_id'];
       $invoice_no=$row_orders['invoice_no'];
       $product_name=$row_orders['product_name'];
       $quantity=$row_orders['qty'];
       $status=$row_orders['order_status'];
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php 
        $q="select * from customers where customer_id='$customer_id'";
        $result=mysqli_query($con,$q);
        $row=mysqli_fetch_array($result);
        $email=$row['customer_email'];
        echo $email;
        ?></td>
        <td><?php echo $invoice_no ?></td>
        <td><?php echo $product_name ?></td>
        <td><?php echo $quantity ?></td>
        <td><?php
        if($status=='Pending'){
                echo $status;;
        }
        else{
           echo $status='Complete'; 
        }
        ?></td>
        
        <td><a href="delete_order.php?order_id=<?php echo $order_id?>">Delete</a></td>
    </tr>
    <?php
    
    }
    ?>
</table>