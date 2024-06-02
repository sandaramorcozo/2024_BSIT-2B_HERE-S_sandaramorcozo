<?php 
include('connect.php'); 
include('common_function.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .bg-pink {
        background-color: pink !important;
    }

    .body {
        overflow-x: hidden;
    }
    </style>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your username"
                            autocomplete="off" required="required" name="username" />
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password"
                            autocomplete="off" required="required" name="password" />
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-pink py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php"
                                class="text-danger"> Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
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
            $_SESSION['user_id'] = $row_data['id']; // Set user_id in session

            if ($row_count == 1 && $row_count_cart == 0) {
                echo "<script>alert('Login successful');</script>";
                echo "<script>window.open('payment.php', '_self');</script>";
            } else {
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
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