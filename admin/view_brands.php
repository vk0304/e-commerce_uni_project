<h1 class="text-center text-success">All Brands</h1>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <td>S1no</td>
            <td>Brand Title</td>
            <td>Edit</td>
            <td>Delate</td>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php

        $select_brand = "select * from brands";
        $resul_brand = mysqli_query($con, $select_brand);
        $num = 0;
        while ($row_brand = mysqli_fetch_assoc($resul_brand)) {
            $brand_id = $row_brand['brand_id'];
            $brand_title = $row_brand['brand_title'];
            $num++;
            ?>

            <tr class="text-center">
                <td><?php echo $num ?></td>
                <td><?php echo $brand_title ?></td>
                <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-light' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>

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
        
        <h4>Are you sure you want to delete this Brand?</h4>
      </div>
      <div class="modal-footer">
        
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-light text-decoration-none'>Yes</a></button>

      </div>
    </div>
  </div>
</div>




