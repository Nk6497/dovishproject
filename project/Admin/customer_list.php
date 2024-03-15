<?php
session_start();
include('../db_connection.php');

// Check if the user is logged in as admin
/* if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];    
    $wallet_limit = 40000;

    $sql = "INSERT INTO customers VALUES (null, '$name', '$phone', '$email', '$password', $wallet_limit)";
    if ($conn->query($sql) === TRUE) {
       // $success = "User created successfully";
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all customers
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/customer_list.css">
</head>
<body>

    <!-- Header and Sidebar -->
    
    <?php
        
        include('header.php');
        include('sidebar.php');

    ?>

    <main class="content">
    <div class="container" id="content">
    <div class="container">
        <h2 class="customer-h2">Customer List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Limit Amount</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['wallet_balance'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No customers found</td></tr>";
            }
            ?>
        </table>
    </div>
    </div>
    </main>
    </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
