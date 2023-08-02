<?php  
if(isset($_GET['edit_brand'])){
    $brand_id = $_GET['edit_brand'];

    $get_brand = "select * from brands where brand_id = $brand_id";
    $result_brand = mysqli_query($con, $get_brand);
    $brand_row = mysqli_fetch_assoc($result_brand);
    $brand_title = $brand_row['brand_title'];
    
}


if(isset($_POST['update_brand'])){
    $brand_title = $_POST['brand_title'];

    $update_brand = "update brands set brand_title = '$brand_title' where brand_id = $brand_id ";
    $result_update_brand = mysqli_query($con, $update_brand);
    if($result_update_brand){
        echo "<script>alert('brand updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands' , '_self' )</script>";

    }

}


?>




<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center mt-5">
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <label for="" class="form-label ">Brand Title</label>
            <input type="text" name="brand_title" class="form-control" value="<?php echo $brand_title ?>" >
        </div>
        <input type="submit" value="Update Brand"  name="update_brand" class="btn btn-info px-3 mb-3">
    </form>
</div>