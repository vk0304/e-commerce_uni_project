<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from uuser_table where username = '$user_session_name'";
    $sql_execute = mysqli_query($con, $select_query);
    $row_data = mysqli_fetch_assoc($sql_execute);
    $fetch_id = $row_data['user_id'];
    $fetch_username = $row_data['username'];
    $fetch_email = $row_data['user_email'];
    $fetch_address = $row_data['user_address'];
    $fetch_phone = $row_data['user_phone'];
    $fetch_image = $row_data['user_image'];

}



if (isset($_POST['user_update'])) {
    $update_id = $fetch_id;
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_phone = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];


    if ($user_image == '') {
        // update query
        $update_query_without_photo = "update uuser_table set username = '$user_username' , user_email = '$user_email' ,  user_address = '$user_address' , user_phone = '$user_phone' where user_id = $update_id ";
        $sql_execute_update1 = mysqli_query($con, $update_query_without_photo);
        if ($sql_execute_update1) {
            echo "<script>alert('User data updated successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    } else {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");


        // update query
        $update_query_with_photo = "update uuser_table set username = '$user_username' , user_email = '$user_email' , user_image = '$user_image' , user_address = '$user_address' , user_phone = '$user_phone' where user_id = $update_id ";
        $sql_execute_update2 = mysqli_query($con, $update_query_with_photo);
        if ($sql_execute_update2) {
            echo "<script>alert('User data updated successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    }
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

<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $fetch_username ?>"
                name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $fetch_email ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control w-80 m-auto" name="user_image">
            <img src="./user_images/<?php echo $fetch_image ?>" alt="" class="edit_img w-20">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $fetch_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $fetch_phone ?>" name="user_mobile">
        </div>

        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
</body>

</html>