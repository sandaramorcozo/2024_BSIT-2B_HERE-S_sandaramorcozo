<?php 
include('connect.php');
include('common_function.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="style_admin.css">
    <style>
    </style>

    <style>
    .bg-custom-pink {
        background-color: #FFB6C1;
        /* Light pink color */
    }

    .logo {
        height: 50px;
        /* Adjust the logo size as needed */
    }
    </style>

</head>

<body>
    <!-- navbar-->
    <div class="container-fluid p-0">
        <!--first part-->
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-pink">
            <div class="container-fluid">
                <img src="adminlogo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg>
                    <ul class=" navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome Khaye!</a>
                    </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!--second part-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--third part-->
        <div class="row">
            <div class="col-md-12 bg-secondary align-items-center">
                <div class="p-3">
                    <a href="#"><img src="khaye.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Khaye</p>
                </div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php"
                            class="nav-link text-center bg-custom-pink my-1">Insert
                            Products</a></button>
                    <button><a href="index_admin.php?view_products"
                            class="nav-link text-center bg-custom-pink my-1">View
                            Products</a></button>
                    <button><a href="index_admin.php?insert_categories"
                            class="nav-link text-center bg-custom-pink my-1">Insert
                            Categories</a></button>
                    <button><a href="index_admin.php?view_categories"
                            class="nav-link text-center bg-custom-pink my-1">View
                            Categories</a></button>
                    <button><a href="index_admin.php?all_orders" class="nav-link text-center bg-custom-pink my-1">All
                            Orders</a></button>
                    <button><a href="index_admin.php?all_payments" class="nav-link text-center bg-custom-pink my-1">All
                            Payment</a></button>
                    <button><a href="index_admin.php?all_users" class="nav-link text-center bg-custom-pink my-1">All
                            Users</a></button>
                    <button><a href="logout_admin.php"
                            class="nav-link text-center bg-custom-pink my-1">Logout</a></button>
                    </button>
                </div>
            </div>
        </div>

        <!-- fourth part -->
        <div class="container my-5">
            <?php 
            if (isset($_GET['insert_categories'])){
                  include('insert_categories.php');
            }
            if (isset($_GET['view_products'])){
                include('view_products.php');
          }
          if (isset($_GET['edit_products'])){
            include('edit_products.php');
        }
  if (isset($_GET['delete_product'])){
    include('delete_product.php');
}
if (isset($_GET['view_categories'])){
    include('view_categories.php');
  }
  if (isset($_GET['edit_category'])){
    include('edit_category.php');
  }
  if (isset($_GET['delete_category'])){
    include('delete_category.php');
}
if (isset($_GET['all_orders'])){
    include('all_orders.php');
}
if (isset($_GET['all_payments'])){
    include('all_payments.php');
}
if (isset($_GET['all_users'])){
    include('all_users.php');
}
            ?>
        </div>
    </div>

    <!-- last child -->
    <div class="bg-custom-pink p-3 text-center">
        <p> All rights reserved, HERE'S 2024.</p>
    </div>
    </div>

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</body>

</body>

</html>