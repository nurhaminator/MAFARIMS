<?php
session_start(); // Start the session

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'SystemAdmin') {
    header("Location: ../index.php");
    exit();
}

// Include database connection
include("../includes/dbcon.php");

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add_user') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
        $role = $_POST['role'];
        $province_id = $_POST['province_id'] ?? null; // Use null if not set
        $municipality_id = $_POST['municipality_id'] ?? null; // Use null if not set

        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, password, role, province_id, municipality_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $password, $role, $province_id, $municipality_id);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['action']) && $_POST['action'] == 'add_location') {
        $location_type = $_POST['location_type'];
        if ($location_type == 'province') {
            $province_name = $_POST['province_name'];
            $stmt = $conn->prepare("INSERT INTO provinces (province_name) VALUES (?)");
            $stmt->bind_param("s", $province_name);
            $stmt->execute();
            $stmt->close();
        } elseif ($location_type == 'municipality') {
            $municipality_name = $_POST['municipality_name'];
            $province_id = $_POST['province_id'];
            $stmt = $conn->prepare("INSERT INTO municipalities (municipality_name, province_id) VALUES (?, ?)");
            $stmt->bind_param("si", $municipality_name, $province_id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch users from the database
$result = $conn->query("SELECT user_id, username, role, province_id, municipality_id, created_at FROM users");
$users = $result->fetch_all(MYSQLI_ASSOC);

// Fetch provinces and municipalities for dropdowns
$provinces = $conn->query("SELECT province_id, province_name FROM provinces")->fetch_all(MYSQLI_ASSOC);
$municipalities = $conn->query("SELECT municipality_id, municipality_name FROM municipalities")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("includes/title.php"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal-dialog {
            max-width: 50%;
        }

        .modal-header {
            background-color: #00bf63;
            color: white;
        }

        .btn-success {
            background-color: #00bf63;
            border: none;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #d8f0cc;
            color: white; /* Ensure text is readable */
        }

        /* Ensure the text in the header and even rows is not affected */
        .table thead th,
        .table tbody tr:nth-of-type(even) {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <?php include("includes/header.php");
        include("includes/sidebar.php"); ?>

        <div class="content" style="margin-left: 270px; padding: 20px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
            </ol>

            <div><!-- User List -->
                <h3 class="mt-4">Existing Users</h3>
                <!-- Buttons to trigger modals -->
                <button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
                <button type="button" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addLocationModal">Add Location</button>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Location</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td>
                                <?php
                                // Fetch province and municipality names
                                $province_name = '';
                                $municipality_name = '';

                                foreach ($provinces as $province) {
                                    if ($province['province_id'] == $user['province_id']) {
                                        $province_name = $province['province_name'];
                                        break;
                                    }
                                }

                                foreach ($municipalities as $municipality) {
                                    if ($municipality['municipality_id'] == $user['municipality_id']) {
                                        $municipality_name = $municipality['municipality_name'];
                                        break;
                                    }
                                }

                                echo $province_name ? $province_name : '';
                                echo $municipality_name ? ', ' . $municipality_name : '';
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                            <td>
                                <!-- Add buttons for actions like block or edit -->
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Block</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adding User -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="action" value="add_user">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="ProvincialUser">Province User</option>
                                <option value="MunicipalUser">Municipal User</option>
                            </select>
                        </div>
                        <div class="mb-3" id="provinceField">
                            <label for="province" class="form-label">Province</label>
                            <select id="province" name="province_id" class="form-select">
                                <option value="" disabled selected>Select a Province</option>
                                <?php foreach ($provinces as $province): ?>
                                    <option value="<?php echo htmlspecialchars($province['province_id']); ?>">
                                        <?php echo htmlspecialchars($province['province_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3" id="municipalityField" style="display: none;">
                            <label for="municipality" class="form-label">Municipality</label>
                            <select id="municipality" name="municipality_id" class="form-select">
                                <option value="" disabled selected>Select a Municipality</option>
                                <?php foreach ($municipalities as $municipality): ?>
                                    <option value="<?php echo htmlspecialchars($municipality['municipality_id']); ?>">
                                        <?php echo htmlspecialchars($municipality['municipality_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success rounded-pill">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Location -->
    <div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLocationModalLabel">Add Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="action" value="add_location">
                        <div class="mb-3">
                            <label for="location_type" class="form-label">Location Type</label>
                            <select id="location_type" name="location_type" class="form-select" required>
                                <option value="" disabled selected>Select Location Type</option>
                                <option value="province">Province</option>
                                <option value="municipality">Municipality</option>
                            </select>
                        </div>
                        <div class="mb-3" id="provinceFields" style="display: none;">
                            <label for="province_name" class="form-label">Province Name</label>
                            <input type="text" class="form-control" id="province_name" name="province_name">
                        </div>
                        <div class="mb-3" id="municipalityFields" style="display: none;">
                            <label for="municipality_name" class="form-label">Municipality Name</label>
                            <input type="text" class="form-control" id="municipality_name" name="municipality_name">
                            <label for="province_id" class="form-label">Select Province</label>
                            <select id="province_id" name="province_id" class="form-select">
                                <option value="" disabled selected>Select a Province</option>
                                <?php foreach ($provinces as $province): ?>
                                    <option value="<?php echo htmlspecialchars($province['province_id']); ?>">
                                        <?php echo htmlspecialchars($province['province_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success rounded-pill">Add Location</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show/Hide fields based on role selection
        document.getElementById('role').addEventListener('change', function () {
            const role = this.value;
            const provinceField = document.getElementById('provinceField');
            const municipalityField = document.getElementById('municipalityField');

            if (role === 'ProvincialUser') {
                provinceField.style.display = 'block';
                municipalityField.style.display = 'none';
            } else if (role === 'MunicipalUser') {
                provinceField.style.display = 'block';
                municipalityField.style.display = 'block';
            } else {
                provinceField.style.display = 'none';
                municipalityField.style.display = 'none';
            }
        });

        // Show/Hide fields based on location type selection
        document.getElementById('location_type').addEventListener('change', function () {
            const locationType = this.value;
            const provinceFields = document.getElementById('provinceFields');
            const municipalityFields = document.getElementById('municipalityFields');

            if (locationType === 'province') {
                provinceFields.style.display = 'block';
                municipalityFields.style.display = 'none';
            } else if (locationType === 'municipality') {
                provinceFields.style.display = 'none';
                municipalityFields.style.display = 'block';
            } else {
                provinceFields.style.display = 'none';
                municipalityFields.style.display = 'none';
            }
        });
    </script>
</body>

</html>
