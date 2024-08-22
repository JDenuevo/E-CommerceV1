<?php
include '../dbconn.php'; // Adjust path as needed

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

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

header('Location: ../index'); // Redirect after deleting
exit();
?>
