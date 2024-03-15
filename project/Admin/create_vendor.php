<!DOCTYPE html>
<html>
<head>
    <title>Create Vendor</title>
    <link rel="stylesheet" href="css/create_vendor.css"> 
</head>
<body>
    <h2>Create Vendor</h2>
    <form method="post" action="vendor_list.php">
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
