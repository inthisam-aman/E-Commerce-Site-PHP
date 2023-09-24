<?php 
if(isset($_GET['delete_cat'])){
    $delete_id=$_GET['delete_cat'];
    //echo $delete_id;

    $delete_query="DELETE  FROM catogeries WHERE cid=$delete_id";
    $result_delete=mysqli_query($con,$delete_query);
    if($result_delete){
        echo "<script>alert('Deleted Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    
}
?>