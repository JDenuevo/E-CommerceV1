<?php
include '../dbconn.php'; // Adjust path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = intval($_POST['id']); // Sanitize input
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    // SQL query to update data
    $sql = "UPDATE users SET user_name = ?, age = ?, email = ?, contact = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sissi", $name, $age, $email, $contact, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

header('Location: ../index.php'); // Redirect after updating
exit();
?>
