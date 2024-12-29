<?php
$servername = "localhost"; // Change if using a different host
$username = "root";        // MySQL username
$password = "";            // MySQL password
$dbname = "FeedbackDB";    // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$uname = $_POST['uname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$satisfy = $_POST['satisfy'];
$msg = $_POST['msg'];

// Prepare SQL statement
$sql = "INSERT INTO Feedback (uname, email, phone, satisfy, msg)
VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $uname, $email, $phone, $satisfy, $msg);

// Execute and check for success
if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
