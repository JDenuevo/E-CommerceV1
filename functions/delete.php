<?php
include '../dbconn.php'; // Adjust path as needed

if (isset($_POST['id'])) { // Changed from $_GET to $_POST
    $id = intval($_POST['id']); // Sanitize input

    // SQL query to delete data
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

header('Location: ../index.php'); // Redirect after deleting
exit();
?>
