<?php
	include("db1.php");
	
	
// Check if form is submitted
if (isset($_POST['submit'])){
  
  // Get email and new password from form
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  
  // Check if new password and confirm password match
  if($password == $confirm_password){
    
    // Hash new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Update user's password in database
    // Your code to update password in database goes here
    
    // Show success message
    echo "Password reset successfully!";
    
  } else {
    // Show error message if new password and confirm password don't match
    echo "New password and confirm password don't match!";
  }
}
?>

	
		
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST" action="reset_password.php">
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>
  <br>
  <label for="password">New Password:</label>
  <input type="password" name="password" id="password" required>
  <br>
  <label for="confirm_password">Confirm Password:</label>
  <input type="password" name="confirm_password" id="confirm_password" required>
  <br>
  <input type="submit" name="submit" value="Reset Password">
</form>

</body>
</html>
