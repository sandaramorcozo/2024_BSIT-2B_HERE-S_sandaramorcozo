<!-- connect file -->
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
    <title>Welcome <?php echo $_SESSION['username'] ?>
    </title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- css file -->
<link rel="stylesheet" href="indexhomepageclient.css">
</head>

<style>
.profile_img {
    width: 90%;
    margin: auto;
    display: block;
    height: 100%;
    object-fit: contain;
}

.edit_image {
    width: 100px;
    height: 100px;
    object-fit: contain;

}
</style>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!--first step-->
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-pink">
            <div class="container-fluid">
                <img src="logohere.jpg"" class=" logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="clientpage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><sup><?php  cart_item();?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: ₱<?php echo total_cart_price();?></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <!-- second step -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php

if(!isset($_SESSION['username'])){
    echo " <li class='nav-item'>
    <a class='nav-link' href='#'>Welcome Guest!</a>
</li>";
}else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
</li>";
}

if(!isset($_SESSION['username'])){
    echo " <li class='nav-item'>
    <a class='nav-link' href='./sample_login.php'>Login</a>
</li>";
}else{
    echo "<li class='nav-item'>
    <a class='nav-link' href='logout.php'>Logout</a>
</li>";
}
?>
            </ul>
        </nav>
    </div>

    <!-- third step -->
    <div class="bg-light">
        <h3 class="text-center">HIS & HERS</h3>
        <p class="text-center">WELCOME GUEST, BAG WITH US!</p>
    </div>

    <!-- fourth step -->
    <div class="row">
        <div class="col-md-2">
            <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item bg-light-pink">
                    <a class="nav-link text-light" href="#">
                        <h4>Your Profile</h4>
                    </a>
                </li>

                <?php

// Get the username from the session
$username = $_SESSION['username'];

// Prepare the SQL query to get the user image
$user_image_query = "SELECT * FROM `users` WHERE username='$username'";
$result_image = mysqli_query($con, $user_image_query);

// Check if the query was successful
if ($result_image) {
    $row_image = mysqli_fetch_array($result_image);
    $user_image = $row_image['user_image'];

    // Echo the HTML with the user image
    echo "<li class='nav-item'>
            <img src='./$user_image' class='profile_img my-4' alt='Profile Image'>
          </li>";
} else {
    // Handle the error case where the query fails
    echo "Error fetching user image.";
}
?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php">
                        Pending Orders
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?edit_account">
                        Edit Account
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?my_orders">
                        My Orders
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="profile.php?delete_account=true">Delete Account</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">
                        Logout
                    </a>
                </li>

            </ul>
        </div>
        <div class="col-md-10 text-center">
            <?php get_user_order_details();
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
        <div>

            <!-- last child -->
            <!-- include footer -->
            <?php include ("./footer.php"); ?>
        </div>


        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>
</body>

</html>