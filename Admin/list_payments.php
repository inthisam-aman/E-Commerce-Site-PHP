<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
         
         $get_payment="SELECT * FROM user_payment";
         $result_payment=mysqli_query($con,$get_payment);
         $row_count=mysqli_num_rows($result_payment);
         echo "<tr>
         <th>SL NO</th>         
         <th>Invoice Number</th>
         <th>Total Ammount</th>
         <th>Payment Mode</th>
         <th>Payment Date</th>
         <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-center text-light'>";
         if($row_count==0){
            echo"<h2 class='bg-danger text-center mt-5'>No Payments In Database</h2>";
         }
         else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_payment)){
                $order_id=$row_data['oid'];
                $invoice_no=$row_data['invoice_no'];
                $amount=$row_data['ammount'];               
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;
                echo"<tr>
                <td>$number</td>
                <td>$invoice_no</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_payment' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            }
         }
        ?>
        
        
    </tbody>
</table>