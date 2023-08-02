<?php
include("../includes/connect.php");
session_start();
if(isset($_GET['order_id'])){
    $get_order_id = $_GET['order_id'];
    $get_order_details = "select * from user_orders where order_id=$get_order_id";
    $result_order = mysqli_query($con, $get_order_details);
    $row_orders = mysqli_fetch_assoc($result_order);
    $invoice_no = $row_orders['invoice_num'];
    $amount_due = $row_orders['amount_due'];

}


if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "insert into user_payments (order_id , invoice_num , amount , payment_mode) values ($get_order_id , $invoice_number , $amount , '$payment_mode'  )";
    $result_insert = mysqli_query($con, $insert_query);
    if($result_order){
        echo "<script>alert('Successfully completed the payment')</script>";
        echo "<script>window.open('profile.php?my_orders' , '_self' )</script>";
    }
    $update_orders = "update user_orders set order_status = 'Complete' where order_id=$get_order_id";
    $result_update = mysqli_query($con, $update_orders);

    $delete_from_pending = "delete from pending_orders where order_id = $get_order_id ";
    $result_delete = mysqli_query($con, $delete_from_pending);


}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome
        <?php echo $_SESSION['username'] ?>
    </title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- font awesome cdn -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5 ">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number"
                value="<?php echo $invoice_no ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>

            
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" id="" class="form-select w-50 m-auto ">
                    <option value="">Select Payment Mode</option>
                    <option value="Easypaisa">Easypaisa</option>
                    <option value="Jazzcash">Jazzcash</option>
                    <option value="Bank">Bank</option>
                    <option value="COD">COD</option>
                </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm"
                name = "confirm_payment">
            </div>

            

            
        </form>
    </div>
    
</body>
</html>