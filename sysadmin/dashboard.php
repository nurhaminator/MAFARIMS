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
    <?php include("includes/title.php");?>
    <link rel="stylesheet" href="includes/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>
<body>
    <div class="container-fluid">
        <?php include("includes/header.php");
        include("includes/sidebar.php");?>

        <div class="wow"></div>
    
        <?php  include("includes/footer.php");?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
