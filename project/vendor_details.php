<?php
session_start();
include('db_connection.php');

if ($_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit();
}

// Fetch users and vendors for admin panel
$users_sql = "SELECT * FROM users WHERE role='customer'";
$users_result = $conn->query($users_sql);

$vendors_sql = "SELECT * FROM vendors";
$vendors_result = $conn->query($vendors_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Welcome Admin</h2>
    <h3>Users:</h3>
    <ul>
        <?php while($user = $users_result->fetch_assoc()) { ?>
            <li><?php echo $user['name']; ?> - <?php echo $user['phone']; ?> - <?php echo $user['email']; ?></li>
        <?php } ?>
    </ul>
    <h3>Vendors:</h3>
    <ul>
        <?php while($vendor = $vendors_result->fetch_assoc()) { ?>
            <li><?php echo $vendor['name']; ?> - <?php echo $vendor['phone']; ?> - <?php echo $vendor['shop_name']; ?> - <?php echo $vendor['shop_address']; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
