<?php
include("../includes/connect.php");
include("../functions/common_functions.php");
session_start();

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




    <style>
        .profile_img {
            width: 80%;
            margin: auto;
            display: block;
            height: 100%;
            object-fit: contain;
        }

        .edit_img{
            width: 100px;
            height: 100px;
            object-fit: contain;

        }
    </style>

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">E-shopping</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all_products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php echo cart_item_number(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:
                                <?php echo total_cart_price(); ?> /-
                            </a>
                        </li>


                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>


                </div>
            </div>
        </nav>

        <!-- second navbar -->

        <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php

                // welcome guest 
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
          <a class='nav-link' c href='#'>Welcome Guest</a>
        </li>";
                } else {
                    echo "<li class='nav-item'>
          <a class='nav-link' Welcome Guest href='#'>Welcome " . $_SESSION['username'] . "</a>
        </li>";
                }

                // login/logout
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
                } else {
                    echo "<li class='nav-item'>
          <a class='nav-link' href='user_logout.php'>Logout</a>
        </li>";
                }
                ?>
            </ul>
        </div>

        <?php
        cart()
            ?>

        <!-- heading -->
        <div class="bg-light">
            <h3 class="text-center">E-Shopping</h3>
            <p class="text-center">Every thing you want , You will find here</p>
        </div>

        <!-- main section -->

        <div class="row">
            <div class="col-md-2 ">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh;">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <?php
                    $username = $_SESSION['username'];
                    $select_query = "select * from uuser_table where username = '$username'";
                    $sql_execute = mysqli_query($con, $select_query);
                    $fetch_image = mysqli_fetch_array($sql_execute);
                    $user_image = $fetch_image['user_image'];
                    echo "
                    <li class='nav-item mb-5'>
                        <img src='./user_images/$user_image' class='profile_img m-4 ' alt=''>
                    </li>"
                        ?>


                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php"> Pending Orders </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?edit_account"> Edit Account </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?my_orders"> My Orders </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?delete_account"> Delete Account </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="user_logout.php">Logout </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php 
                get_user_order_details();

                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                
                if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                }


                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }


                ?>
            </div>
        </div>







        <!-- footer -->

        <?php
        include("../includes/footer.php")
            ?>



    </div>









</body>

</html>