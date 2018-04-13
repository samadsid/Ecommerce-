<table align="center" width="650" style="color:red;">
    
        <h2 style="color:red;text-align:center;">View All Customers:</h2>
    
    <tr align="center">
        <th>S NO.</th> 
        <th>NAME</th>
        <th>EMAIL</th>
        <th>COUNTRY</th>
        <th>CONTACT</th>
        <th>DELETE</th>
        
    </tr>
    <?php
    include 'includes/db.php';
    $get_customers="select * from customers";
    $run_customers=mysqli_query($con,$get_customers);
    $i=0;
    while($row_customers=mysqli_fetch_array($run_customers)){
        $customer_id=$row_customers['customer_id'];
        $customer_name=$row_customers['customer_name'];
        $customer_email=$row_customers['customer_email'];
        $customer_country=$row_customers['customer_country'];
        $customer_contact=$row_customers['customer_contact'];
        $i++;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $customer_name ?></td>
        <td><?php echo $customer_email ?></td>
        <td><?php echo $customer_country ?></td>
        <td><?php echo $customer_contact ?></td>
        <td><a href="delete_customer.php?cust_id=<?php echo $customer_id?>">Delete</a></td>
    </tr>
    <?php
    
    }
    ?>
</table>