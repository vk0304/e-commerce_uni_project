<h1 class="text-center text-success">All Payments</h1>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

        <?php
        $get_payments = "select * from user_payments";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);



        if ($row_count == 0) {
        echo "<h2 class='text-danger text-center mt-5'>No payments recieved yet</h2>";
        } else {
            echo "</thead>
            <tbody class='bg-secondary '>
        
            <tr class='bg-info text-center'>
            <th>S1no</th>
            <th>Order ID</th>
            <th>Amount</th>
            <th>Invoice NO:</th>
            <th>Payment Mode</th>
            <th>Payment Date</th>
        </tr>";
    
    
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $payment_id = $row['payment_id'];
                $order_id = $row['order_id'];
                $invoice_num = $row['invoice_num'];
                $amount = $row['amount'];
                $invoice_num = $row['invoice_num'];
                $payment_mode = $row['payment_mode'];
                $date = $row['date'];
                $number++;
                echo "<tr class='text-light text-center'>
                <td>$number</td>
                <td>$order_id</td>
                <td>$amount</td>
                <td>$invoice_num</td>
                <td>$payment_mode</td>
                <td>$date</td>
                
            </tr>";

            }
        }




        ?>
        
    
        
    </tbody>
</table>



