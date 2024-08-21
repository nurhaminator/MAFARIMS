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
        body {
            background-color: #fff;
        }

        .profile-settings {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
        }

        .profile-settings h3 {
            margin-bottom: 30px;
            color: #00bf63;
        }

        .profile-settings .form-group {
            margin-bottom: 15px;
        }

        .profile-settings .btn-primary {
            background-color: #00bf63;
            border-color: #00bf63;
        }

        .profile-settings .btn-primary:hover {
            background-color: #009e52;
            border-color: #009e52;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="content" style="margin-left: 270px; padding: 20px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                </ol>
            <!-- Profile Settings Content Start -->
            <div class="profile-settings">
                <h3>Profile Settings</h3>
                <form>
                    <div class="form-group">
                        <label for="fullName"><?php echo $_SESSION['full_name'] ?></label>
                        <input type="text" class="form-control" id="fullName" value="<?php echo $_SESSION['full_name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</button>
                </form>
            </div>

            <!-- Change Password Modal -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="changePasswordForm">
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Settings Content End -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script>
        // Example script to handle form submission (you can replace this with actual functionality)
        $('#changePasswordForm').on('submit', function(e) {
            e.preventDefault();
            // Perform your password change logic here
            alert('Password changed successfully!');
            $('#changePasswordModal').modal('hide');
        });
    </script>

</body>

</html>