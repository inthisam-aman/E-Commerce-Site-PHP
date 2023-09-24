<?php
include('../include/connect.php');
include('../function/functions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}
//get item total price and total item
$get_ip = getIPAddress(); 
$total_price=0;
$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip'";
$result_cart=mysqli_query($con,$cart_query);
$invoive_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart);
while($row_price=mysqli_fetch_array($result_cart)){
    $product_id=$row_price['pid'];
    $product_query="SELECT * FROM products WHERE pid='$product_id'";
    $result_product=mysqli_query($con,$product_query);
    while($row_product_price=mysqli_fetch_array($result_product)){
        $product_price=array($row_product_price['price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}
// get qty from cart
$get_cart="SELECT * FROM cart_details";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quentity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}
//insert query
$insert_order="INSERT INTO user_order (user_id,ammount,invoice_no,total_products,order_date,order_status) VALUES 
($user_id,$subtotal,$invoive_number,$count_products,NOW(),'$status')";
$result_order=mysqli_query($con,$insert_order);
if($result_order){
    echo "<script>alert('Order Insert Successful')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//pending orders
$insert_pending_order="INSERT INTO pending_orders (user_id,invoice_no,pid,quantity,order_status) VALUES 
($user_id,$invoive_number,$product_id,$quantity,'$status')";
$result_pending=mysqli_query($con,$insert_pending_order);

//dlt items from cart once user is make the order
$empty_cart="DELETE FROM cart_details WHERE ip_address='$get_ip'";
$result_empty=mysqli_query($con,$empty_cart);
?>