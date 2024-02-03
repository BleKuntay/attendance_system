<?php
require 'db_connect.php';

$query = "SELECT id, firstName, lastName, email, bio FROM user ORDER BY id DESC";
$result = $conn->query($query);
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

<?php
require 'db_connect.php';

$query = "SELECT id, firstName, lastName, email, bio FROM user WHERE email != 'admin@gmail.com' ORDER BY id DESC";
$result = $conn->query($query);
?>

<body>
    <div class="container mt-5 p-4">
        <h2>Dashboard</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td>
                                <a href="view_user.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm" style="height: 37px; color: black; font-weight:bold;">VIEW</a>
                                <a href="edit_user.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><box-icon name='edit'></box-icon></a>
                                <a href="delete_user.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><box-icon name='trash'></box-icon></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="3">No users found</td></tr>
                    <?php endif; ?>
                <?php $conn->close(); ?>
            </tbody>
        </table>
        <div class="row">
            <a href="add_user.php" class="btn btn-success mb-2">+ New User</a>
            <a href="logout.php" class="btn btn-secondary mb-2">Log Out</a>
        </div>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
