<?php 
include('connect.php');
include('common_function.php'); 
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Select query
    $select_query = "SELECT * FROM `users` WHERE username='$username' OR email='$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert('Username or Email already exists')</script>";
    } else {
        // Move uploaded file
        move_uploaded_file($user_image_tmp, "$user_image");
        
        // Insert query
        $insert_query = "INSERT INTO `users` (username, email, password, fullname, address, contact_no, gender, user_ip, user_image) VALUES ('$username', '$email', '$hash_password', '$fullname', '$address', '$contact_no', '$gender', '$user_ip', '$user_image')";
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