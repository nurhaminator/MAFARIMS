<?php
// Include database connection
include("../includes/dbcon.php");

if (isset($_POST['province_id'])) {
    $province_id = $_POST['province_id'];

    $stmt = $conn->prepare("SELECT municipality_id, municipality_name FROM municipalities WHERE province_id = ?");
    $stmt->bind_param("i", $province_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<option value="" disabled selected>Select a Municipality</option>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . htmlspecialchars($row['municipality_id']) . '">' . htmlspecialchars($row['municipality_name']) . '</option>';
    }
    $stmt->close();
}
?>
