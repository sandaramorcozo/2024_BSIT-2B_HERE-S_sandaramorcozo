<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Payments - Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .bg-pink {
        background-color: pink !important;
    }

    .table thead tr th {
        background-color: pink;
        color: white;
    }

    .table tbody tr {
        background-color: grey;
        color: white;
    }
    </style>
</head>

<body>
    <h3 class="text-center text-success">All Payments</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-pink">
            <tr>
                <th>SI no</th>
                <th>Order Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
                <th>Shipping Method</th>
                <th>Tracking Number</th>
                <th>Receiver's Name</th>
                <th>Receiver's Address</th>
                <th>GCash Reference Number</th>
                <th>GCash Account Number</th>
                <th>GCash Account Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connect.php');
            $get_payment = "SELECT p.*, s.name AS shipping_method, o.tracking_number, o.receiver_name, o.receiver_address, o.gcash_ref_num, o.gcash_account_number, o.gcash_account_name 
                            FROM payment p 
                            LEFT JOIN shipping_methods s ON p.shipping_mode = s.code
                            LEFT JOIN orders o ON p.order_id = o.order_id";
            $result = mysqli_query($con, $get_payment);
            $row_count = mysqli_num_rows($result);
            if ($row_count == 0) {
                echo "<tr><td colspan='12' class='text-center text-danger'>No payment received yet</td></tr>";
            } else {
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $number++;
                    echo "<tr>
                        <td>$number</td>
                        <td>{$row_data['order_number']}</td>
                        <td>{$row_data['amnt']}</td>
                        <td>{$row_data['payment_mode']}</td>
                        <td>{$row_data['date']}</td>
                        <td>{$row_data['shipping_method']}</td>
                        <td>{$row_data['tracking_number']}</td>
                        <td>{$row_data['receiver_name']}</td>
                        <td>{$row_data['receiver_address']}</td>
                        <td>{$row_data['gcash_ref_num']}</td>
                        <td>{$row_data['gcash_account_number']}</td>
                        <td>{$row_data['gcash_account_name']}</td>
                    </tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>