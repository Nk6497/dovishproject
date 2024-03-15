<?php
session_start();
include('db_connection.php');

if ($_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit();
}

// Fetch user data
$user_sql = "SELECT * FROM users";
$user_result = $conn->query($user_sql);

// Fetch vendor data
$vendor_sql = "SELECT * FROM vendors";
$vendor_result = $conn->query($vendor_sql);

// Fetch transaction data
$transaction_sql = "SELECT * FROM transactions";
$transaction_result = $conn->query($transaction_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>User Management</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Wallet Balance</th>
        </tr>
        <?php while($row = $user_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['wallet_balance']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Vendor Management</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Shop Name</th>
            <th>Shop Address</th>
        </tr>
        <?php while($row = $vendor_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['shop_name']; ?></td>
                <td><?php echo $row['shop_address']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Transaction Management</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Vendor ID</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
        <?php while($row = $transaction_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['vendor_id']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
