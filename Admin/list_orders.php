<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
         
         $get_order="SELECT * FROM user_order";
         $result_order=mysqli_query($con,$get_order);
         $row_count=mysqli_num_rows($result_order);
         echo "<tr>
         <th>SL NO</th>
         <th>Due Ammount</th>
         <th>Invoice Number</th>
         <th>Total Products</th>
         <th>Order date</th>
         <th>Order Status</th>
         <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-center text-light'>";
         if($row_count==0){
            echo"<h2 class='bg-danger text-center mt-5'>No Orders In Database</h2>";
         }
         else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_order)){
                $order_id=$row_data['oid'];
                $user_id=$row_data['user_id'];
                $amount=$row_data['ammount'];
                $invoice_no=$row_data['invoice_no'];
                $total_products=$row_data['total_products'];
                $date=$row_data['order_date'];
                $status=$row_data['order_status'];
                $number++;
                echo"<tr>
                <td>$number</td>
                <td>$amount</td>
                <td>$invoice_no</td>
                <td>$total_products</td>
                <td>$date</td>
                <td>$status</td>
                <td><a href='index.php?delete_order=<?php echo $order_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            }
         }
        ?>
        
        
    </tbody>
</table>