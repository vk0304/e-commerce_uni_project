<?php

include('../includes/connect.php');
include("../functions/common_functions.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <div class="container-fluid my-3"></div>
    <h2 class="text-center">New User Registration From</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- user name field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control"
                        placeholder="Enter your username" required autocomplete="off">
                </div>

                <!-- user email field -->
                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control"
                        placeholder="Enter your email" required autocomplete="off">
                </div>

                <!-- user image field -->
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" name="user_image" id="user_image" class="form-control"
                         >
                </div>

                <!-- user Password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control"
                        placeholder="Enter your password" required autocomplete="off">
                </div>

                <!-- user confirm Password field -->
                <div class="form-outline mb-4">
                    <label for="confirm_user_email" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_user_email" id="confirm_user_email" class="form-control"
                        placeholder="Confirm your password" required autocomplete="off">
                </div>

                <!-- user address field -->
                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" name="user_address" id="user_address" class="form-control"
                        placeholder="Enter your address" required autocomplete="off">
                </div>

                
                <!-- user contact  field -->
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" name="user_contact" id="user_contact" class="form-control"
                        placeholder="Enter your mobile number" required='required' autocomplete="off">
                </div>

                <div class="mt-4 pt-2">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                </div>

                

            </form>
        </div>
    </div>
</body>

</html>



<!-- php code -->

<?php 

if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $hash_password = password_hash($user_password ,PASSWORD_DEFAULT);

    $confirm_user_email = $_POST['confirm_user_email'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();


    // select query for checking using present or not

    $select_query = "select * from uuser_table where username = '$user_username' or user_email = '$user_email' or user_phone = '$user_contact' ";
    $sql_execute1 = mysqli_query($con ,$select_query);
    $rows_count = mysqli_num_rows($sql_execute1);
    if($rows_count > 0 ){
        echo "<script>alert('User Username , email or  contact already exist ')</script>";
    }
    else if($user_password != $confirm_user_email){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else{

        // insert_query 
        move_uploaded_file($user_image_temp , "./user_images/$user_image");
        $insert_query = "insert into uuser_table (username , user_email , user_password , user_image , user_ip , user_address , user_phone ) values ('$user_username' , '$user_email' , '$hash_password' , '$user_image' , '$user_ip' , '$user_address' , '$user_contact')";
    
        $sql_execute = mysqli_query($con ,$insert_query );
    
        if($sql_execute){
            echo "<script>alert('User registered successfully')</script>";
        }
        else{
            die(mysqli_error($con));
        }
    }


// selecting cart items

$select_cart_items = "select * from `cart_details` where ip_address = '$user_ip' ";
$result_sql = mysqli_query($con ,$select_cart_items );
$rows_count = mysqli_num_rows($result_sql);
if($rows_count > 0){
    $_SESSION['username'] = $user_username;
    echo "<script>alert('You have items in cart')</script>";
    echo "<script>window.open('checkout.php' , '_self' )</script>";

}
else{
    echo "<script>window.open('../index.php' , '_self' )</script>";

}

}


?>