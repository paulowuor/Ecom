
 
<!DOCTYPE html>
<html>
<head>

    </style>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Welcome Admin</title>
</head>
<body>
   
    <div class="form2">
        
        </div>
        <div class="side-menu">
          <div class="brand-name">
          </div>
          <ul>
            
            
             <li><a href="#" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px;"><span>Add Farmer</a></span></li>
             </li>
            <li><a href="#" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>Add Product</a></span></li>
              <li><a href="home.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>Home Page</a></span></li>
          </ul>
        </div>
<div class="container">
    
<header>Farmer Tech lending platform</header>
  <div class="header">
    <li><a href="admin.php" style="text-decoration: none;"><img src="image/logo.JPG" style="width: 30px; height: 30px; margin: 2px;"><span style="color: gold;">Admin Dashboard</a></span></li>
    <div class="nav">
    <div class="search">
<input type="text" placehold="search">
<button type="submit"> <img src="avatar.PNG" style="width: 30px; height: 30px;"></button>
    </div>
    <div class="user">
      <div class="img-case">
        
      </div>
    </div>

  </div>
</div>
 
<div class="cover"></div>
 <h1>Farmer Lending Platform</h1>
<?php

    require('db.php');

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
         
        $query    = "INSERT into `admin` (username, password,email)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
        } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <br>
        <input type="text" id="email" class="login-input" name="email" placeholder="Email Adress">
        <br>
        <input type="password" id="password" class="login-input" name="password" placeholder="Password">
        <br>
        <input type="submit" name="submit" value="Register" class="login-button">
      <p class="link">  <p>Do you have an account</p><a href="login.php">Click Here  To Login</a></p>
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
    </form>
<?php
    }
?>
<footer>
    <p>&copy; De Developer <span id="current-year"></span></p>
<script>const currentYear = new Date().getFullYear();
const currentYearElement = document.getElementById("current-year");
currentYearElement.textContent = currentYear;
</script>
</footer>
</body>
</html>