<?php
include('../include/connect.php');
session_start();
?>
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Registration</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 ">
                <label for="admin_name "class="form-label">Username</label>
                <input type="text" name="admin_name" id="admin_name" class="form-control" 
                placeholder="Enter your Username" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="admin_email" class="form-label">Email</label>
                <input type="email" name="admin_email" id="admin_email" class="form-control" 
                placeholder="Enter your Email" autocomplete="off" required="required">
            </div>         
            <div class="form-outline mb-4 ">
                <label for="admin_password" class="form-label">password</label>
                <input type="password" name="admin_password" id="admin_password" class="form-control" 
                placeholder="Enter your Password" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 ">
                <label for="admin_conformpassword" class="form-label">Conform password</label>
                <input type="password" name="admin_conformpassword" id="admin_conformpassword" class="form-control" 
                placeholder="Re Enter your Password" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 insert button">
                <input type="submit" name="save" value="Register" class="btn btn-info">
                <p class="small fw-bold mt-2 pt-1 ">Alreday have an account? <a href="admin_login.php" class="text-danger">Login</a></p>
            </div>  
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php
if(isset($_POST['save'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $admin_conpassword=$_POST['admin_conformpassword'];

    $select_admin="SELECT * FROM `admin` WHERE admin_name='$admin_name' OR admin_email='$admin_email'";
    $result_admin=mysqli_query($con,$select_admin);
    $row_count=mysqli_num_rows($result_admin);
    if($row_count > 0)
    {
        echo "<script>alert('Admin is already added')</script>";
    }
    elseif($admin_password != $admin_conpassword)
    {
        echo "<script>alert('Password do not match')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";   
    }
    else{
        $insert_admin="INSERT INTO `admin` (admin_name , admin_email , password) VALUES ('$admin_name' , '$admin_email' , '$admin_password')";
        $result_insert=mysqli_query($con,$insert_admin);
        if($result_insert){
            echo "<script>alert('Successfully Registerd')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
    }

}
?>