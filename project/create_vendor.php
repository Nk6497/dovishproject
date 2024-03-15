<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password']; 
    $shop_name = $_POST['shop_name'];
    $shop_address = $_POST['shop_address'];

    $sql = "INSERT INTO vendors VALUES (null, '$name', '$phone', '$password', '$shop_name', '$shop_address')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Vendor created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Vendor</title>
    <style>
      /* Resetting default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Global styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

.container {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Form styles */
form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 10px;
    color: #333;
}

input[type="text"], input[type="tel"], input[type="password"] {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s;
}

input[type="text"]:focus, input[type="tel"]:focus {
    border-color: #4CAF50;
    outline: none;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <h2>Create Vendor</h2>
    <form method="post" action="dashboard.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="shop_name">Shop Name:</label>
        <input type="text" id="shop_name" name="shop_name"><br><br>
        <label for="shop_address">Shop Address:</label>
        <input type="text" id="shop_address" name="shop_address"><br><br>
        <input type="submit" value="Create Vendor">
    </form>
</body>
</html>
