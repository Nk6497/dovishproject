<?php

session_start();
include('../db_connection.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Creation</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/customer_add.css">  
</head>
<body>

<?php
include('header.php');
include('sidebar.php');

?>
<main class="content">
    <div class="container" id="content">
    <h2>Customer Creation</h2>
    <form method="post" action="customer_list.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Create User">
    </form>
</div>
</main>
    <?php if(isset($success)) echo $success; ?>
    <?php if(isset($error)) echo $error; ?>
</body>
</html>
