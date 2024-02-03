<?php
session_start();
require 'db_connect.php';

if (isset($_GET['id']) && isset($_SESSION['userid'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully.'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.'); window.location.href='dashboard.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('User ID not found or you are not logged in.'); window.location.href='login.php';</script>";
}

$conn->close();
?>
