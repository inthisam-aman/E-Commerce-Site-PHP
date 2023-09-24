<?php
include('../include/connect.php');
include('../function/functions.php');
session_start();

if(isset($_GET['oid'])){
    $order_id=$_GET['oid'];
    //echo $order_id;
    $select_data="SELECT * FROM user_order WHERE oid=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_no'];
    $ammount=$row_fetch['ammount'];
}

if(isset($_POST['conform_payment'])){
    $invoice_number=$_POST['invoice_no'];
    $amount=$_POST['ammount'];
    $payment_mood=$_POST['payment_way'];

    $insert_query="INSERT INTO `user_payment` (oid,	invoice_no,ammount,payment_mode) 
    VALUES ($order_id , $invoice_number , $amount ,'$payment_mood') ";

    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('Payment Successfull')</script>";
        echo"<script>window.open('Profile.php?my_orders','_self')</script>";
    }
    else{
        echo"<script>alert('Payment Not Successfull')</script>";
    }
    $update_orders="UPDATE user_order SET order_status='complete' WHERE oid= $order_id ";
    $result_order=mysqli_query($con,$update_orders);
}
?>
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Paymentpage</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5">
    <form action="" method="post" >
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <label class="form-label ">Invoice Number</label>
                <input type="text" name="invoice_no"  value="<?php echo $invoice_number ?>" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <label class="form-label ">Ammount</label>
                <input type="text" name="ammount"  value="<?php echo $ammount ?>" class="form-control w-50 m-auto">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <select name="payment_way" class="form-select w-50 m-auto" >
                    <option>Select payment mood</option>
                    <option>UPI</option>
                    <option>Net banking</option>
                    <option>Paypal</option>
                    <option>Cashon deelivery</option>
                    <option>Pay offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <input type="submit" name="conform_payment" value="Confirm" class="bg-info py-2 px-3 border-0">
            </div>
    </form>

    </div>
</body>
</html>