<?php
session_start();
include('../db_connection.php');

// Check if the user is logged in as admin
/* if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
} */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password']; 
    $shop_name = $_POST['shop_name'];
    $shop_address = $_POST['shop_address'];

    $sql = "INSERT INTO vendors VALUES (null, '$name', '$phone', '$password', '$shop_name', '$shop_address')";
    
    if ($conn->query($sql) === TRUE) {
       // echo "Vendor created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all vendors
$sql = "SELECT * FROM vendors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor List</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/vendor_list.css">
</head>
<body><!-- Header and Sidebar -->
    
    <?php
        
        include('header.php');
        include('sidebar.php');

    ?>
 
 <main class="content">   
 <div class="container" id="content">
 <div class="container">
        <h2 class="vendor-h2">Vendor List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Shop Name</th>
                <th>Shop Address</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['shop_name'] . "</td>";
                    echo "<td>" . $row['shop_address'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No vendors found</td></tr>";
            }
            ?>
        </table>
    </div>
    </div>
    </main>
    <script>
        function loadPage(page) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", page, true);
            xhttp.send();
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
