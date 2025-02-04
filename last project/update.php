<?php
include 'connect.php'; 
$AssetID=$_GET['updateid'];

$sql= "select * from `asset_reg` where  AssetID = $AssetID";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$AssetID=$row['AssetID'];
$AssetName=$row['AssetName'];
$Category=$row['Category'];
$PurchaseDate=$row['PurchaseDate'];
$Location=$row['Location'];
$Condition=$row['Condition'];
$AssignedTo=$row['AssignedTo'];
$Notes=$row['Notes']; 


if (isset($_POST['submit'])) {
    $asset_id = $_POST['asset_id'];
    $asset_name = $_POST['asset_name'];
    $category = $_POST['category'];
    $purchase_date = $_POST['purchased_date'];
    $location = $_POST['location'];
    $condition = $_POST['condition'];
    $assigned_to = $_POST['assigned_to'];
    $notes = $_POST['notes'];

   
    $sql =  "UPDATE `asset_reg` 
    SET 
        AssetID = '$asset_id', 
        AssetName = '$asset_name', 
        Category = '$category', 
        PurchaseDate = '$purchase_date', 
        Location = '$location', 
        `Condition` = '$condition', 
        AssignedTo = '$assigned_to', 
        Notes = '$notes' 
    WHERE AssetID = '$AssetID'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        //  echo "updated successfully!";
         header('location:display.php');
    } else {
        die(mysqli_error($conn)); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .form-header {
            font-size: 24px;
            font-weight: bold;
            color: #4a4a4a;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #6c757d;
        }

        .btn-custom {
            background-color: #007bff;
            border: none;
            font-size: 18px;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="form-container">
                    <h2 class="form-header">Asset Information Form</h2>
                    <form method="post">
                        <div class="row">
                            <!-- first column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="asset_id" class="form-label">Asset ID:</label>
                                    <input type="text" id="asset_id" name="asset_id" class="form-control" placeholder="Enter Asset ID" value="<?php echo $AssetID; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="asset_name" class="form-label">Asset Name:</label>
                                    <input type="text" id="asset_name" name="asset_name" class="form-control" placeholder="Enter Asset Name" value="<?php echo $AssetName; ?>" >
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Category:</label>
                                    <input type="text" id="category" name="category" class="form-control" placeholder="Enter Category" value="<?php echo $Category; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="purchased_date" class="form-label">Purchased Date:</label>
                                    <input type="date" id="purchased_date" name="purchased_date" class="form-control" value="<?php echo $PurchaseDate; ?>">
                                </div>
                            </div>

                            <!-- second column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location:</label>
                                    <select id="location" name="location" class="form-select" value="<?php echo $Location; ?>">
                                        <option value="Nakhill Campus">Nakhill Campus</option>
                                        <option value="Main Campus">Main Campus</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="condition" class="form-label">Condition:</label>
                                    <select id="condition" name="condition" class="form-select" value="<?php echo $condition; ?>">
                                        <option value="Working">Working</option>
                                        <option value="Scrap">Scrap</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="assigned_to" class="form-label">Assigned To:</label>
                                    <input type="text" id="assigned_to" name="assigned_to" class="form-control" placeholder="Enter Assigned To" value="<?php echo $AssignedTo; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="notes" class="form-label" value="<?php echo $Notes; ?>">Notes:</label>
                                    <textarea id="notes" name="notes" rows="3" class="form-control" placeholder="Additional Notes"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom w-100" name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>