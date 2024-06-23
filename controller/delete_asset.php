<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asset_monitoring";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is set in URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the ID

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM asset WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the variables to the prepared statement as parameters
    $bind = $stmt->bind_param("i", $id);
    if ($bind === false) {
        die("Bind failed: " . $stmt->error);
    }

    // Execute the statement
    $exec = $stmt->execute();
    if ($exec) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No user ID specified.";
}

// Close the connection
$conn->close();

// Redirect back to the user list
header("Location: ../index.php");
exit();

?>