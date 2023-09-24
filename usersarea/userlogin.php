<?php
include('../include/connect.php');
include('../function/functions.php');
@session_start();
?>

<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
  <body>
    <div class="container-fluid my-5">
        <h2 class="text-center my-5">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 ">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" 
                placeholder="Enter your Username" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="user_password" class="form-label">password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" 
                placeholder="Enter your Password" autocomplete="off" required="required">
            </div>          
            <div class="form-outline mb-4 insert button">
                <input type="submit" name="login" value="Login" class="btn btn-info">
                <p class="small fw-bold mt-2 pt-1 ">Dont have an account? <a href="registration.php" class="text-danger">Register</a></p>
            </div>  
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php 
  if(isset($_POST['login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="SELECT * FROM user WHERE user_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    //cart item

    $select_query_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($result_cart);
    
    if($row_count > 0){
       if(password_verify($user_password,$row_data['password'])){
        $_SESSION['username']=$user_username;
        //echo "<script>alert('Login Successful')</script>";
        if($row_count==1 and $row_count_cart==0 ){
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }else{
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
        }
       }
       else{
        echo "<script>alert('Invalid Attempt')</script>";
       }

    }else{
        echo "<script>alert('Invalid Attempt')</script>";
    }

  }
?>