<?php
// Retrieve the variables from the POST request
$orderId = $_POST['orderId'];
$totalPrice = $_POST['totalPrice'];

// Update the user table with the total price
// Replace the following code with your database query
$db = new mysqli("localhost", "root", "", "farmer");
$query = "UPDATE farmers SET price = $totalPrice WHERE id = (SELECT nationalID FROM orders WHERE id = $orderId)";
$db->query($query);
?>
