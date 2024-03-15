<?php
session_start();
include('../db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vendor_mobile = $_POST['vendor_mobile'];
    $amount = $_POST['amount'];
    $customer_id = $_SESSION['customer_id'];        
    // $user_id = 1;

    // Check if the vendor exists
    $sql = "SELECT * FROM vendors WHERE phone = '$vendor_mobile'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Vendor exists, proceed with the transaction
        $vendor = $result->fetch_assoc();
        $vendor_id = $vendor['id'];

        // Deduct amount from user's limit
        $sql = "UPDATE customers SET wallet_balance = wallet_balance - $amount WHERE id = $customer_id";
        if ($conn->query($sql) === TRUE) {
            // Update vendor's balance or perform any necessary operations
            // You may need to implement additional logic here

            // Insert transaction record into the database
            $sql = "INSERT INTO transactions (customer_id, vendor_id, amount) VALUES ('$customer_id', '$vendor_id', '$amount')";
            if ($conn->query($sql) === TRUE) {
                echo "Transaction successful!";
                header("Location: ../Customer/wallet_balance.php");
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Vendor not found!";
    }
}
?>
