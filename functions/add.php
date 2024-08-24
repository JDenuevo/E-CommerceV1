<?php

include '../dbconn.php'; // Adjust path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $user_name = $_POST['user_name'];
    $user_pass = md5($_POST['user_pass']);
    $user_email = $_POST['user_email'];

    // SQL query to insert data
    $sql = "INSERT INTO users (user_name, user_pass, user_email) VALUES ('$user_name', '$user_pass', '$user_email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Redirect back to the main page after processing
header('Location: ../index.php'); // Adjust the path to where you want to redirect
exit();

?>