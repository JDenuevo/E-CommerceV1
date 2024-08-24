<?php
// Include database connection
include '../dbconn.php';

if (isset($_GET['user_id'])) {
    // Get the user_id from the GET request
    $user_id = $_GET['user_id'];

    // Get user_fullname and user_password from the POST request
    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];

    // Hash the password (assuming it's stored as an md5 hash in the database)
    $hashed_password = md5($user_password);

    // Prepare SQL query to check if the user exists
    $query = "SELECT * FROM users WHERE user_id = ? AND user_name = ? AND user_pass = ?";
    
    // Initialize and prepare statement
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("sss", $user_id, $user_name, $hashed_pass);

        // Execute the statement
        $stmt->execute();

        // Store the result
        $stmt->store_result();

        // Check if a matching record was found
        if ($stmt->num_rows > 0) {
            // Redirect to the landing page
            header("Location: ../pages/index.php");
            exit();
        } else {
            echo "Invalid credentials. Please try again.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the SQL statement.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "User ID not provided.";
}
?>
