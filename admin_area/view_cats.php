<table align="center" width="650" style="color:red;">
    
        <h2 style="color:red;text-align:center;">View All Categories:</h2>
    
    <tr align="center">
        <th>CATEGORY ID</th> 
        <th>CATEGORY TITLE</th>
        <th>DELETE</th>
        
    </tr>
    <?php
    include 'includes/db.php';
    $get_cat="select * from categories";
    $run_cat=mysqli_query($con,$get_cat);
    while($row_cat=mysqli_fetch_array($run_cat)){
        $cat_id=$row_cat['cat_id'];
        $cat_title=$row_cat['title'];
        ?>
    <tr>
        <td><?php echo $cat_id ?></td>
        <td><?php echo $cat_title ?></td>
        <td><a href="delete_cat.php?cat_id=<?php echo $cat_id ?>">Delete</a></td>
    </tr>
    <?php
    
    }
    ?>
</table>