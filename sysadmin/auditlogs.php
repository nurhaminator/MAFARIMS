<?php
session_start(); // Start the session

// Check if the user is logged in and has the SystemAdmin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'SystemAdmin') {
    header("Location: ../index.php");
    exit();
}

// Include database connection
require '../includes/dbcon.php';

// Determine the sorting order
$orderBy = 'action_timestamp'; // Default order by action_timestamp
$order = 'DESC'; // Default order is descending

if (isset($_GET['sort_by'])) {
    $orderBy = $_GET['sort_by'];
    $order = ($_GET['order'] == 'ASC') ? 'ASC' : 'DESC';
}

// Fetch audit logs with username and formatted timestamp
$sql = "
    SELECT 
        Audit_Logs.log_id, 
        Audit_Logs.action_type, 
        Audit_Logs.table_name, 
        Audit_Logs.record_id, 
        Users.username, 
        DATE_FORMAT(Audit_Logs.action_timestamp, '%M %d, %Y %h:%i %p') as formatted_timestamp,
        Audit_Logs.details
    FROM Audit_Logs
    JOIN Users ON Audit_Logs.user_id = Users.user_id
    ORDER BY $orderBy $order
";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("includes/title.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
        }

        .sortable{
            color:black;
            text-decoration: none;
        }
        .sortable:hover {
            cursor: pointer;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #d8f0cc;
            color: white;
        }

        .table thead th,
        .table tbody tr:nth-of-type(even) {
            background-color: white;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="content" style="margin-left: 270px; padding: 20px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Audit Logs</li>
            </ol>

            <!-- Search Form -->
            <div class="input-group mb-1">
                <input type="text" id="searchInput" class="form-control" placeholder="Search audit logs..." onkeyup="filterTable()">
            </div>

            <div class="table-responsive">
                <table class="table table-striped" id="auditLogsTable">
                    <thead>
                        <tr>
                            <th><a class="sortable" href="?sort_by=action_type&order=<?php echo ($orderBy == 'action_type' && $order == 'ASC') ? 'DESC' : 'ASC'; ?>">Action Type</a></th>
                            <th><a class="sortable" href="?sort_by=table_name&order=<?php echo ($orderBy == 'table_name' && $order == 'ASC') ? 'DESC' : 'ASC'; ?>">Table Name</a></th>
                            <th><a class="sortable" href="?sort_by=user_id&order=<?php echo ($orderBy == 'username' && $order == 'ASC') ? 'DESC' : 'ASC'; ?>">Username</a></th>
                            <th><a class="sortable" href="?sort_by=action_timestamp&order=<?php echo ($orderBy == 'action_timestamp' && $order == 'ASC') ? 'DESC' : 'ASC'; ?>">Timestamp</a></th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0) : ?>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?php echo $row['action_type']; ?></td>
                                    <td><?php echo $row['table_name']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['formatted_timestamp']; ?></td>
                                    <td><?php echo $row['details']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">No audit logs found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script>
        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const table = document.getElementById('auditLogsTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let rowContainsSearchQuery = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().indexOf(searchInput) > -1) {
                        rowContainsSearchQuery = true;
                        break;
                    }
                }

                rows[i].style.display = rowContainsSearchQuery ? '' : 'none';
            }
        }
    </script>

</body>

</html>
