<?php
include('../include/connect.php');
@session_start();
?>

<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
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
        <h2 class="text-center my-5">Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 ">
                <label for="admin_name" class="form-label">Username</label>
                <input type="text" name="admin_name" id="admin_name" class="form-control" 
                placeholder="Enter your Username" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="admin_password" class="form-label">password</label>
                <input type="password" name="admin_password" id="admin_password" class="form-control" 
                placeholder="Enter your Password" autocomplete="off" required="required">
            </div>          
            <div class="form-outline mb-4 insert button">
                <input type="submit" name="login" value="Login" class="btn btn-info">
                <p class="small fw-bold mt-2 pt-1 ">Dont have an account? <a href="admin_registration.php" class="text-danger">Register</a></p>
            </div>  
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
if(isset($_POST['login']))
{
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];

    $select_query="SELECT * FROM `admin`";
    $result=mysqli_query($con,$select_query);
    $row_data=mysqli_fetch_assoc($result);

    if($admin_password==$row_data['password'] and $admin_name==$row_data['admin_name'])
    {    
            $_SESSION['adminname']=$admin_name;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
    }
    else{
        $_SESSION['adminname']=$admin_name;
        echo "<script>alert('Login Not Successful')</script>";
    }
}
?>