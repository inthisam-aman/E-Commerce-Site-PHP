<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
         
         $get_user="SELECT * FROM user";
         $result_user=mysqli_query($con,$get_user);
         $row_count=mysqli_num_rows($result_user);
         echo "<tr>
         <th>SL NO</th>         
         <th>User Name</th>
         <th>Email Address</th>
         <th>Local Address</th>
         <th>Contact Number</th>
         <th>Delete</th>
        </tr>
        </thead>
        <tbody class='bg-secondary text-center text-light'>";
         if($row_count==0){
            echo"<h2 class='bg-danger text-center mt-5'>No Users In Database</h2>";
         }
         else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_user)){
                $user_name=$row_data['user_name'];
                $email=$row_data['email'];               
                $local_address=$row_data['address'];
                $contact_no=$row_data['mobile'];
                $number++;
                echo"<tr>
                <td>$number</td>
                <td>$user_name</td>
                <td>$email</td>
                <td>$local_address</td>
                <td>$contact_no</td>
                <td><a href='index.php?delete_users' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            }
         }
        ?>
        
        
    </tbody>
</table>