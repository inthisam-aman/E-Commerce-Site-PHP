
<?php 
if(isset($_GET['edit_cat'])){
    $cat_id=$_GET['edit_cat'];
    //echo $edit_id;
    $get_data="SELECT * FROM catogeries WHERE cid=$cat_id";
    $result_query=mysqli_query($con,$get_data);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $cat_name=$row_fetch['c_title'];
    //echo $cat_name;
}
if(isset($_POST['update_catogery'])){
    $cat_title=$_POST['cat_name'];
    $update_query="UPDATE catogeries SET c_title='$cat_title' WHERE cid=$cat_id";
    $result_update=mysqli_query($con,$update_query);
    if($result_update){
        echo "<script>alert('Updated Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>
<div class="container mt-5">
    <h3 class="text-center text-success">Edit Catogeries</h3>
    <form action="" method="post">
            <div class="form-outline w-50 m-auto mb-4 ">
                <label for="cat_name" class="form-label">Catogery Name</label>
                <input type="text" name="cat_name" id="cat_name"  class="form-control" value="<?php echo $cat_name ; ?>" 
                placeholder="Enter Catogerie Name" autocomplete="off">
            </div> 
            
            <div class="form-outline mb-4 insert button text-center">
                <input type="submit" name="update_catogery" value="Update" class="btn btn-info">
            </div>  
    </form>
</div>
