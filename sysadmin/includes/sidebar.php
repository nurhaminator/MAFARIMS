<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background-color: #00bf63;
            color: white;
            border-radius: 20px;
        }
        .sidebar .nav-item {
            margin-bottom: 10px;
        }
        footer {
            background-color: green;
            color: white;
            padding: 20px 0;
            left: 0;
        }
    </style>
</head>
<body>
    <div class="sidebar border">
        
    <br><br><br><br>  
    <h4 class="text-center bg-success text-white p-2 rounded"><?php echo $_SESSION['full_name']?></h4><br>

        <div class="container">

            <div class="nav flex-column">
                <a class="nav-link active" href="dashboard.php">Dashboard</a>
                <a class="nav-link" href="inventory_management.php">Inventory Management</a>
                <a class="nav-link" href="user_management.php">User Management</a>
                <a class="nav-link" href="item_requests.php">Item Requests</a>
                <a class="nav-link" href="distribution_management.php">Distribution Management</a>
                <a class="nav-link" href="reports_generation.php">Reports Generation</a>
            </div>
        </div>
        <br>
        <footer class="text-center bg-success">
    &copy; 2024 Developed by : CSU-BSIT Capstone Project
</footer>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
