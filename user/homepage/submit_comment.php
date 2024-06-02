<?php
include('connect.php'); // Include your database connection script
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username'])) {
    // Assuming your comment form has fields named 'product_id', 'comment', and 'rating'
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : 0;
    
    // Assuming you already have 'user_id' stored in the session
    $user_id = $_SESSION['user_id']; 

    // Check if user_id is not empty
    if (!empty($user_id)) {
        // Insert the comment into the database
        $query = "INSERT INTO comments (product_id, user_id, comment, rating) VALUES (?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $con->prepare($query);
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("iiss", $product_id, $user_id, $comment, $rating);
            
            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to the product details page after successful insertion
                header("Location: product_details.php?product_id=$product_id");
                exit; // Make sure to exit after redirection
            } else {
                // Handle database insertion error
                echo "Error: Unable to insert comment into the database. Please try again later.";
            }
            
            // Close the statement
            $stmt->close();
        } else {
            // Handle statement preparation error
            echo "Error: Unable to prepare statement.";
        }
    }
} else {
    // Redirect if the user is not logged in or the request method is not POST
    header("Location: sample_login.php");
    exit; // Make sure to exit after redirection
}
?>