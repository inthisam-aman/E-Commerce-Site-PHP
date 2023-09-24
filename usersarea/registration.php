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
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 ">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" 
                placeholder="Enter your Username" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" 
                placeholder="Enter your Email" autocomplete="off" required="required">
            </div>         
            <div class="form-outline mb-4 ">
                <label for="user_address" class="form-label">Address</label>
                <input type="text" name="user_address" id="user_address" class="form-control" 
                placeholder="Enter your Address" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="user_contact" class="form-label">Contact</label>
                <input type="text" name="user_contact" id="user_contact" class="form-control" 
                placeholder="Enter your Contact Number" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="user_password" class="form-label">password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" 
                placeholder="Enter your Password" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="user_conformpassword" class="form-label">Conform password</label>
                <input type="password" name="user_conformpassword" id="user_conformpassword" class="form-control" 
                placeholder="Re Enter your Password" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 insert button">
                <input type="submit" name="save" value="Register" class="btn btn-info">
                <p class="small fw-bold mt-2 pt-1 ">Alreday have an account? <a href="userlogin.php" class="text-danger">Login</a></p>
            </div>  
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<!-- php code-->
<?php 
    if(isset($_POST['save'])){
          $user_username=$_POST['user_username'];
          $user_email=$_POST['user_email'];
          $user_password=$_POST['user_password'];
          $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
          $user_conformpassword=$_POST['user_conformpassword'];
          $user_address=$_POST['user_address'];
          $user_contact=$_POST['user_contact'];
          $user_ip=getIPAddress();
          //select query
          $select_query="SELECT * FROM `user` WHERE user_name='$user_username' OR email='$user_email'";
          $result=mysqli_query($con,$select_query);
          $rows_count=mysqli_num_rows($result);
          if($rows_count > 0){
            echo "<script>alert('Already added')</script>";
          }elseif($user_password!=$user_conformpassword){
            echo "<script>alert('Password do not match')</script>";
            echo "<script>window.open('registration.php','_self')</script>";
          }
          else{
                //Insert Query
                $insert_query="INSERT INTO `user` (user_name,email,password,uip_address,address,mobile) VALUES
                ('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
                  $result_query=mysqli_query($con,$insert_query);
          }         
           //,email='$user_email',password='$user_password'
           //uip_address='$user_ip',address='$user_address',mobile='$user_contact' 
           $select_cart_items="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
           $result_cart=mysqli_query($con,$select_cart_items);
           $rows_count_cart=mysqli_num_rows($result_cart);
           if($rows_count_cart > 0)
           {
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
           }else{
            echo "<script>window.open('../index.php','_self')</script>";
           }
         }
?>
