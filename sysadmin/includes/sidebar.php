<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Admin Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            color: #000;
            text-decoration: none;
        }
        .sidebar a.active {
            font-weight: bold;
            background-color: #198754;
            color: white;
            border-radius: 20px;
        }
        .sidebar .nav-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="container">
          <br><br><hr>
            <div class="nav flex-column">
                <a class="nav-link active" href="dashboard.php">Dashboard</a>
                <a class="nav-link" href="inventory_management.php">Inventory Management</a>
                <a class="nav-link" href="user_management.php">User Management</a>
                <a class="nav-link" href="item_requests.php">Item Requests</a>
                <a class="nav-link" href="distribution_management.php">Distribution Management</a>
                <a class="nav-link" href="reports_generation.php">Reports Generation</a>
            </div>
        </div>
    </div>

    <div class="content" style="margin-left: 250px; padding: 20px;">
        <!-- Your main content goes here -->
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
