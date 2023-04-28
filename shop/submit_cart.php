<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    
  <!-- Add the following links to your HTML file -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>

<?php
session_start();
if(isset($_SESSION['username'])){
  $username = $_SESSION["username"];
  // rest of your code
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmer";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the cart data from the session
$cart = isset($_SESSION["shopping_cart"]) ? $_SESSION["shopping_cart"] : array();

// Initialize the price variable
$price = 0;

// Calculate the total price
foreach ($cart as $product) {
    $price += $product["price"] * $product["quantity"];
}

// Add the tax
$price *= 1.09;

// Insert the cart data into the database
$order_id = $_POST['order_id'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : ''; // Set a default value for the username
$id=  isset($_POST['id']) ? $_POST['id'] : '';

$sql = "INSERT INTO `order` (order_id, username,id, price) VALUES ('$order_id', '$username','$id', '$price')";

if (mysqli_query($conn, $sql)) {
    // Clear the cart from the session
    unset($_SESSION["shopping_cart"]);

    // Display a success message
    echo '<div class="alert alert-success" role="alert">';
    echo 'Your order was successfully submitted! We will notify you back once approved.';
    echo '</div>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
<body>

</body>
</html>