
<?php 
if(isset($_GET['edit_brand'])){
    $brand_id=$_GET['edit_brand'];
    //echo $edit_id;
    $get_data="SELECT * FROM brands WHERE bid=$brand_id";
    $result_query=mysqli_query($con,$get_data);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $brand_name=$row_fetch['brand_title'];
    //echo $cat_name;
}
if(isset($_POST['update_brand'])){
    $brand_title=$_POST['brand_name'];
    $update_query="UPDATE brands SET brand_title='$brand_title' WHERE bid=$brand_id";
    $result_update=mysqli_query($con,$update_query);
    if($result_update){
        echo "<script>alert('Updated Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>
<div class="container mt-5">
    <h3 class="text-center text-success">Edit Brands</h3>
    <form action="" method="post">
            <div class="form-outline w-50 m-auto mb-4 ">
                <label for="cat_name" class="form-label">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name"  class="form-control" value="<?php echo $brand_name ; ?>" 
                placeholder="Enter Brand Name" autocomplete="off">
            </div> 
            
            <div class="form-outline mb-4 insert button text-center">
                <input type="submit" name="update_brand" value="Update" class="btn btn-info">
            </div>  
    </form>
</div>
