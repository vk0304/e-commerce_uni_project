<?php 

if(isset($_GET['delete_order'])){
    $delete_id = $_GET['delete_order'];

    $delete_order = "delete from user_orders where order_id = $delete_id";
    $result_delete = mysqli_query($con,$delete_order);

    $delete_from_pending = "delete from pending_orders where order_id = $delete_id";
    $result_pending = mysqli_query($con,$delete_from_pending);



    if($result_delete){
        echo "<script>alert('Order deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders' , '_self' )</script>";

    }
}

?>


