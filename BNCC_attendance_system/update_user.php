<?php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $userId = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    $stmt = $conn->prepare("UPDATE user SET firstName = ?, lastName = ?, email = ?, bio = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $bio, $userId);

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully.'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating user.'); window.location.href='edit_user.php?id=" . $userId . "';</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='dashboard.php';</script>";
}

$conn->close();