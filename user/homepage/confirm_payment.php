<?php 
include('connect.php');
session_start();

// Function to generate unique tracking number
function generateTrackingNumber() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $trackingNumber = '';
    for ($i = 0; $i < 10; $i++) { 
        $trackingNumber .= $characters[mt_rand(0, strlen($characters) - 1)]; 
    } 
    return $trackingNumber . time(); // Adding timestamp to ensure uniqueness
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM `orders` WHERE order_id=?";
    $stmt = $con->prepare($select_data);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row_fetch = $result->fetch_assoc();
    $order_number = $row_fetch['order_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm-payment'])) {
    $order_number = $_POST['order_number'];
    $amnt = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $shipping_mode = $_POST['shipping_mode'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_address = $_POST['receiver_address'];
    $tracking_number = generateTrackingNumber(); // Automatically generate tracking number

    $insert_query = "INSERT INTO `payment` (order_id, order_number, amnt, payment_mode, shipping_mode) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insert_query);
    $stmt->bind_param('iiiss', $order_id, $order_number, $amnt, $payment_mode, $shipping_mode);
    $result = $stmt->execute();

    // Update orders table with shipping details
    $update_order_query = "UPDATE `orders` SET tracking_number=?, receiver_name=?, receiver_address=? WHERE order_id=?";
    $stmt = $con->prepare($update_order_query);
    $stmt->bind_param('sssi', $tracking_number, $receiver_name, $receiver_address, $order_id);
    $stmt->execute();

    if ($result) {
        echo "<h3 class='text-center text-light'>Successfully Completed the Payment</h3>";
        echo "<script>
        window.open('profile.php?my_orders', '_self')
        </script>";
    }

    $update_orders = "UPDATE `orders` SET order_status='Complete' WHERE order_id=?";
    $stmt = $con->prepare($update_orders);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
}

// Fetch available shipping methods
$shipping_methods_query = "SELECT * FROM shipping_methods";
$shipping_methods_result = $con->query($shipping_methods_query);
$shipping_methods = $shipping_methods_result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .bg-pink {
        background-color: #ff69b4;
    }

    .text-pink {
        color: #ff69b4;
    }

    .btn-pink {
        background-color: #ff69b4;
        color: white;
    }
    </style>
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="order_number"
                    value="<?php echo htmlspecialchars($order_number); ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount"
                    value="<?php echo htmlspecialchars($amount_due); ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Receiver's Name</label>
                <input type="text" class="form-control w-50 m-auto" name="receiver_name" required>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Receiver's Address</label>
                <textarea class="form-control w-50 m-auto" name="receiver_address" required></textarea>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Select Payment Mode</label>
                <select name="payment_mode" id="payment_mode" class="form-select w-50 m-auto" required>
                    <option value="">Select Payment Mode</option>
                    <option value="Gcash">Gcash</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="shipping_mode" class="form-select w-50 m-auto" required>
                    <option value="">Select Shipping Mode</option>
                    <?php foreach ($shipping_methods as $method) : ?>
                    <option value="<?php echo $method['code']; ?>"><?php echo $method['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="btn-pink py-2 px-3 border-0" value="Confirm" name="confirm-payment">
            </div>
        </form>
    </div>
</body>

</html>