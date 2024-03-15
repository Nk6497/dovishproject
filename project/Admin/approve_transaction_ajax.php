<?php
session_start();
include('../db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $transactionId = $_GET['transaction_id'];

    // Update the status of the transaction to approved
    $sql = "UPDATE transactions SET status = 1 WHERE id = $transactionId";
    if ($conn->query($sql) === TRUE) {
        header("Location: approve_transaction.php");
        //echo "Transaction approved successfully!";
    } else {
        echo "Error updating transaction: " . $conn->error;
    }
}
?>
