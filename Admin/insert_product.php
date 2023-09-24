<?php
include('../include/connect.php');
if(isset($_POST['insert_products']))
{
    $product_title=$_POST['product_title'];
    $Description=$_POST['Description'];
    $vendor=$_POST['vendor'];
    $cat=$_POST['product_cat'];
    $brand=$_POST['product_brand'];
    $price=$_POST['Product_price'];
    $status="true";
    // images
    $image=$_FILES['Product_image']['name'];
    $temp_image=$_FILES['Product_image']['tmp_name'];
    //checking condition
    if($product_title=='' or $Description=='' or $vendor=='' or $cat=='' or $brand=='' or $price=='' or $image=='')
    {
        echo"<script>alert('fill the fileds')</script>";
        exit();
    }else
    {
        // image insert into folder
        move_uploaded_file($temp_image,"./product_images/$image");

        // data insert into database
        $insert_query="INSERT INTO products (p_name,description,vendor,cid,bid,image,price,date,status) VALUES ('$product_title',
        '$Description','$vendor','$cat','$brand','$image','$price',NOW(),'$status')";
        $result=mysqli_query($con,$insert_query);
        if($result)
        {
            echo "<script>alert('successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
?>
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Products</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-light">
    <!-- Title -->
    <div class="container mb-3 w-50 m-auto">
        <h2 class="text-center">Insert Products</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" 
                placeholder="Enter product title" autocomplete="off" required="required">
            </div>  
    <!-- Description -->   
            <div class="form-outline mb-4 ">
                <label for="Description" class="form-label">Product Description</label>
                <input type="text" name="Description" id="Descriptionct_title" class="form-control" 
                placeholder="Enter product description" autocomplete="off" required="required">
            </div>
    <!-- keyword --> 
            <div class="form-outline mb-4 ">
                <label for="Product_Keyword" class="form-label">Vender Name</label>
                <input type="text" name="vendor" id="Product_Keyword" class="form-control" 
                placeholder="Enter Vendor Name" autocomplete="off" required="required">
            </div>   
    <!-- catogeries --> 
            <div class="form-outline mb-4 ">
                <select name="product_cat" id="" class="form-select">
                    <option value="">Select Catogeries</option>
                    <?php
                      $select_query="SELECT * FROM catogeries";
                      $result=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result))
                      {
                        $title=$row['c_title'];
                        $id=$row['cid'];
                        echo "<option value='$id'>$title</option>";
                      }
                    ?>
                </select>
            </div>   
     <!-- brands --> 
            <div class="form-outline mb-4 ">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select brands</option>
                    <?php
                      $select_query="SELECT * FROM brands";
                      $result=mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result))
                      {
                        $title=$row['brand_title'];
                        $id=$row['bid'];
                        echo "<option value='$id'>$title</option>";
                      }
                    ?>
                </select>
            </div> 
     <!-- images --> 
            <div class="form-outline mb-4 ">
                <label for="Product_image" class="form-label">Product Image</label>
                <input type="file" name="Product_image" id="Product_image" class="form-control" required="required">
            </div> 
     <!-- Price -->
            <div class="form-outline mb-4 ">
                <label for="Product_price" class="form-label">Product Price</label>
                <input type="text" name="Product_price" id="Product_price" class="form-control" 
                placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
     <!-- Button -->
            <div class="form-outline mb-4 insert button">
                <input type="submit" name="insert_products" value="Insert Products " class="btn btn-info">
            </div>  
        </form>
    </div>
</body>
</html>