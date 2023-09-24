<?php
include('../include/connect.php');
include('../function/functions.php');
@session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <style>
        body{
            overflow-x: hidden;
            
        }
    </style>
  </head>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<nav class="navbar navbar-expand-lg navbar-light bg-info " >
    <div class="container-fluid p-0" >
        <div class="navbar-nav ">
         <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
              <li class="nav-item">
              <?php 
                          if(!isset($_SESSION['adminname'])){
                            echo"<a class='nav-link active' aria-current='page' >Welcome Guest</a>";
                        }else{
                          echo"<a class='nav-link active' > Welcome ".$_SESSION['adminname']." </a>";
                        }
          ?>
              </li>
            </ul>
         </nav>
        </div>
    </div>
</nav>
<div class="bg-light">
  <h3 class="text-center p-2">Welcome To The Admin Dashboard</h3>
</div>
<div class="row">
  <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
    <div>
    <a href="#"><img src="../images/a1.png." alt="" class="admin_image"></a>
    <p class="text-center text-light"><?php 
                          if(!isset($_SESSION['adminname'])){
                            echo"<a class='nav-link active' aria-current='page' >Admin Name</a>";
                        }else{
                          echo"<a class='nav-link active' > Welcome ".$_SESSION['adminname']." </a>";
                        }
          ?></p>
    </div>
    <div class="button text-center">
    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
    <button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
    <button class="my-3"><a href="index.php?insert_catogories" class="nav-link text-light bg-info my-1">Insert Catogories</a></button>
    <button class="my-3"><a href="index.php?view_cat" class="nav-link text-light bg-info my-1">View Catogeries</a></button>
    <button class="my-3"><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1"> Insert Brands</a></button>
    <button class="my-3"><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
    <button class="my-3"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
    <button class="my-3"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
    <button class="my-3"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">All Users</a></button>
    <button class="my-3"><a href="index.php?logout" class="nav-link text-light bg-info my-1">Log out</a></button>
    <button class="my-3"><a href="index.php?view_site" class="nav-link text-light bg-info my-1">View Site</a></button>
</div>
  </div>
</div> 
<div class="container my-3">
  <?php
  if(isset($_GET['insert_catogories'])){
    include('insert_catogories.php');
  }
  ?>
</div>

<div class="container my-3">
  <?php
  if(isset($_GET['insert_brands'])){
    include('insert_brands.php');
  }
  if(isset($_GET['view_products'])){
    include('view_products.php');
  }
  if(isset($_GET['view_cat'])){
    include('view_cat.php');
  }
  if(isset($_GET['view_brands'])){
    include('view_brands.php');
  }
  if(isset($_GET['edit_products'])){
    include('edit_products.php');
  }
  if(isset($_GET['edit_cat'])){
    include('edit_cat.php');
  }
  if(isset($_GET['edit_brand'])){
    include('edit_brand.php');
  }
  if(isset($_GET['delete_product'])){
    include('delete_product.php');
  }
  if(isset($_GET['delete_brand'])){
    include('delete_brand.php');
  }
  if(isset($_GET['delete_cat'])){
    include('delete_cat.php');
  }
  if(isset($_GET['list_orders'])){
    include('list_orders.php');
  }
  if(isset($_GET['list_payments'])){
    include('list_payments.php');
  }
  if(isset($_GET['list_users'])){
    include('list_users.php');
  }
  if(isset($_GET['logout'])){
    include('logout.php');
  }
  if(isset($_GET['view_site'])){
    include('view_site.php');
  }
  ?>
</div>


<script src="js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>