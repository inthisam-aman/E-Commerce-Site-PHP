<?php
include('../include/connect.php');
include('../function/functions.php');
?>
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
</head>
  <body>
    <?php 
      $user_ip = getIPAddress(); 
      $get_user="SELECT * FROM user WHERE uip_address='$user_ip'";
      $result_user=mysqli_query($con,$get_user);
      $run_query=mysqli_fetch_array($result_user);
      $user_id=$run_query['user_id'];

    ?>
  <div class="container">
    <h2 class="text-center text-info"> Payment option </h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
      <div class="col-md-6">
      <a href="https://www.paypal.com"><h2 class="text-center">Pay Online</h2></a>
</div>
<div class="col-md-6">
      <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">Pay Offline</h2></a>
</div>
    </div>
  </div>

</body>
</html>


