<?php 

if(isset($_GET['delete_brand'])){
    $delete_id = $_GET['delete_brand'];

    $delete_category = "delete from brands where brand_id = $delete_id ";
    $result_delete = mysqli_query($con,$delete_category);

    if($result_delete){
        echo "<script>alert('Brand deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands' , '_self' )</script>";

    }
}

?>