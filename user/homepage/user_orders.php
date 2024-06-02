<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $stmt = $con->prepare("SELECT * FROM `users` WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $row_fetch = $result->fetch_assoc();
            $user_id = $row_fetch['user_id'];
        } else {
            echo "User not logged in.";
            exit();
        }
    ?>

    <h3 class="text-success">All Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>SI no</th>
                <th>Amount Due</th>
                <th>Total Product</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/ Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $stmt_orders = $con->prepare("SELECT * FROM `orders` WHERE user_id = ?");
                $stmt_orders->bind_param("i", $user_id);
                $stmt_orders->execute();
                $result_orders = $stmt_orders->get_result();
                $number = 1;

                while ($row_orders = $result_orders->fetch_assoc()) {
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $item_qty = $row_orders['item_qty'];
                    $order_number = $row_orders['order_number'];
                    $order_date = $row_orders['order_date'];
                    $order_status = $row_orders['order_status'] == 'pending' ? 'Incomplete' : 'Complete';

                    echo "<tr>
                        <td>{$number}</td>
                        <td>{$amount_due}</td>
                        <td>{$item_qty}</td>
                        <td>{$order_number}</td>
                        <td>{$order_date}</td>
                        <td>{$order_status}</td>
                        <td>";

                    if ($order_status == 'Complete') {
                        echo "Paid";
                    } else {
                        echo "<a href='confirm_payment.php?order_id={$order_id}' class='text-pink'>Confirm</a>";
                    }

                    echo "</td></tr>";

                    $number++;
                }
            ?>
        </tbody>
    </table>
</body>

</html>