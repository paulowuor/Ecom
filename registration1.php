

 
<!DOCTYPE html>
<html>
<head>
    <?php
include("auth_session.php");

?>
<link rel="stylesheet" type="text/css" href="login.css">
    <meta charset="utf-8">
    <title>Welcome Admin</title>
    <style>
        .login-button {
  background-color: #4CAF50; /* Green background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 10px 20px; /* Padding */
  text-align: center; /* Center text */
  text-decoration: none; /* Remove underline */
  display: inline-block; /* Display as inline block */
  font-size: 16px; /* Font size */
  margin: 10px 2px; /* Add some margin */
  cursor: pointer; /* Change cursor to pointer */
  border-radius: 5px; /* Add rounded corners */
}

.resetbutton {
  background-color: #f44336; /* Red background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 10px 20px; /* Padding */
  text-align: center; /* Center text */
  text-decoration: none; /* Remove underline */
  display: inline-block; /* Display as inline block */
  font-size: 16px; /* Font size */
  margin: 10px 2px; /* Add some margin */
  cursor: pointer; /* Change cursor to pointer */
  border-radius: 5px; /* Add rounded corners */
}

    </style>
</head>
<body>
   
    <div class="form2">
        
        </div>
        <div class="side-menu">
          <div class="brand-name">
          </div>
          <ul>
            
            
             <li><a href="registration1.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px;"><span>Add Farmer</a></span></li>
             </li>
            <li><a href="addproduct.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>Add Product</a></span></li>
              <li><a href="home.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>Home Page</a></span></li>
          </ul>
        </div>
<div class="container">
    
<header>Farmer Tech lending platform</header>
  <div class="header">
    <li><a href="admin.php" style="text-decoration: none;"><img src="image/logo.JPG" style="width: 30px; height: 30px; margin: 2px;"><span style="color: gold;">Admin Dashboard</a></span></li>
    <div class="nav">
    <div class="search">
 <?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; ?>

    </div>
    <div class="user">
       
      <a href="farmerreport.php" class="btn">Generate Report</a>
       <img src="avatar.PNG" style="display: flex; width: 30px; height: 30px;">
      <div class="img-case">
        <p style="margin-left:45px;0px;"><strong style="margin-top: 100px;"><p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p><a href="logout.php">Logout</a></p>
      </div>
    </div>

  </div>
</div>
<div class="cover"></div>
 <h1>Farmer Lending Platform</h1>
<center><p style="margin-top:10px; text-align: center; margin-top: 5%;">Welcome Admin</p><center>
   <?php
   require('db1.php');

if (isset($_POST['username'])) {

    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $phonenumber   = stripslashes($_REQUEST['phonenumber']);
    $phonenumber    = mysqli_real_escape_string($con, $phonenumber);
    $nationalID   = stripslashes($_REQUEST['nationalID']);
    $nationalID    = mysqli_real_escape_string($con, $nationalID);
    $companyID  = stripslashes($_REQUEST['companyID']);
    $companyID   = mysqli_real_escape_string($con, $companyID);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    // Check if user already exists in the database
    $query = "SELECT * FROM farmers WHERE nationalID='$nationalID'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='form'>
              <h3>User already registered.</h3><br/>
              <p class='link'>Click here to <a href='registration1.php'>try again</a></p>
              </div>";
    } else {
        // Insert user into the database
        $query= "INSERT into `farmers` (username, password, email,phonenumber,nationalID,companyID)
                 VALUES ('$username', '" . md5($password) . "', '$email','$phonenumber','$nationalID','$companyID')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Farmer registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='farmerreport.php'>generate report</a></p>
                  <br>
                  <p class='link'>Click here to <a href='registration1.php'>register again</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration1.php'>register again</a></p>
                  </div>";
        }
    }
} else {
    // Display registration form
    ?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Register Farmer Here</h1>
        <input type="text" class="login-input" name="username" placeholder="Enter Username" required />
        <br>
        <input type="email"  class="login-input" name="email" placeholder="Enter Email Adress" required>
        
<br>
        <input type="tel" id="phone" class="login-input" name="phonenumber" placeholder="Phone No(must be numericals and max-10)"pattern="[0-9]{1}[0-9]{9}" 
       title="Invalid phone number" required>
        
        <br>
        <input type="text" id="national-id" class="login-input" name="nationalID" placeholder="Enter National ID" required>
        <span id="national-id-error"></span>
        <br>
       
<input type="text" id="companyID" class="login-input" name="companyID" placeholder="Enter Company ID" required>
    
          
        <br>
        <input type="password" id="password"  class="login-input" name="password" placeholder="Create Password" required>
        <br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <br>
     <input type="reset" name="reset"  value="reset" class="resetbutton">
        
    </form>
<script>
  // Get the input field
  const emailInput = document.getElementById("email");

  // Add an event listener to the input field
  emailInput.addEventListener("input", function(event) {
    // Check if the input value is a valid email address
    if (!emailInput.checkValidity()) {
      // If the email address is not valid, show an error message
      emailInput.setCustomValidity("Please enter a valid email address");
    } else {
      // If the email address is valid, clear the error message
      emailInput.setCustomValidity("");
    }
  });
</script>
<script>
// Get the input field
const passwordInput = document.getElementById("password");

// Define a regular expression to check the password
const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/;

// Add an event listener to the input field
passwordInput.addEventListener("input", function(event) {
  // Check if the input value is a valid password
  if (!passwordRegex.test(passwordInput.value)) {
    // If the password is not valid, show an error message
    passwordInput.setCustomValidity("Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and have a minimum length of 8 characters");
  } else {
    // If the password is valid, clear the error message
    passwordInput.setCustomValidity("");
  }
});

</script>
<script>
    const nationalIdInput = document.getElementById("national-id");
const nationalIdError = document.getElementById("national-id-error");

// Add an event listener to the input field
nationalIdInput.addEventListener("input", function(event) {
  const nationalIdPattern = /^\d{8}/;
  const nationalIdValue = nationalIdInput.value.trim();

  // Check if the input value is a valid national ID
  if (!nationalIdPattern.test(nationalIdValue)) {
    // If the national ID is not valid, show an error message
    nationalIdError.textContent = "Please enter a valid national ID";
    nationalIdInput.classList.add("error");
  } else {
    // If the national ID is valid, clear the error message
    nationalIdError.textContent = "";
    nationalIdInput.classList.remove("error");
  }
});

</script>

<?php
    }
?>

</body>
 <footer>
    <p>&copy; De Developer <span id="current-year"></span></p>
<script>const currentYear = new Date().getFullYear();
const currentYearElement = document.getElementById("current-year");
currentYearElement.textContent = currentYear;
</script>
</footer>
</html>

 
 
