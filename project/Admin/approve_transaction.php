<?php
session_start();
include('../db_connection.php');

// Check if the user is logged in as admin
/* if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
 */
// Fetch pending transactions
$sql = "SELECT * FROM transactions WHERE status = 0";
$result = $conn->query($sql);   
?>        

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Transactions</title>
    <link rel="stylesheet" href="css/approve_transaction.css"> 
</head>
<body>
    <div class="container">
        <h2>Approve Transactions</h2>
        <table>
            <tr>
                <th>Transaction ID</th>
                <th>Customer Name</th>
                <th>Vendor Name</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sql_user = "SELECT name FROM customers WHERE id = '{$row['user_id']}'";
                    $result_user = $conn->query($sql_user); 
                    $row_user = $result_user->fetch_assoc();

                    $sql_vendor = "SELECT name FROM vendors WHERE id = '{$row['vendor_id']}'";
                    $result_vendor = $conn->query($sql_vendor); 
                    $row_vendor= $result_vendor->fetch_assoc();
    
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row_user['name'] . "</td>";
                    echo "<td>" . $row_vendor['name'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "<td><a href='approve_transaction_ajax.php?transaction_id=".$row['id']."' class='approve-btn'>Approve</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No pending transactions</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>