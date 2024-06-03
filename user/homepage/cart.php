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
    <title>User Page - Cart Details</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="indexhomepageclient.css">
    <style>
    .cart_img {
        width: 80px;
        height: 80px;
        object-fit: contain;
    }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-pink">
            <div class="container-fluid">
                <img src="logohere.jpg" class="logo">
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
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- calling cart function -->
        <?php cart(); ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest!</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome " . htmlspecialchars($_SESSION['username']) . "</a></li>";
                }

                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'><a class='nav-link' href='./sample_login.php'>Login</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>

    <div class="bg-light">
        <h3 class="text-center">HIS & HERS</h3>
        <p class="text-center">WELCOME GUEST, BAG WITH US!</p>
    </div>

    <div class="bg-light">
        <h2 class="text-center">SHOPPING LIST</h2>
    </div>

    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered">
                    <tbody>
                        <?php  
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $quantity = $row['quantity'];
                                $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = $row_product_price['product_price'];
                                    $price_table = $product_price * $quantity;
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $total_price += $price_table;
                                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product_title); ?></td>
                            <td><img src="./<?php echo htmlspecialchars($product_image1); ?>" alt="" class="cart_img">
                            </td>
                            <td><input type="number" name="qty[<?php echo $product_id; ?>]" class="form-input w-50"
                                    value="<?php echo $quantity; ?>"></td>
                            <td>₱<?php echo number_format($price_table, 2); ?></td>
                            <td><input type="checkbox" name="remove[<?php echo $product_id; ?>]"></td>
                            <td>
                                <input type="submit" value="Update Cart" class="bg-pink px-3 py-2 border-0 mx-3"
                                    name="update_cart">
                                <input type="submit" value="Remove Cart" class="bg-pink px-3 py-2 border-0 mx-3"
                                    name="remove_cart">
                            </td>
                        </tr>
                        <?php }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex mb-5">
                    <?php
                    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<h4 class='px-3'>Subtotal: <strong class='text-pink'>₱ " . number_format($total_price, 2) . "</strong></h4>
                        <input type='submit' value='Continue Shopping' class='bg-pink px-3 py-2 border-0 mx-3' name='continue_shopping'>
                        <button class='bg-secondary p-3 py-2 border-0'><a href='checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                    } else {
                        echo "<input type='submit' value='Continue Shopping' class='bg-pink px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                    }
                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('clientpage.php', '_self')</script>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <?php include("./footer.php"); ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
// Update cart
if (isset($_POST['update_cart'])) {
    foreach ($_POST['qty'] as $product_id => $quantity) {
        $quantity = intval($quantity); // Ensure quantity is an integer
        $update_cart = "UPDATE `cart_details` SET quantity='$quantity' WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
        $run_query = mysqli_query($con, $update_cart);
    }
    echo "<script>window.open('cart.php', '_self')</script>";
}

// Remove from cart
if (isset($_POST['remove_cart'])) {
    foreach ($_POST['remove'] as $product_id => $remove) {
        $delete_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id='$product_id'";
        $run_delete = mysqli_query($con, $delete_cart);
    }
    echo "<script>window.open('cart.php', '_self')</script>";
}
?>