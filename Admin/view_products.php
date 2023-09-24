
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
  <style>
        body{
            overflow-x: hidden;
        }
        .product_image{
            width: 10%;
            object-fit: contain;
        }
    </style>

<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
    <tr>
            <th>Product id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product price</th>
            <th>Total sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $get_products="SELECT * FROM products ";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row_count=mysqli_fetch_assoc($result)){
                $product_id=$row_count['pid'];
                $product_name=$row_count['p_name'];
                $product_image=$row_count['image'];
                $product_price=$row_count['price'];
                $product_status=$row_count['status'];
                $number++;
                ?>
                <tr class='text-center'>
                <td><?php echo $product_id ?></td>
                <td><?php echo $product_name ?></td>
                <td><img src='./product_images/<?php echo $product_image ?>' class='product_image'/></td>
                <td><?php echo $product_price ?></td>
                <td><?php 
                $get_count="SELECT * FROM pending_orders WHERE pid=$product_id"; 
                $result_count=mysqli_query($con,$get_count);
                $row_count=mysqli_num_rows($result_count);
                echo $row_count;
                ?></td>
                <td><?php echo $product_status ?></td>
                <td><a href='index.php?edit_products=<?php echo $product_id?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_product=<?php echo $product_id?>' 
                type="button" class="text-light" data-toggle="modal"
                 data-target="#exampleModal"class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
            
            <?php 
            }
        ?>
    </tbody>
</table>  
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
        <h4>Are You Sure You want to delete this</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_products" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary text-decoration-none"><a href='index.php?delete_product=<?php echo $product_id?>' 
             class="text-light" class='text-light'>Yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

