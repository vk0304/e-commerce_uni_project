<h1 class="text-center text-success">All Orders</h1>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

        <?php
        $get_orders = "select * from user_orders";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);



        if ($row_count == 0) {
            echo "    <h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
        } else {
            echo "</thead>
            <tbody class='bg-secondary '>
        
            <tr class='bg-info text-center'>
            <th>S1no</th>
            <th>Order_id</th>
            <th>Due Amount</th>
            <th>Total Products</th>
            <th>Invoice NO:</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>";
    
    
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $amount_due = $row['amount_due'];
                $invoice_num = $row['invoice_num'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $order_status = $row['order_status'];
                $number++;
                echo "<tr class='text-light text-center'>
                <td>$number</td>
                <td>$order_id</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_num</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_order=$order_id' class='text-light' type='button' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>;

                
            </tr>";

            }
        }




        ?>
        
    
        
    </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        
      </div>
      <div class="modal-body">
        
        <h4>Are you sure you want to delete this Order?</h4>
      </div>
      <div class="modal-footer">
        
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-light text-decoration-none'>Yes</a></button>

      </div>
    </div>
  </div>
</div>

