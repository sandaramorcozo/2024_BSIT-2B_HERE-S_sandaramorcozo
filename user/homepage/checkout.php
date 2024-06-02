<!-- connect file -->
<?php 
include('connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Checkout Page</title>
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
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
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

    <div class="bg-light">
        <h2 class="text-center">SHOPPING LIST</h2>
    </div>
    <!-- fourth step -->
    <div class="row px-1">
        <div class="col-md-12">
            <!-- product -->
            <div class="bg-light">
            </div>
            <div class="row">
                <?php
                if(!isset($_SESSION['username'])){
                    include('sample_login.php');
                }else{
                    include('payment.php');
                }
                ?>
            </div>
            <!--- col end -->
        </div>


    </div>
    </div>






    </div>
    </div>

    </div>
    </div>

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