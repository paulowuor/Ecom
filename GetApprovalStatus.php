<?php
require('db.php');
// Assume that we have an array of orders, where each order is represented as an associative array with an 'id' and a 'status' field
$orders = [
    ['order_id' => 1, 'status' => 'approved'],
    ['order_id' => 2, 'status' => 'pending'],
    ['order_id' => 3, 'status' => 'approved'],
    // ... etc.
];

// Retrieve the order ID from the AJAX request
$order_id = isset($_POST['order_id']) ? $_POST['order_id'] : null;

if ($order_id !== null) {
    // Find the order with the specified ID
    $order = null;
    foreach ($order as $o) {
        if ($o['order_id'] == $order_id) {
            $order = $o;
            break;
        }
    }

    // If the order was found, return its status as a string ('approved' or 'pending')
    if ($order !== null) {
        echo $order['status'];
    } else {
        // If the order was not found, return an error message
        header('HTTP/1.1 404 Not Found');
        echo 'Order not found';
    }
} else {
    // If the order ID was not provided, return an error message
    header('HTTP/1.1 400 Bad Request');
    echo 'Order ID not provided';
}
?>
