
<?php

require('db.php');
// Check if the request was sent via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get the order ID and status from the POST data
  $order_id = $_POST['order_id'];
  $status = $_POST['status'];

  // Update the status of the order in the database
  $sql = "UPDATE order SET status='$status' WHERE order_id=$order_id";

  if ($con->query($sql) === TRUE) {
    echo "Order rejected!";
  } else {
    echo "Error rejecting order: " . $con->error;
  }

  // Close the database connection
  $con->close();
}
error_reporting(E_ALL);
ini_set('display_errors', 0);

?>
