<?php 
if(isset($_GET['edit_account'])){
    $username=$_SESSION['username'];
    $select_query="SELECT * FROM user WHERE user_name='$username'";
    $result=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['email'];
    $user_address=$row_fetch['address'];
    $user_mobile=$row_fetch['mobile'];
}
if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $update_data=" UPDATE user SET user_name='$username' , email='$user_email' , address='$user_address' , 
    mobile='$user_mobile' WHERE user_id=$update_id";
    $result=mysqli_query($con,$update_data);
    if($result){
        echo "<script>alert('updated')</script>";
        echo "<script>window.open('logout.php','_self')</script>";
    }
}

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
  <style>
        body{
            overflow-x: hidden;
        }
    </style>
  <h3 class="text-succrss mb-4">Edit Account</h3>
  <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name?>" name="user_username">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_email?>" name="user_email">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address?>" name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile?>" name="user_mobile">
    </div>
    <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
  </form>
</body>
</html>

