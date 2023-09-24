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
    <title>Bootstrap demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <style>
    .cart_image{
    width:  70px;
    height: 70px;
    object-fit: content;

    }
    .remove{
      width: 100px;
      object-fit: content;
    }

        body{
            overflow-x: hidden;
        }

    </style>
  </head>
  <body>
    <link rel="stylesheet" type="text/css" href="style.css">
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
          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home</a>
          <?php
              if(!isset($_SESSION['username'])){
                  echo"<a class='nav-link active' href='./usersarea/userlogin.php'  ><i class='fa fa-sign-in' ></i> Login</a>";
              }else{
                echo"<a class='nav-link active' href='./usersarea/userlogout.php'  ><i class='fa fa-sign-in' ></i> Logout</a>";
              }
              ?>
  
              <a class="nav-link active" href="cart.php"><?php cart_item(); ?><i class="fa fa-shopping-cart" ></i> cart</a>
              
        </div>
      </div>
    </div>
  </nav>
  <div class="container my-5 " >   
    <div class="row">
        <table class="table table-bordered text-center">
           
            <tbody>
              <!-- php code to display dynamic data -->
            <?php           
              $total_price=0;
              $ip = getIPAddress(); 
              $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count > 0){
                  echo " <thead>
                  <tr>
                      <th>Product Title</th>
                      <th>Image</th>
                      <th>Quentity</th>
                      <th>Total Price</th>
                      <th>Remove</th>
                      <th colspan='2'>Operations</th>
                  </tr>
              </thead>";
              while($row=mysqli_fetch_array($result))
              {
                $product_id=$row['pid'];
                $select_products="SELECT * FROM `products` WHERE pid=$product_id";
                $result_products=mysqli_query($con,$select_products);
                while($row_product_price=mysqli_fetch_array($result_products))
                {
                  $product_price=array($row_product_price['price']);
                  $price_table=$row_product_price['price'];
                  $product_title=$row_product_price['p_name'];
                  $product_image=$row_product_price['image'];
                  $product_values=array_sum($product_price);
                  $total_price += $product_values;            
            ?>
            <form action="" method="post">
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./Admin/product_images/<?php echo $product_image?>" alt="" class="cart_image"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php 
                      $ip = getIPAddress();
                      if(isset($_POST['update_cart'])){
                        $quentity=$_POST['qty'];
                        $update_cart="UPDATE cart_details SET quentity=$quentity WHERE ip_address='$ip'";
                        $update_result=mysqli_query($con,$update_cart);
                        $total_price=$total_price*$quentity;
                      }
                    ?>
                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                    <td>
                       <!-- <button class="bg-info px-3 py-2 border-0 mx-3">update</button>-->
                       <input type="submit" value="update" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">                  
                        <!--<button class="bg-info px-3 py-2 border-0 mx-3">remove</button>-->
                      <input type="submit" value="Remove" class="bg-danger px-3 py-2 border-0 mx-3" name="remove_cart">                        
                    </td>                    
                </tr>                
                <?php 
                  }
                }
              }
              else{
                echo "<h2 class='text-center text-danger my-5'>Cart Is Empty</h2>";
              }
                ?>               
            </tbody>            
        </table>
        </form>
        <?php 
        function remove_cart_item(){
          global $con;

          if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="DELETE FROM cart_details WHERE pid=$remove_id";
                $delete_result=mysqli_query($con,$delete_query);
                if($delete_result){
                  echo "<script>window.open('cart.php','_self')</script>";
                }
            }
          }
        }
      
        remove_cart_item();
        ?>
        <div class="d-flex">
          <?php 
              $ip = getIPAddress(); 
              $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count > 0){
                 echo "<h4 class='px-3'>Sub Total:  $total_price</h4>
                 <a href='index.php'><button class='bg-info px-3 py-2 border-0'>Continue Shopping</button></a>
                 <a href='./usersarea/checkout.php'><button class='bg-secondary px-3 py-2 mx-3 border-0 text-light'>Checkout</button></a>";
                }
                else{
                  echo "<a href='index.php'><button class='bg-info px-3 py-2 border-0'>Continue Shopping</button></a>";
                }
          ?>
 
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