<?php
session_start(); // Start the session

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'SystemAdmin') {
    header("Location: ../index.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("includes/title.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-custom {
            background-color: #00bf63; /* Uniform color for the cards */
            color: white;
            border-radius: 1.25rem; /* Rounded corners */
        }
        .card-custom .card-body {
            text-align: center;
            position: relative;
        }
        .card-custom .card-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .chart-container {
            width: 100%;
            height: 150px;
        }
        .card-custom .card-footer {
            background-color: #00bf63;
            border: none;
        }
        #main{
            height: 76.7vh;
        }
    </style>
</head>

<body>
    
    <div class="container-fluid">
        <?php include("includes/header.php");
        include("includes/sidebar.php"); ?>
<section id="main">
        <div class="content" style="margin-left: 250px; padding: 20px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-custom mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Active Users</h5>
                                <div class="chart-container">
                                    <canvas id="activeUsersChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Inventory</h5>
                                <div class="chart-container">
                                    <canvas id="inventoryChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-custom mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Requests</h5>
                                <div class="chart-container">
                                    <canvas id="requestsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-custom mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Distributions</h5>
                                <div class="chart-container">
                                    <canvas id="distribution_map"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for more details (optional) -->
    <div class="modal fade" id="activeUsersModal" tabindex="-1" aria-labelledby="activeUsersModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activeUsersModalLabel">Active Users Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Larger Chart.js for Active Users -->
                    <canvas id="activeUsersModalChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="inventoryModal" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inventoryModalLabel">Inventory Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Larger Chart.js for Inventory -->
                    <canvas id="inventoryModalChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="requestsModal" tabindex="-1" aria-labelledby="requestsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestsModalLabel">Requests Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Larger Chart.js for Requests -->
                    <canvas id="requestsModalChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Small Chart.js for cards
        const activeUsersCtx = document.getElementById('activeUsersChart').getContext('2d');
        const inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
        const requestsCtx = document.getElementById('requestsChart').getContext('2d');

        new Chart(activeUsersCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May','June'],
                datasets: [{
                    label: 'Active Users',
                    data: [30, 50, 40, 60, 70, 100],
                    backgroundColor: '#ffffff',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false }
                }
            }
        });

        new Chart(inventoryCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Inventory',
                    data: [100, 200, 150, 300, 250],
                    borderColor: '#ffffff',
                    backgroundColor: 'rgba(255, 255, 255, 0.2)',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false }
                }
            }
        });

        new Chart(requestsCtx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    label: 'Requests',
                    data: [12, 30, 8],
                    backgroundColor: ['#ffffff', '#ffffff', '#ffffff'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false }
                }
            }
        });

        // Larger Chart.js for modals (if needed)
        const activeUsersModalCtx = document.getElementById('activeUsersModalChart').getContext('2d');
        const inventoryModalCtx = document.getElementById('inventoryModalChart').getContext('2d');
        const requestsModalCtx = document.getElementById('requestsModalChart').getContext('2d');

        new Chart(activeUsersModalCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Active Users',
                    data: [30, 50, 40, 60, 70],
                    backgroundColor: '#ffffff',
                }]
            },
            options: {
                responsive: true
            }
        });

        new Chart(inventoryModalCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Inventory',
                    data: [100, 200, 150, 300, 250],
                    borderColor: '#ffffff',
                    backgroundColor: 'rgba(255, 255, 255, 0.2)',
                }]
            },
            options: {
                responsive: true
            }
        });

        new Chart(requestsModalCtx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    label: 'Requests',
                    data: [12, 30, 8],
                    backgroundColor: ['#ffffff', '#ffffff', '#ffffff'],
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</body>
</html>
