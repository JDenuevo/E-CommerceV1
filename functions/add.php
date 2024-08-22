<?php

include '../dbconn.php'; // Adjust path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // SQL query to insert data
    $sql = "INSERT INTO students (name, age, email, contact) VALUES ('$name', '$age', '$email', '$contact')";

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