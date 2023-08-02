<?php  

if(isset($_GET['edit_category'])){
    $cat_id = $_GET['edit_category'];

    $get_category = "select * from categories where category_id = $cat_id";
    $result_category = mysqli_query($con, $get_category);
    $cat_row = mysqli_fetch_assoc($result_category);
    $category_title = $cat_row['category_title'];
    
}

if(isset($_POST['update_category'])){
    $cat_title = $_POST['category_title'];

    $update_category = "update categories set category_title = '$cat_title' where category_id = $cat_id ";
    $result_update = mysqli_query($con, $update_category);
    if($result_update){
        echo "<script>alert('Category updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories' , '_self' )</script>";

    }

}


?>




<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center mt-5">
        <div class="form-outline mb-4 w-50 m-auto d-flex">
            <label for="" class="form-label ">Category Title</label>
            <input type="text" name="category_title" class="form-control" value="<?php echo $category_title ?>" >
        </div>
        <input type="submit" value="Update Category"  name="update_category" class="btn btn-info px-3 mb-3">
    </form>
</div>