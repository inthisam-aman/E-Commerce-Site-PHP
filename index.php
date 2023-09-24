<?php
include('include/connect.php');
include('function/functions.php');
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Infinite</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <style>
        body{
            overflow-x: hidden;
        }
    </style>   
  </head>
  <body>
    <link rel="stylesheet" type="text/css" href="style.css">
  <nav class="navbar navbar-expand-lg navbar-dark bg-info text-dark fixed-top " >
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
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home</a>  
          <?php
              if(!isset($_SESSION['username'])){
                  echo"<a class='nav-link active' href='./usersarea/userlogin.php'  ><i class='fa fa-sign-in' ></i> Login</a>";
              }else{
                echo"<a class='nav-link active' href='./usersarea/logout.php'  ><i class='fa fa-sign-in' ></i> Logout</a>";
              }
              ?>
              <?php 
              if(isset($_SESSION['username'])){
                  echo " <a class='nav-link active' href='./usersarea/profile.php'><i class='fa fa-user' ></i> My Account</a>";
              }else{
                echo " <a class='nav-link active' href='./usersarea/registration.php'><i class='fa fa-user' ></i> Register</a>";
              }
              ?>        
              <a class="nav-link active" href="cart.php"><?php cart_item(); ?><i class="fa fa-shopping-cart" ></i> cart</a>
              <a class="nav-link active"  >Total Price <?php cart_price(); ?></a>
        </div>
      </div>
    </div>
  </nav>
  <div class="row px-1">
    <div class="col-md-10">
      <div class="row">

      <?php

        cart();

      ?>

      <?php
      getproduct();
      getuniquecat();
      getuniquebrand();
      //$ip = getIPAddress();  
      //echo 'User Real IP Address - '.$ip;
      ?>     
    </div>
</div>
    <div class="col-2 bg-secondary p-0">
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-dark">
            <a href="#" class="nav-link text-light my-5" ><h4> Brands </h4></a>
          </li>
            <?php
              getbrands();
            ?>
        </ul>
        <ul class="navbar-nav me-auto text-center ">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light bg-dark " ><h4>Catogeries</h4></a>
          </li>
          <?php
            getcat();
            ?>
        </ul>
      </div>
    </div>
  </div>
  <div>
  <footer class="text-center text-lg-start bg-dark text-white">
    <section class="container d-flex justify-content-center justify-content-lg-between p-4">
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <div>
        <a href="" class="me-4 text-reset"><i class="fa fa-facebook"></i></a>
        <a href="" class="me-4 text-reset"><i class="fa fa-twitter"></i></a>
        <a href="" class="me-4 text-reset"><i class="fa fa-google"></i></a>
        <a href="" class="me-4 text-reset"><i class="fa fa-instagram"></i></a>
        <a href="" class="me-4 text-reset"><i class="fa fa-linkedin"></i></a>
        <a href="" class="me-4 text-reset"><i class="fa fa-github"></i></a>
      </div>
    </section> 
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4"><i class="fa fa-cart-plus"></i> Infinite</h6>
            <p>
               Infinite.com is a one stop destination for your family's fashion needs.
               We give you the opportunity to give your wardrobe a makeover with the latest collections from our top brands.
            </p>
          </div>  
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Make Money with Us</h6>
            <p><a href="#!" class="text-reset">Sell on Infinite</a></p>
            <p><a href="#!" class="text-reset">Advertise Your Products</a></p>
            <p><a href="#!" class="text-reset">Become an Affiliate</a></p>
            <p><a href="#!" class="text-reset">Fulfilment by Infinite</a></p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
            <p><a href="#!" class="text-reset">FAQ</a></p>
            <p><a href="#!" class="text-reset">Feedback</a></p>
            <p><a href="#!" class="text-reset">About Us</a></p>
            <p><a href="#!" class="text-reset">Contact Us</a></p>
          </div>         
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4"> Contact</h6>
            <p><i class="fa fa-home"></i>Infinite</p>
            <p><i class="fa fa-envelope"></i> infinite@example.com</p>
            <p><i class="fa fa-phone"></i> 065-2245635</p>
          </div> 
        </div>
      </div>
    </section>
    <div class="text-center p-4">
      &copy;  2024 Copyright <a class="text-reset fw-bold" href="https://infinite.in/"> Infinite.in</a>
    </div>
  </footer>
</div>
    <script src="js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
     crossorigin="anonymous"></script>
  </body>
</html>