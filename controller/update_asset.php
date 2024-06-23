<?php
include '../db/connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $no_asset = htmlspecialchars($_POST['no_asset']);
    $kategori_asset = htmlspecialchars($_POST['kategori_asset']);
    $cost_center = htmlspecialchars($_POST['cost_center']);
    $tanggal_kapitalisasi = htmlspecialchars($_POST['tanggal_kapitalisasi']);
    $area_bisnis = htmlspecialchars($_POST['area_bisnis']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE asset SET no_asset = ?, kategori_asset = ?,
    cost_center = ?, tanggal_kapitalisasi = ?, area_bisnis = ?, deskripsi = ? WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $no_asset, $kategori_asset, $cost_center, $tanggal_kapitalisasi, $area_bisnis, $deskripsi, $id);
    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit(); // Ensure no further code is executed
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>