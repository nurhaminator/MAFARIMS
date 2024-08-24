<?php
session_start(); // Start the session

// Check if the user is logged in and has the correct role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'SystemAdmin') {
    header("Location: ../index.php");
    exit();
}

include("../includes/dbcon.php");

// Fetch Agricultural Supplies
$agriculturalQuery = "SELECT * FROM Agricultural_Supplies";
$agriculturalResult = $conn->query($agriculturalQuery);

// Fetch Machineries
$machineriesQuery = "SELECT * FROM Machineries";
$machineriesResult = $conn->query($machineriesQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: none;
            border-bottom: 1px solid #dee2e6;
        }

        .btn-add {
            background-color: #00bf63;
            color: white;
        }

        .btn-add:hover {
            background-color: #00a354;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <!-- Include your header and sidebar -->
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="content">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Inventory Management</li>
            </ol>

            <h2>Agricultural Supplies</h2>
            <button class="btn btn-add mb-3" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Supply Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Added By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($agriculturalResult->num_rows > 0) {
                        while ($row = $agriculturalResult->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['supply_id']}</td>
                                <td>{$row['supply_name']}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['unit']}</td>
                                <td>{$row['added_by']}</td>
                                <td>{$row['created_at']}</td>
                                <td>{$row['updated_at']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No Agricultural Supplies found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <h2>Machineries</h2>
            <button class="btn btn-add mb-3" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Machinery Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Added By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($machineriesResult->num_rows > 0) {
                        while ($row = $machineriesResult->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['machinery_id']}</td>
                                <td>{$row['machinery_name']}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['added_by']}</td>
                                <td>{$row['created_at']}</td>
                                <td>{$row['updated_at']}</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No Machineries found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addInventoryForm" action="add_inventory.php" method="post">
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="itemName" name="itemName" required>
                        </div>
                        <div class="mb-3">
                            <label for="itemCategory" class="form-label">Category</label>
                            <select class="form-select" id="itemCategory" name="itemCategory" required>
                                <option value="Agricultural Supplies">Agricultural Supplies</option>
                                <option value="Machineries">Machineries</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="itemQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="itemQuantity" name="itemQuantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="itemUnit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="itemUnit" name="itemUnit" required>
                        </div>
                        <div class="mb-3">
                            <label for="addedBy" class="form-label">Added By</label>
                            <input type="text" class="form-control" id="addedBy" name="addedBy" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>
