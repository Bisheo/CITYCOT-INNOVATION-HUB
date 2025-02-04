<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid mt-4">
        
        <a href="form.php" class="btn btn-primary text-light btn btn-primary my-5 ">Add User</a>

        <!-- Responsive Table -->

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Asset ID</th>
                        <th scope="col">Asset Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Location</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php


                    $sql = "SELECT * FROM `asset_reg`";
                    $result = mysqli_query($conn, $sql);


                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <tr>
                                <td>' . $row['AssetID'] . '</td>
                                <td>' . $row['AssetName'] . '</td>
                                <td>' . $row['Category'] . '</td>
                                <td>' . $row['PurchaseDate'] . '</td>
                                <td>' . $row['Location'] . '</td>
                                <td>' . $row['Condition'] . '</td>
                                <td>' . $row['AssignedTo'] . '</td>
                                <td>' . $row['Notes'] . '</td>
                                <td>
                                    <a href="update.php?updateid=' . $row['AssetID'] . '" class="btn btn-sm btn-primary text-light">Update</a>
                                    <a href="delete.php?deleteid=' . $row['AssetID'] . '" class="btn btn-sm btn-danger text-light">Delete</a>
                                </td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>