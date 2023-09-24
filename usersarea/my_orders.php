
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
  <body>
    <div class="contaainer">
  <style>
body{
overflow-x: hidden;
}
.container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  text-align: center;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

th, td {
  border: 1px solid #4CAF50;
  padding: 10px;
}

button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #45a049;
}

@media print {
  .container {
    display: none;
  }
  
  table {
    font-size: 12px;
    margin-bottom: 0;
  }
}

    </style>

    <?php 
        $username=$_SESSION['username'];
        $get_users="SELECT * FROM user WHERE user_name='$username'";
        $result_query=mysqli_query($con,$get_users);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['user_id'];

    ?>
  <h3 class="text-success">All My Orders</h3>
  <table class="table table-bordered mt-5" id="myTable">
    <thead class="bg-info ">
        <tr>
            <th>SL NO</th>
            <th>Ammount</th>
            <th>Total Products</th>
            <th>Invoice No</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php 
         $get_user_details="SELECT * FROM user_order WHERE user_id=$user_id"; 
         $result_order=mysqli_query($con,$get_user_details);
         $number=1;
         while($row_order=mysqli_fetch_assoc($result_order)){
                $order_id=$row_order['oid'];
                $ammount=$row_order['ammount'];
                $total_products=$row_order['total_products'];
                $invoice_no=$row_order['invoice_no'];
                $order_status=$row_order['order_status'];
                if($order_status=='pending'){
                    $order_status='Incomplete';
                }
                else{
                    $order_status='complete';
                }
                $date=$row_order['order_date'];
                
                echo"<tr>
                <td>$number</td>
                <td>$ammount</td>
                <td> $total_products</td>
                <td>$invoice_no</td>
                <td>$date</td>
                <td>$order_status</td>";
                ?>
                <?php
                if($order_status=='complete'){
                    echo "<td>paid</td>";
                }
                else{
                    echo"<td><a href='conform_payment.php?oid=$order_id' class='text-light'>Conform</a></td>
                    </tr>";
                }

            $number++;
         }
    ?>
        
    </tbody>
  </table>
  
  <button class="bg-info border-0 " onclick="printTable()">Print</button>
        </div>
</body>
</html>

