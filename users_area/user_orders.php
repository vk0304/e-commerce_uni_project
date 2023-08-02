<?php
$username = $_SESSION['username'];
$get_user = "select * from uuser_table where username = '$username'";
$sql_execute = mysqli_query($con, $get_user);
$row_data = mysqli_fetch_assoc($sql_execute);
$user_id = $row_data['user_id'];


?>




<h3 class="text-success">All My Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>SI no</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Invoice No</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody class="bg-secondary text-light">

        <?php

        $get_order_details = "select * from user_orders where user_id='$user_id'";
        $result_order = mysqli_query($con, $get_order_details);
        $number=1;
        while ($row_orders = mysqli_fetch_assoc($result_order)) {
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $invoice_num = $row_orders['invoice_num'];
            $total_products = $row_orders['total_products'];
            $order_date = $row_orders['order_date'];
            $order_status = $row_orders['order_status'];
            if($order_status == 'pending'){
                $order_status = 'Incomplete';
            }else{
                $order_status = 'Complete';
            }
            
            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_num</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>
            <?php
            if($order_status=='Complete'){
                echo "<td>Paid</td>";
            }else{
                echo "
                <td><a href= 'confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</td>
            </tr>";
            }

        $number++;
        }

        ?>

        
    </tbody>
</table>