<?php

//get the card products
    function getproduct()
    {
        global $con;
        if(!isset($_GET['catogeries']))
        {
            if(!isset($_GET['brands']))
            {
        $select_query="SELECT * FROM products ORDER BY p_name limit 0,9";
      $result=mysqli_query($con,$select_query);  
      while($row=mysqli_fetch_assoc($result))
      {
          $pid=$row['pid'];
          $p_name=$row['p_name'];
          $description=$row['description'];
          $p_images=$row['image'];
          $cat=$row['cid'];
          $brand=$row['bid'];
          $price=$row['price'];
          echo " 
          <div class='col-md-4 mb-2 my-5'>
            <div class='card my-0'>
             <img src='./Admin/product_images/$p_images' class='card-img-top' alt='...'>
              <div class='card-body'>
             <h5 class='card-title'>$p_name</h5>
             <p class='card-text'>$description</p>
             <p>Price:$price</p>
             <a href='index.php?add_to_cart=$pid' class='btn btn-info'>Add to cart</a>
             <a href='#' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";    
      }
    }
}
}

//getting unique cat
function getuniquecat()
    {
        global $con;
        if(isset($_GET['catogeries']))
        {
            $cat_id=$_GET['catogeries'];
        $select_query="SELECT * FROM products WHERE cid=$cat_id";
      $result=mysqli_query($con,$select_query);  
      $no_of_rows=mysqli_num_rows($result);
      if($no_of_rows==0)
      {
        echo "<h2 class='my-5 text-center text-danger'>Out Of Stock</h2>";
      }
      while($row=mysqli_fetch_assoc($result))
      {
          $pid=$row['pid'];
          $p_name=$row['p_name'];
          $description=$row['description'];
          $p_images=$row['image'];
          $cat=$row['cid'];
          $brand=$row['bid'];
          $price=$row['price'];
          echo " 
          <div class='col-md-4 mb-2 my-5'>
            <div class='card my-0'>
             <img src='./Admin/product_images/$p_images' class='card-img-top' alt='...'>
              <div class='card-body'>
             <h5 class='card-title'>$p_name</h5>
             <p class='card-text'>$description</p>
             <p>Price:$price</p>
             <a href='index.php?add_to_cart=$pid' class='btn btn-info'>Add to cart</a>
             <a href='#' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";    
      }
    }
}

//get unique brands
function getuniquebrand()
    {
        global $con;
        if(isset($_GET['brands']))
        {
            $brand_id=$_GET['brands'];
        $select_query="SELECT * FROM products WHERE bid=$brand_id";
      $result=mysqli_query($con,$select_query); 
      $no_of_rows=mysqli_num_rows($result);
      if($no_of_rows==0)
      {
        echo "<h2 class='my-5 text-center text-danger'>Out Of Stock</h2>";
      } 
      while($row=mysqli_fetch_assoc($result))
      {
          $pid=$row['pid'];
          $p_name=$row['p_name'];
          $description=$row['description'];
          $p_images=$row['image'];
          $cat=$row['cid'];
          $brand=$row['bid'];
          $price=$row['price'];
          echo " 
          <div class='col-md-4 mb-2 my-5'>
            <div class='card my-0'>
             <img src='./Admin/product_images/$p_images' class='card-img-top' alt='...'>
              <div class='card-body'>
             <h5 class='card-title'>$p_name</h5>
             <p class='card-text'>$description</p>
             <p>Price:$price</p>
             <a href='index.php?add_to_cart=$pid' class='btn btn-info'>Add to cart</a>
             <a href='#' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";    
      }
    }
}
//get brand data
    function getbrands()
    {
        global $con;
        $select_brands="SELECT * FROM brands";
        $result=mysqli_query($con,$select_brands);
        while($row_data=mysqli_fetch_assoc($result)){
          $brand_title=$row_data['brand_title'];
          $brand_id=$row_data['bid'];
          echo "<li class='nav-item'>
          <a href='index.php?brands=$brand_id' class='nav-link text-light'>$brand_title</a>
          </li>";
          
        }

    }
    //get cart data
    function getcat()
    {
        global $con;
        $select_cat="SELECT * FROM catogeries";
            $result=mysqli_query($con,$select_cat);
            while($row_data=mysqli_fetch_assoc($result)){
              $cat_title=$row_data['c_title'];
              $cat_id=$row_data['cid'];
              echo "<li class='nav-item'>
              <a href='index.php?catogeries=$cat_id' class='nav-link text-light'>$cat_title</a>
              </li>";
              
            }

        }
        // assing ip
        function getIPAddress() {  
          //whether ip is from the share internet  
           if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                      $ip = $_SERVER['HTTP_CLIENT_IP'];  
              }  
          //whether ip is from the proxy  
          elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
           }  
      //whether ip is from the remote address  
          else{  
                   $ip = $_SERVER['REMOTE_ADDR'];  
           }  
           return $ip;  
      }  
      //$ip = getIPAddress();  
      //echo 'User Real IP Address - '.$ip; 
      
      
//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM cart_details WHERE ip_address='$ip' AND pid=$get_product_id";
    $result=mysqli_query($con,$select_query);
    $no_of_rows=mysqli_num_rows($result);
    if($no_of_rows > 0){
      echo"<script>alert ('This item is already present in cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="INSERT INTO cart_details (pid,ip_address,quentity) VALUES ($get_product_id,'$ip',0)";
      $result=mysqli_query($con,$insert_query);
      echo"<script>alert ('Item is added to cart')</script>";
      echo"<script>window.open('index.php','_self')</script>";
    }
  }
}
function cart_item()
{
  if(isset($_GET['add_to_cart'])){
    global $con;
    $ip = getIPAddress(); 
    $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
    $result=mysqli_query($con,$select_query);
    $no_of_rows=mysqli_num_rows($result);
    }
    else{
      global $con;
      $ip = getIPAddress(); 
      $select_query="SELECT * FROM cart_details WHERE ip_address='$ip'";
      $result=mysqli_query($con,$select_query);
      $no_of_rows=mysqli_num_rows($result);
    }
    echo $no_of_rows;
  }

function cart_price()
{
  global $con;
  $total_price=0;
  $ip = getIPAddress(); 
  $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result))
  {
    $product_id=$row['pid'];
    $select_products="SELECT * FROM `products` WHERE pid=$product_id";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products))
    {
      $product_price=array($row_product_price['price']);
      $product_values=array_sum($product_price);
      $total_price += $product_values;

    }
  }
  echo $total_price;
}
// get user order details
function get_user_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="SELECT * FROM user WHERE user_name= '$username' ";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_order'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="SELECT * FROM user_order WHERE user_id=$user_id AND order_status='pending'";
          $result_order=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_order);
          if($row_count>0){
            echo "<h3 class='text-center'>You have <span class='text-danger'>$row_count</span> pending orders</h3>";
          }
        }
      }     
    }
  }
}
?>