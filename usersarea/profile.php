<?php
include('../include/connect.php');
include('../function/functions.php');
session_start();
?>
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " >
    <div class="container-fluid p-0" >
      <a class="navbar-brand"><i class="fa fa-cart-plus"></i> Infinite Texttiles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" 
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <?php 
                          if(!isset($_SESSION['username'])){
                            echo"<a class='nav-link active' aria-current='page' >Welcome Guest</a>";
                        }else{
                          echo"<a class='nav-link active' > Welcome ".$_SESSION['username']." </a>";
                        }
          ?>
          <a class="nav-link active" aria-current="page" href="../index.php"><i class="fa fa-home"></i> Home</a>
          
          <?php
              if(!isset($_SESSION['username'])){
                  echo"<a class='nav-link active' href='userlogin.php'  ><i class='fa fa-sign-in' ></i> Login</a>";
              }else{
                echo"<a class='nav-link active' href='logout.php' ><i class='fa fa-sign-in' ></i> Logout</a>";
              }
              ?>
              
            
        </div>
      </div>
    </div>
  </nav>

<h2 class="text-center  my-5">Welcome to user profile</h2>
     <div class="row">
      <div class="col-md-2">
        <ul class="navbar-nav bg-info  text-center ">
        <li class="nav-item bg-info">
        <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
      </li>

           
            <li class="nav-item bg-dark ">
        <a class="nav-link text-light" href="profile.php">Pending Orders</a>
      </li>
      <?php 
            $username=$_SESSION['username'];
      ?>

      <li class="nav-item  bg-dark">
        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
      </li>
      <li class="nav-item bg-dark">
        <a class="nav-link text-light" href="profile.php?my_order">My Orders</a>
      </li> 
      <li class="nav-item bg-dark">
        <a class="nav-link text-light" href="profile.php?delete_account">Delete Accout</a>
      </li>
      <li class="nav-item bg-dark">
        <a class="nav-link text-light" href="logout.php">Logout</a>
      </li>
      </ul>
      </div>
      <div class="col-md-10 text-center">
      <?php 
        get_user_order_details();
        if(isset($_GET['edit_account'])){
          include('edit_account.php');
        }
        if(isset($_GET['my_order'])){
          include('my_orders.php');
        }
      ?>
      </div>
      
     </div>




    
    <script src="js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
     crossorigin="anonymous"></script>
</body>
</html>


