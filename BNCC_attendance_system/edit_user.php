<?php
session_start();
require 'db_connect.php';

// Inisialisasi variabel untuk menyimpan data pengguna
$user = ['firstName' => '', 'lastName' => '', 'email' => '', 'bio' => ''];

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $stmt = $conn->prepare("SELECT firstName, lastName, email, bio FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "<p>User not found.</p>";
        exit;
    }
    $stmt->close();
} else {
    echo "<p>No user ID provided.</p>";
    exit;
}

// Jangan lupa menutup koneksi di akhir file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container mt-5 pt-3" style="width: 40vw;">
    <h2>Edit User</h2>
    <form action="update_user.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($userId); ?>">
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control" name="firstName" value="<?= htmlspecialchars($user['firstName']); ?>" required>
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" class="form-control" name="lastName" value="<?= htmlspecialchars($user['lastName']); ?>" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="form-group">
            <label>Bio:</label>
            <textarea class="form-control" name="bio"><?= htmlspecialchars($user['bio']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </form>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
