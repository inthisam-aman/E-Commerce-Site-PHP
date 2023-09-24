<?php

include('../include/connect.php');
if(isset($_POST['save'])){
  $brands_title=$_POST['Brands'];

  $select_query="SELECT * FROM brands WHERE brand_title='$brands_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('Already added')</script>";
  }
  else{

  $insert_query="INSERT INTO brands (brand_title) VALUES ('$brands_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('successfully')</script>";
  }
}
}
?>



<h2 class="text-center">Insert Brands</h2>

<form action="" method="post" class="mb-2">
<div class="input-group wd-90 mb-3">
  <span class="input-group-text bg-info" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="Brands" placeholder="Insert_Brands" aria-label="Username" aria-describedby="addon-wrapping">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="Submit" class=" bg-info" name="save" value="Insert" aria-label="Username" aria-describedby="addon-wrapping" >
</div>
</form> 