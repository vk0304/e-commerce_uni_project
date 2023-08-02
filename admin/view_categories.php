<h1 class="text-center text-success">All Categories</h1>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <td>S1no</td>
            <td>Category Title</td>
            <td>Edit</td>
            <td>Delate</td>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php

        $select_category = "select * from categories";
        $resul_category = mysqli_query($con, $select_category);
        $num = 0;
        while ($row_category = mysqli_fetch_assoc($resul_category)) {
            $category_id = $row_category['category_id'];
            $category_title = $row_category['category_title'];
            $num++;
            ?>

            <tr class="text-center">
                <td><?php echo $num ?></td>
                <td><?php echo $category_title ?></td>
                <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>

                <?php
        }


        ?>

        </tr>
    </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        
      </div>
      <div class="modal-body">
        
        <h4>Are you sure you want to delete this Category?</h4>
      </div>
      <div class="modal-footer">
        
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        <button type="button" class="btn btn-primary"><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light text-decoration-none'>Yes</a></button>

      </div>
    </div>
  </div>
</div>

