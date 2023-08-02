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
$status = 'pending';

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
    echo "<script>alert('Order submitted successfully')</script>";
    echo "<script>window.open('profile.php' , '_self' )</script>";
}

// orders pending

$insert_pending_orders = "insert into pending_orders (user_id , invoice_num , product_id , quantity , order_status) values ($uuser_id,  $invoice_num , $product_id  , $quantity ,  '$status')";
$result_query2 = mysqli_query($con , $insert_pending_orders);

// delete items from cart 

$empty_cart = "delete from cart_details where ip_address = '$get_ip_address'";
$result_query3 = mysqli_query($con , $empty_cart);

}

?>
