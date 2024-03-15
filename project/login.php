<?php
session_start();
include('db_connection.php');

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    $password = $_POST['password'];

    if ($role === 'admins') {
        $email = $_POST['email'];
        $sql = "SELECT * FROM $role WHERE email='$email' AND password='$password'";
    } else {
        $phone = $_POST['phone'];
        $sql = "SELECT * FROM $role WHERE phone='$phone' AND password='$password'";
    }

    $result = $conn->query($sql);

    if ($result === false) {
        die("Error executing query: " . $conn->error);          
    }

    if ($result->num_rows > 0) {
        if ($role === 'customers') {
            $row = $result->fetch_assoc();
            $_SESSION['customer_id'] = $row['id'];
        }
        $_SESSION['role'] = $role;
        header("Location: dashboard.php"); // Redirect to appropriate dashboard
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>              
<div class="login-container">    
    <h2>Login</h2>
    <form id="loginForm" method="post" action="">
        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="customers">Customer</option>
            <option value="vendors">Vendor</option>
            <option value="admins">Admin</option>
        </select><br><br>
        <div id="emailField" style="display: none;">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
        </div>
        <div id="phoneField">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone"><br><br>
        </div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
    <div id="error" style="color: red;"></div>
</div>

    <script>
        $(document).ready(function() {
            $('#role').change(function() {
                var selectedRole = $(this).val();
                if (selectedRole === 'admins') {
                    $('#emailField').show();
                    $('#phoneField').hide();
                } else {
                    $('#emailField').hide();
                    $('#phoneField').show();
                }
            });
        });
    </script>
</body>
</html>

