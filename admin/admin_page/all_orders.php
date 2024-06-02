<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders - Admin</title>
    <!-- Bootstrap CSS -->
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
    <h3 class="text-center text-success">All Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-pink">
            <?php
            
            $get_orders = "SELECT * FROM `orders`";
            $result = mysqli_query($con, $get_orders);
            $row_count = mysqli_num_rows($result);
            if ($row_count == 0) {
                echo "<tr><td colspan='7' class='text-center text-danger'>No orders yet</td></tr>";
            } else {
                echo "<tSr>
            <th>SI no</th>
            <th>Due Amount</th>
            <th>Order Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>";
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $order_id = $row_data['order_id'];
                    $user_id = $row_data['user_id'];
                    $amount_due = $row_data['amount_due'];
                    $order_number = $row_data['order_number'];
                    $item_qty = $row_data['item_qty'];
                    $order_date = $row_data['order_date'];
                    $order_status = $row_data['order_status'];
                    $number++;
                    echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$order_number</td>
                        <td>$item_qty</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        
                    </tr>";
                }
            }
            ?>
            </tbody>
    </table>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>