<?php
session_start();
include('../db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {   
    $transactionId = $_GET['transaction_id'];

    // Update the status of the transaction to approved
    $sql = "UPDATE transactions SET status = 2 WHERE id = $transactionId";
    if ($conn->query($sql) === TRUE) {
        $sql_amount = "select amount, customer_id from transactions WHERE id = $transactionId";
        $result_amount = $conn->query($sql_amount);
        $row_amount = $result_amount->fetch_assoc();
        $amount =  $row_amount['amount'];
        $customer_id = $row_amount['customer_id'];

        $sql_update_amount = "UPDATE customers SET wallet_balance = wallet_balance + $amount WHERE id = $customer_id";
        $conn->query($sql_update_amount);

        header("Location: cancel_transaction.php");
        //echo "Transaction cancel successfully!";
    } else {
        echo "Error updating transaction: " . $conn->error;
    }
}
?>
