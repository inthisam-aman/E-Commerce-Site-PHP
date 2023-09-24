<style>
    .form_image{
        width: 10%;
    }
</style>
<?php 
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;
    $get_data="SELECT * FROM products WHERE pid=$edit_id";
    $result_query=mysqli_query($con,$get_data);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $product_name=$row_fetch['p_name'];
    $product_description=$row_fetch['description'];
    $product_vendor=$row_fetch['vendor'];
    $product_cat=$row_fetch['cid'];
    $product_brand=$row_fetch['bid'];
    $product_image=$row_fetch['image'];
    $product_price=$row_fetch['price'];
    //echo $product_name;

    $select_cat="SELECT * FROM catogeries WHERE cid=$product_cat";
    $result_cat=mysqli_query($con,$select_cat);
    $row_cat=mysqli_fetch_assoc($result_cat);
    $cat_name=$row_cat['c_title'];



    $select_brand="SELECT * FROM brands WHERE bid=$product_brand";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_name=$row_brand['brand_title'];


}

    ?>
<div class="container mt-5">
    <h3 class="text-center text-success">Edit Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4 ">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" value="<?php echo $product_name ?>"
                class="form-control" 
                placeholder="Enter Product Name" autocomplete="off">
            </div> 
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" 
                value="<?php echo $product_description ?>"placeholder="Enter Product Description" autocomplete="off">
            </div>   
            <div class="form-outline w-50 m-auto mb-4">
                <label for="Vendor" class="form-label">Vendor</label>
                <input type="text" name="Vendor" id="Vendor" class="form-control" 
                value="<?php echo $product_vendor ?>"placeholder="Enter Vendor Name" autocomplete="off">
            </div>  
            <div class="form-outline w-50 m-auto mb-4">
            <label for="Catogory" class="form-label">Select Catogory</label>
                <select name="product_cat" class="form-select">
                <option value="<?php echo $cat_name?>"><?php echo $cat_name ?></option>
                <?php 
                    $select_cat_all="SELECT * FROM catogeries ";
                    $result_cat_all=mysqli_query($con,$select_cat_all);
                    while($row_cat_all=mysqli_fetch_assoc($result_cat_all)){
                        $cat_name_all=$row_cat_all['c_title'];
                        $cat_id_all=$row_cat_all['cid'];
                        echo "<option value='$cat_id_all'>$cat_name_all</option>";
                    }
                   
                    ?>
                </select>
            </div>  
            <div class="form-outline w-50 m-auto mb-4">
            <label for="Brand" class="form-label">Select Brand</label>
                <select name="product_brand" class="form-select">
                    <option value="<?php echo $brand_name?>" ><?php echo $brand_name ?></option>
                    <?php 
                    $select_brand_all="SELECT * FROM brands ";
                    $result_brand_all=mysqli_query($con,$select_brand_all);
                    while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                        $brand_name_all=$row_brand_all['brand_title'];
                        $brand_id_all=$row_brand_all['bid'];
                        echo "<option value='$brand_id_all'>$brand_name_all</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image" class="form-label">product image</label>
                <div class="d-flex">
                <input type="file" name="product_image" id="product_image" class="form-control" 
                placeholder="Enter The Price" autocomplete="off">
                <img src="./product_images/<?php echo $product_image?>"class="form_image">
                </div>
            </div>   
            <div class="form-outline w-50 m-auto mb-4">
                <label for="price" class="form-label">price</label>
                <input type="text" name="price" id="price" class="form-control" 
                value="<?php echo $product_price?>" placeholder="Enter The Price" autocomplete="off">
            </div>   
            <div class="form-outline mb-4 insert button text-center">
                <input type="submit" name="edit_product" value="Update" class="btn btn-info">
            </div>  
    </form>
</div>
<?php 
if(isset($_POST['edit_product'])){
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_vendor=$_POST['Vendor'];
    $product_cat=$_POST['product_cat'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['price'];
    $product_image=$_FILES['product_image']['name'];
    $temp_image=$_FILES['product_image']['tmp_name'];


        move_uploaded_file($temp_image,"./product_images/$product_image");
        $update_query="UPDATE products SET p_name=' $product_name' , description='$product_description' , 
        vendor='$product_vendor' , cid= $product_cat , bid=$product_brand , image='$product_image' , price='$product_price' ,
        date=NOW() WHERE pid= $edit_id" ;
        $result_update=mysqli_query($con,$update_query);
            if($result_update){
            echo "<script>alert('Updated Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                echo "<script>alert('Updated Not Successfull')</script>";
            }
    }
?>