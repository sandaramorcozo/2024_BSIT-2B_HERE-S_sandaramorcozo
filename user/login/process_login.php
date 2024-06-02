<?php
include('connect.php');
include('common_function.php');

session_start();

if (isset($_POST['user_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM `users` WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row_count = $result->num_rows;
    $user_ip = getIPAddress();

    // cart item
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $row_data = $result->fetch_assoc();
        if (password_verify($password, $row_data['password'])) {
            $_SESSION['username'] = $username;
            // Check if user_id is present in $row_data before setting it in the session
            if (isset($row_data['user_id'])) {
                $_SESSION['user_id'] = $row_data['user_id']; // Add user_id to session
                if ($row_count == 1 && $row_count_cart == 0) {
                    echo "<script>alert('Login successful');</script>";
                    echo "<script>window.open('profile.php', '_self');</script>";
                } else {
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('payment.php', '_self');</script>";
                }
            } else {
                echo "<script>alert('User ID not found.');</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials');</script>";
        }
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
    
    $stmt->close();
}
?>