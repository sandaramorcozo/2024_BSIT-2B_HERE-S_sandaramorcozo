<?php 
if(isset($_GET['edit_products'])){
    $edit_id = mysqli_real_escape_string($con, $_GET['edit_products']);
    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
    $result = mysqli_query($con, $get_data);

    if($result){
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
    } else {
        echo "Error retrieving data: " . mysqli_error($con);
    }
    //fetching category name
    $category_id = mysqli_real_escape_string($con, $category_id);
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .product_img {
        max-width: 100px;
        max-height: 100px;
        margin-left: 10px;
    }

    .form-outline .d-flex {
        align-items: center;
    }

    .form-outline .d-flex .form-control {
        flex: 1;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" value="<?php echo htmlspecialchars($product_title); ?>"
                    name="product_title" class="form-control" required>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" value="<?php echo htmlspecialchars($product_keywords); ?>"
                    name="product_keywords" class="form-control" required>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select">
                    <option value="<?php echo htmlspecialchars($category_id); ?>">
                        <?php echo htmlspecialchars($category_title); ?></option>
                    <?php
                    $select_category_all = "SELECT * FROM `categories`";
                    $result_category_all = mysqli_query($con, $select_category_all);
                    while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                        $category_title = $row_category_all['category_title'];
                        $category_id = $row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>"; 
                    }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                    <input type="file" id="product_image1" name="product_image1" class="form-control" required>
                    <img src="./product_images/<?php echo htmlspecialchars($product_image1); ?>" alt=""
                        class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                    <input type="file" id="product_image2" name="product_image2" class="form-control" required>
                    <img src="./product_images/<?php echo htmlspecialchars($product_image2); ?>" alt=""
                        class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image3</label>
                <div class="d-flex">
                    <input type="file" id="product_image3" name="product_image3" class="form-control" required>
                    <img src="./product_images/<?php echo htmlspecialchars($product_image3); ?>" alt=""
                        class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" value="<?php echo htmlspecialchars($product_price); ?>"
                    name="product_price" class="form-control" required>
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-pink px-3 mb-3">
            </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['edit_product'])) {
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_category = mysqli_real_escape_string($con, $_POST['product_category']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking if fields are empty
    $fields = [$product_title, $product_keywords, $product_category, $product_image1, $product_image2, $product_image3, $product_price];
    $empty_field_found = false;
    foreach ($fields as $field) {
        if (empty($field)) {
            $empty_field_found = true;
            break;
        }
    }

    if ($empty_field_found) {
        echo "<script>alert('Please fill all the fields and continue to process')</script>";
    } else {
        // Move uploaded files
        $move_image1 = move_uploaded_file($temp_image1, "./product_images/$product_image1");
        $move_image2 = move_uploaded_file($temp_image2, "./product_images/$product_image2");
        $move_image3 = move_uploaded_file($temp_image3, "./product_images/$product_image3");

        if ($move_image1 && $move_image2 && $move_image3) {
            // Query to update products
            $update_products = "UPDATE `products` SET product_title='$product_title', product_keywords='$product_keywords', category_id='$product_category', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price='$product_price', date=NOW() WHERE product_id=$edit_id";
            $result_update = mysqli_query($con, $update_products);

            if ($result_update) {
                echo "<script>alert('Product updated successfully!')</script>";
                echo "<script>window.open('./insert_product.php', '_self')</script>";
            } else {
                echo "<script>alert('Error updating product: " . mysqli_error($con) . "')</script>";
            }
        } else {
            echo "<script>alert('Error uploading images. Please try again.')</script>";
        }
    }
}
?>