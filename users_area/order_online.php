<?php
include("../includes/connect.php");
include("../functions/common_functions.php");

if(isset($_GET['user_id'])){
    $uuser_id = $_GET['user_id'];


$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "select * from cart_details where ip_address = '$get_ip_address' ";
$result_cart = mysqli_query($con , $cart_query_price);

$invoice_num = mt_rand();
$status = 'Complete';

// getting total_price
$count_products = mysqli_num_rows($result_cart);
while($row_price = mysqli_fetch_array($result_cart)){
    $product_id = $row_price['product_id'] ;
    $select_product = "select * from products where product_id = $product_id ";
    $result_product = mysqli_query($con , $select_product);
    while($row_product_price = mysqli_fetch_array($result_product)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;


    }
} 


// getting quantity from cart

$get_cart = "select * from cart_details ";
$run_cart = mysqli_query($con , $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];
if($quantity == 0){
    $quantity = 1;
    $subtotal = $total_price;
}else{
    $subtotal = $total_price * $quantity;
}




$insert_orders = "insert into user_orders (user_id , amount_due , invoice_num , total_products , order_date , order_status) values ($uuser_id, $subtotal , $invoice_num , $count_products , NOW() , '$status')";
$result_query = mysqli_query($con , $insert_orders);


if($result_query){
    $select_query = "select * from user_orders where invoice_num = $invoice_num";
    $run_select = mysqli_query($con , $select_query);
    $get_order_id = mysqli_fetch_array($run_select);
    $final_order_id = $get_order_id['order_id'];
    echo "<script>alert('$final_order_id')</script>";

    if(isset($_POST['confirm_payment'])){
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];
    
        $insert_query = "insert into user_payments (order_id , invoice_num , amount , payment_mode) values ($final_order_id , $invoice_number , $amount , '$payment_mode'  )";
        $result_insert = mysqli_query($con, $insert_query);
        if($result_insert){
            echo "<script>alert('Successfully completed the payment')</script>";
            echo "<script>window.open('profile.php?my_orders' , '_self' )</script>";
        }
        
    
    }
}

    
}


// delete items from cart 

$empty_cart = "delete from cart_details where ip_address = '$get_ip_address'";
$result_query3 = mysqli_query($con , $empty_cart);



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
                    value="<?php echo $invoice_num ?>">
                </div>
    
                <div class="form-outline my-4 text-center w-50 m-auto">
                    <label for="" class="text-light">Amount</label>
                    <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $subtotal ?>">
                </div>
    
                
                <div class="form-outline my-4 text-center w-50 m-auto">
                    <select name="payment_mode" id="" class="form-select w-50 m-auto ">
                        <option value="">Select Payment Mode</option>
                        <option value="Easypaisa">Easypaisa</option>
                        <option value="Jazzcash">Jazzcash</option>
                        <option value="Bank">Bank</option>
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

