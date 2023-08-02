<?php
include("../includes/connect.php");
include("../functions/common_functions.php");
session_start();

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

    <style>
        .product_image {
            width: 100px;
            object-fit: contain;
        }
    </style>

    <!-- css link -->

    <link rel="stylesheet" href="../style.css">


</head>

<body>



    <div class="container-fluid p-0">

        <!-- navbar -->
        <div class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <h3>Gadda Electronics</h3>
                </a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <?php
                        if (!isset($_SESSION['admin_name'])) {
                            echo "<li class='nav-item'>
                    <a href='' class='nav-link'>Welcome Guest</a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                    <a href='' class='nav-link'>Welcome " . $_SESSION['admin_name'] . "</a>
                </li>";
                        }

                        ?>


                    </ul>
                </nav>
            </div>
        </div>

        <!-- heading -->
        <div class="bg-light">
            <h2 class="text-center p-2">Manage Details</h2>
        </div>

        <!-- options -->

        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <?php
                    if (!isset($_SESSION['admin_name'])) {
                        echo "Admin Portal";
                    } else {

                        $admin_name = $_SESSION['admin_name'];
                        $select_query = "select * from admin_table where admin_name = '$admin_name'";
                        $sql_execute = mysqli_query($con, $select_query);
                        $fetch_image = mysqli_fetch_array($sql_execute);
                        $admin_image = $fetch_image['admin_image'];
                        echo "
                <img src='./admin_images/$admin_image' alt='' class= 'admin-image'>
                ";
                    }

                    ?>
                </div>

                <div class="button text-center">
                    <?php

                    if (!isset($_SESSION['admin_name'])) {
                        echo "
                    <button class='button_design bg-info'><a href='#'
                            class='nav-link text-light  bg-info my-1'>Insert Products</a></button>
                    ";
                    } else {
                        echo "
                    <button class='button_design bg-info'><a href='insert_product.php'
                            class='nav-link text-light  bg-info my-1'>Insert Products</a></button>
                    ";
                    }
                    ?>
                    <button class="button_design bg-info"><a href="index.php?view_products"
                            class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button class="button_design bg-info"><a href="index.php?insert_category"
                            class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button class="button_design bg-info"><a href="index.php?view_categories"
                            class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button class="button_design bg-info"><a href="index.php?insert_brand"
                            class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button class="button_design bg-info"><a href="index.php?view_brands"
                            class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button class="button_design bg-info"><a href="index.php?list_orders"
                            class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button class="button_design bg-info"><a href="index.php?list_payments"
                            class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button class="button_design bg-info"><a href="index.php?list_users"
                            class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button class="button_design bg-info"><a href="index.php?users_view"
                            class="nav-link text-light bg-info my-1">Users View</a></button>
                    <?php

                    if (!isset($_SESSION['admin_name'])) {
                        echo "
    <button class='button_design bg-info'><a href='admin_login.php' class='nav-link text-light bg-info my-1'>Login</a></button>
    ";
                    } else {
                        echo "
    <button class='button_design bg-info'><a href='admin_logout.php' class='nav-link text-light bg-info my-1'>Logout</a></button>
    ";
                    }

                    ?>

                </div>
            </div>
        </div>

        <!-- main section -->
        <div class="container my-5">
            <?php
            if (!isset($_SESSION['admin_name'])) {
                include('login_request.php');

            } else {

                if (isset($_GET['insert_category'])) {
                    include('insert_categories.php');
                }

                if (isset($_GET['insert_brand'])) {
                    include('insert_brands.php');
                }

                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }

                if (isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }

                if (isset($_GET['delete_products'])) {
                    include('delete_product.php');
                }

                if (isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }

                if (isset($_GET['view_brands'])) {
                    include('view_brands.php');
                }

                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }

                if (isset($_GET['edit_brand'])) {
                    include('edit_brand.php');
                }

                if (isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }

                if (isset($_GET['delete_brand'])) {
                    include('delete_brand.php');
                }

                if (isset($_GET['list_orders'])) {
                    include('list_orders.php');
                }

                if (isset($_GET['delete_order'])) {
                    include('delete_order.php');
                }

                if (isset($_GET['list_payments'])) {
                    include('list_payments.php');
                }

                if (isset($_GET['list_users'])) {
                    include('list_users.php');
                }

                if (isset($_GET['delete_user'])) {
                    include('delete_user.php');
                }

                if (isset($_GET['users_view'])) {
                




// Execute the query to retrieve data from the view
$user_view_query = "SELECT * FROM users_detail_view";
$result_user_view_query = mysqli_query($con, $user_view_query);

// Check if there are any results
if (mysqli_num_rows($result_user_view_query) > 0) {
    // Output the table header
    echo "<table class='table table-bordered mt-5'>
            <tr class='text-center'>
                <th>User ID</th>
                <th>Username</th>
                <th>Total Orders</th>
                <th>Total Completed</th>
                <th>Total Pending</th>
            </tr>";

    // Output the table rows with data
    while ($row = mysqli_fetch_assoc($result_user_view_query)) {
        echo "<tr class='text-center'>
                <td>{$row['user_id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['total_orders']}</td>
                <td>{$row['total_completed']}</td>
                <td>{$row['total_pending']}</td>
            </tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "No results found.";
}

// Close the database connection
mysqli_close($con);




                }
            }

            ?>

        </div>



        <!-- footer -->

        <div class="bg-info p-3 text-center footer position-fixed">
            <p>All rights reserved | 2023</p>
        </div>

        <script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        </script>
    </div>

</body>

</html>