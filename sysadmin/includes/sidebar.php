<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 270px;
            background-color: #fff;
            padding-top: 20px;
            transition: all 0.3s;
        }

        .sidebar a {
            color: #000;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .sidebar a i {
            margin-right: 10px;
            color:#00bf63;
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

        .hamburger {
            display: none;
            font-size: 30px;
            margin: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar border">
        <br><br><br><br>
        <h4 class="text-center text-success p-2 m-0"><?php echo $_SESSION['full_name'] ?></h4><br>
        <div class="container">
            <div class="nav flex-column">
                <a class="nav-link active" href="dashboard.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a class="nav-link" href="inventory_management.php">
                    <i class="fas fa-boxes"></i> Inventory Management
                </a>
                <a class="nav-link" href="user_management.php">
                    <i class="fas fa-users"></i> User Management
                </a>
                <a class="nav-link" href="item_requests.php">
                    <i class="fas fa-clipboard-list"></i> Item Requests
                </a>
                <a class="nav-link" href="distribution_management.php">
                    <i class="fas fa-shipping-fast"></i> Distribution Management
                </a>
                <a class="nav-link" href="reports_generation.php">
                    <i class="fas fa-chart-line"></i> Reports Generation
                </a>
            </div>
        </div>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.hamburger').click(function() {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>