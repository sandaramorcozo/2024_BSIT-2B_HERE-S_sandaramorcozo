<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products - Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <h3 class="text-center text-success">All Categories</h3>
    <table style="width: 100%; border-collapse: collapse; background-color: pink; color: white;">
        <thead style="background-color: pink; color: white;">
            <tr style="text-align: center;">
                <th style="border: 1px solid black; padding: 8px;">SI no</th>
                <th style="border: 1px solid black; padding: 8px;">Category Title</th>
                <th style="border: 1px solid black; padding: 8px;">Edit</th>
                <th style="border: 1px solid black; padding: 8px;">Delete</th>
            </tr>
        </thead>
        <tbody style="background-color: #6c757d; color: white;">
            <?php
            // Assuming $con is your database connection
            $select_category = "SELECT * FROM `categories`";
            $result = mysqli_query($con, $select_category);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];
                $number++;
            ?>
            <tr class="text-center">
                <td style="border: 1px solid black; padding: 8px;"><?php echo $number; ?></td>
                <td style="border: 1px solid black; padding: 8px;"><?php echo $category_title; ?></td>
                <td style="border: 1px solid black; padding: 8px;">
                    <a href='index_admin.php?edit_category=<?php echo $category_id; ?>' class='text-light'>
                        <i class='fas fa-pen-square'></i>
                    </a>
                </td>
                <td style="border: 1px solid black; padding: 8px;">
                    <a href='#' class='text-light' data-toggle="modal" data-target="#exampleModal"
                        data-id="<?php echo $category_id; ?>">
                        <i class='fas fa-trash'></i>
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var categoryId = button.data('id');
        var modal = $(this);
        $('#confirmDelete').off('click').on('click', function() {
            window.location.href = 'index_admin.php?delete_category=' + categoryId;
        });
    });
    </script>
</body>

</html>