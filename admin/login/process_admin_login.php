<?php
session_start();
include('connect.php');
include('common_function.php');

if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['username'];
    $admin_password = $_POST['password'];

    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM `admin` WHERE admin_name = ?");
    if ($stmt) {
        $stmt->bind_param("s", $admin_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row_count = $result->num_rows;

        if ($row_count > 0) {
            $row_data = $result->fetch_assoc();
            if (password_verify($admin_password, $row_data['admin_password'])) {
                $_SESSION['admin_name'] = $admin_name;
                echo "<script>alert('Login successful');</script>";
                echo "<script>window.open('index_admin.php', '_self');</script>";
            } else {
                echo "<script>alert('Invalid credentials');</script>";
            }
        } else {
            echo "<script>alert('Invalid credentials');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Database error');</script>";
    }
}
?>