<?php 
include('connect.php');
include('common_function.php'); 
session_start();

if (isset($_POST['admin_register'])) {
    $admin_name = $_POST['admin_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // Select query
    $select_query = "SELECT * FROM `admin` WHERE admin_name='$admin_name' OR admin_email='$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Username or Email already exists')</script>";
    } else {
        // Insert query
        $insert_query = "INSERT INTO `admin` (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$email', '$hash_password')";
        $sql_execute = mysqli_query($con, $insert_query);
        
        // Check if the query was successful
        if ($sql_execute) {
            echo "<script>alert('Registration Successful')</script>";
        } else {
            echo "<script>alert('Error: Registration Failed')</script>";
        }
    }
}
?>