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
    <h3 class="text-center text-success">All Users</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-pink">
            <?php
            
            $get_payment = "SELECT * FROM `users`";
            $result = mysqli_query($con, $get_payment);
            $row_count = mysqli_num_rows($result);
            if ($row_count == 0) {
                echo "<tr><td colspan='7' class='text-center text-danger'>No Users yet</td></tr>";
            } else {
                echo "<tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>User Image</th>
            <th>Address</th>
            <th>Contact No</th>
        </tr>
    </thead>
    <tbody>";
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $user_id = $row_data['user_id'];
                    $username = $row_data['username'];
                    $email = $row_data['email'];
                    $user_image = $row_data['user_image'];
                    $address = $row_data['address'];
                    $contact_no = $row_data['contact_no'];
                    $number++;
                    echo "<tr>
                        <td>$number</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td><img src='./$user_image' alt='$username' width='100' height='100'/></td>
                        <td>$address</td>
                        <td>$contact_no</td>
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