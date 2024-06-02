<?php 
include('connect.php');
include('common_function.php'); 
session_start();

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// Getting the total price of all items in the cart
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$order_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result_cart_price);

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
    $run_price = mysqli_query($con, $select_product);

    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = $row_product_price['product_price'];
        $quantity = $row_price['quantity'];
        $total_price += ($product_price * $quantity);
    }
}

// Insert order details into the orders table
$insert_orders = "INSERT INTO `orders` (user_id, amount_due, order_number, item_qty, order_date, order_status) VALUES ($user_id, $total_price, $order_number, $count_products, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Orders are submitted successfully');</script>";
    echo "<script>window.open('profile.php', '_self');</script>";
}

// Insert each product in the cart to pending orders
$result_cart_price = mysqli_query($con, $cart_query_price); // Re-run query to get cart details again

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity'];
    $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, order_number, product_id, item_qty, order_status) VALUES ($user_id, $order_number, $product_id, $quantity, '$status')";
    $result_pending_orders = mysqli_query($con, $insert_pending_orders);
}

//delete items from cart
$empty_cart="Delete from `cart_details` where ip_address = '$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);
 
?>