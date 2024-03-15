<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Use Limit</title>
    <link rel="stylesheet" href="../Customer/css/use_limit.css">
</head>
<body>
    <div class="container">
        <h2>Use Limit</h2>
        <form action="../Admin/process_transaction.php" method="post">
            <label for="vendor_mobile">Vendor Mobile Number:</label>
            <input type="text" id="vendor_mobile" name="vendor_mobile" required><br><br>
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" min="1" required><br><br>
            <input type="submit" value="Use Limit">
        </form>
    </div>
</body>
</html>

