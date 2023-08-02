<?php  

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_product = "select * from products where product_id = $edit_id";
    $result_product = mysqli_query($con,$get_product);
    $row_product = mysqli_fetch_assoc($result_product);

    $product_title = $row_product['product_title']; 
    $product_description = $row_product['product_description']; 
    $product_keywords = $row_product['product_keywords']; 
    $category_id = $row_product['category_id']; 
    $brand_id = $row_product['brand_id']; 
    $product_image1	 = $row_product['product_image1']; 
    $product_image2	 = $row_product['product_image2']; 
    $product_image3	 = $row_product['product_image3']; 
    $product_price = $row_product['product_price']; 
}



?>





<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" value='<?php echo $product_title ?>'>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" value='<?php echo "$product_description" ?>'>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" value='<?php echo "$product_keywords" ?>'>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_category" class="form-label">Categories</label>
            <select name="product_category" id="" class="form-select">
                <option value="<?php echo $category_id ?>">
                    <?php 
                    $get_category_name = "select * from categories where category_id = $category_id ";
                    $result_category = mysqli_query($con, $get_category_name);
                    $row_category = mysqli_fetch_assoc($result_category);
                    $main_category_title =  $row_category['category_title'];
                    echo $main_category_title;
                    
                    ?>
                </option>
                <?php
                $select_query = "select * from categories where category_id <> $category_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }


                ?>
            </select>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_brand" class="form-label">Brands</label>
            <select name="product_brand" id="" class="form-select" >
                <option value="<?php echo $brand_id?>">

                <?php 
                    $get_brand_name = "select * from brands where brand_id = $brand_id ";
                    $result_brand = mysqli_query($con, $get_brand_name);
                    $row_brand = mysqli_fetch_assoc($result_brand);
                    $main_brand_title =  $row_brand['brand_title'];
                    echo $main_brand_title;
                    
                    ?>

                </option>


                <?php
                $select_query = "select * from brands where brand_id <> $brand_id ";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }


                ?>
            </select>
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product image 1</label>
            <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control">
                <img src="./product_images/<?php echo $product_image1 ?>" class="product_image" alt="">
            </div>
        </div>



        <!-- Image 2-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product image 2</label>
            <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control">
                <img src="./product_images/<?php echo $product_image2 ?>" class="product_image" alt="">
            </div>
        </div>



        <!-- Image 3-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product image 3</label>
            <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control">
                <img src="./product_images/<?php echo $product_image3 ?>" class="product_image" alt="">
            </div>
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" value='<?php echo "$product_price" ?>'>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="Update_product" class="btn btn-info mb-3 px-3" value="Update Product">
        </div>





    </form>
</div>




<!-- editing products -->
<?php  

if(isset($_POST['Update_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    
    $product_price = $_POST['product_price'];


    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];


    //accessing image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking empty condition


if($product_title == '' or $product_description == '' or $product_keywords == '' or $product_category == '' or $product_brand == ''  or $product_price =='' ){
    echo "<script>alert('please fill all the fields')</script>";
}


elseif($product_image1 == '' and $product_image2 <> '' and $product_image3 <> ''){
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");


    // insert query
    $update_products_img1 = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_image2 = '$product_image2' ,product_image3 = '$product_image3',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
    $result_query1=mysqli_query($con,$update_products_img1) ; 
    if($result_query1){
        echo "<script>alert('successfully Updated product')</script>";
        echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

    }
}


elseif($product_image2 == '' and $product_image1 <> '' and $product_image3 <> ''){
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");


    // insert query
    $update_products_img2 = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_image1 = '$product_image1' ,product_image3 = '$product_image3',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
    $result_query2=mysqli_query($con,$update_products_img2) ; 
    if($result_query2){
        echo "<script>alert('successfully Updated product')</script>";
        echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

    }
}


elseif($product_image3 == '' and $product_image2 <> '' and $product_image1 <> ''){
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");


    // insert query
    $update_products_img3 = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_image1 = '$product_image1' ,product_image2 = '$product_image2',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
    $result_query3=mysqli_query($con,$update_products_img3) ; 
    if($result_query3){
        echo "<script>alert('successfully Updated product')</script>";
        echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

    }
}





elseif($product_image1 == '' and $product_image2 == '' and $product_image3 <> '' ){
    move_uploaded_file($temp_image3,"./product_images/$product_image3");


    // insert query
    $update_products_img1_2 = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_image3 = '$product_image3',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
    $result_query4=mysqli_query($con,$update_products_img1_2) ; 
    if($result_query4){
        echo "<script>alert('successfully Updated product')</script>";
        echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

    }

}


elseif($product_image1 == '' and $product_image3 == '' and $product_image2 <> ''){
    move_uploaded_file($temp_image2,"./product_images/$product_image2");


    // insert query
    $update_products_img1_3 = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_image2 = '$product_image2',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
    $result_query5=mysqli_query($con,$update_products_img1_3) ; 
    if($result_query5){
        echo "<script>alert('successfully Updated product')</script>";
        echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

    }

}



elseif($product_image2 == '' and $product_image3 == '' and $product_image1 <> '' ){
    move_uploaded_file($temp_image1,"./product_images/$product_image1");


    // insert query
    $update_products_img2_3 = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_image1 = '$product_image1',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
    $result_query6=mysqli_query($con,$update_products_img2_3) ; 
    if($result_query6){
        echo "<script>alert('successfully Updated product')</script>";
        echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

    }

}



elseif($product_image1 == '' and $product_image2 == '' and $product_image3 == ''){
        // insert query
        $update_products_all_img_empty = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
        $result_query6=mysqli_query($con,$update_products_all_img_empty) ; 
        if($result_query6){
            echo "<script>alert('successfully Updated product')</script>";
            echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

        }
}


else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");


    // insert query
    $update_products = "update products set product_title = '$product_title',product_description = '$product_description',product_keywords = '$product_keywords',category_id = '$product_category',brand_id = '$product_brand',product_image1 = '$product_image1',product_image2 = '$product_image2' ,product_image3 = '$product_image3',product_price = '$product_price', date = Now() where product_id =  $edit_id";

    
    $result_query7=mysqli_query($con,$update_products) ; 
    if($result_query7){
        echo "<script>alert('successfully Updated product')</script>";
        echo "<script>window.open('./index.php?view_products' , '_self' )</script>";

    }
}


}




?>

