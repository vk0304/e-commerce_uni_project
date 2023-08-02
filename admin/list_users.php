<h1 class="text-center text-success">All Users</h1>
<table class="table table-bordered mt-5">
  <thead class="bg-info">

    <?php
    $get_users = "select * from uuser_table";
    $result = mysqli_query($con, $get_users);
    $row_count = mysqli_num_rows($result);



    if ($row_count == 0) {
      echo "<h2 class='text-danger text-center mt-5'>No users registered yet</h2>";
    } else {
      echo "</thead>
            <tbody class='bg-secondary '>
        
            <tr class='bg-info text-center'>
            <th>S1no</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>";


      $number = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_address = $row['user_address'];
        $user_phone = $row['user_phone'];
        $number++;
        echo "<tr class='text-light text-center'>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../users_area/user_images/$user_image' class='product_image'></td>
                <td>$user_address</td>
                <td>$user_phone</td>
                <td><a href='index.php?delete_user=$user_id' class='text-light' type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>;

                
            </tr>";

      }
    }




    ?>



    </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">

        <h4>Are you sure you want to remove this User?</h4>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        <button type="button" class="btn btn-primary"><a href='index.php?delete_user=<?php echo $user_id ?>'
            class='text-light text-decoration-none'>Yes</a></button>

      </div>
    </div>
  </div>
</div>