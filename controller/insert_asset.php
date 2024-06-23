<?php
// Include the database connection file
include '../db/connection.php';


// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $no_asset = htmlspecialchars($_POST['no_asset']);
    $kategori_asset = htmlspecialchars($_POST['kategori_asset']);
    $cost_center = htmlspecialchars($_POST['cost_center']);
    $tanggal_kapitalisasi = htmlspecialchars($_POST['tanggal_kapitalisasi']);
    $area_bisnis = htmlspecialchars($_POST['area_bisnis']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    // var_dump($no_asset, $kategori_asset, $cost_center, $tanggal_kapitalisasi, $area_bisnis, $deskripsi);
    // return;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO asset (no_asset, kategori_asset, cost_center, tanggal_kapitalisasi, area_bisnis, deskripsi) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $no_asset, $kategori_asset, $cost_center, $tanggal_kapitalisasi, $area_bisnis, $deskripsi);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error;
    }


    // Close the statement and connection
    $stmt->close();
}
?>