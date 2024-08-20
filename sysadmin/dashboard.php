<?php
session_start(); // Start the session

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'SystemAdmin') {
    header("Location: ../index.php"); // Redirect to login page if not logged in or not a System Admin
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("includes/title.php"); ?>
</head>

<body>

    <div class="container-fluid">
        <?php include("includes/header.php");
        include("includes/sidebar.php"); ?>


<div class="content" style="margin-left: 250px; padding: 20px;">
        <!-- Your main content goes here -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3 shadow rounded-pill">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text">25 Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3 shadow rounded-pill">
                            <div class="card-body">
                                <h5 class="card-title">Total Inventory</h5>
                                <p class="card-text">1500 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3 shadow rounded-pill">
                            <div class="card-body">
                                <h5 class="card-title">Pending Requests</h5>
                                <p class="card-text">8 Requests</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3 shadow rounded-pill">
                            <div class="card-body">
                                <h5 class="card-title">Recent Activity</h5>
                                <p class="card-text">5 New Entries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("includes/footer.php"); ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>