<?php
// Connect to the database
require('db1.php');


 
// Get the order ID and new status from the form
$order_id = $_POST['order_id'];
$new_status = $_POST['status'];

// Update the order status in the database
$sql = "UPDATE orders SET status = '$new_status' WHERE order_id = $order_id";

if (mysqli_query($con, $sql)) {
    echo "Order status updated successfully";
} else {
    echo "Error updating order status: " . mysqli_error($con);
}
?>
