<?php
session_start();

require 'db_connect.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $stmt = $conn->prepare("SELECT id, firstName, lastName, email, bio FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "<p>User not found.</p>";
        exit;
    }
} else {
    echo "<p>No user ID provided.</p>";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>User Details</h2>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($user['email']); ?></h6>
            <p class="card-text"><?= htmlspecialchars($user['bio']); ?></p>
            <a href="dashboard.php" class="card-link">Back to Dashboard</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
