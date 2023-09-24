<h3 class="text-center text-success">View Catogeries</h3>
<table class="table table-borderd-mt-5">
<thead class="bg-info text-center">
    <tr>
            <th>Brand ID</th>
            <th>Brand Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php 
            $get_brands="SELECT * FROM brands ";
            $result=mysqli_query($con,$get_brands);
            $number=0;
            while($row_count=mysqli_fetch_assoc($result)){
                $brand_id=$row_count['bid'];
                $brand_title=$row_count['brand_title'];
                $number++;
                ?>
                <tr class='text-center'>
                <td><?php echo $brand_id ?></td>
                <td><?php echo $brand_title ?></td>
                <td><a href='index.php?edit_brand=<?php echo $brand_id ?>'class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_brand=<?php echo $brand_id?>' 
                type="button" class="text-light" data-toggle="modal"
                 data-target="#exampleModal"class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                </tr>
            
            <?php 
            }
        ?>
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">
        <h4>Are You Sure You want to delete this</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary text-decoration-none"><a href='index.php?delete_brand=<?php echo $brand_id?>' 
             class="text-light" class='text-light'>Yes</a></button>
      </div>
    </div>
  </div>
</div>
