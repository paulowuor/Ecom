

 
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
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: admin.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='admin_login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h2 class="login-title">Admin Log In</h2>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" id="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="rpassword.php">Forgot password</a></p>
        <p>Don't have an account </p>
        <p class="link"><a href="registration.php">Register Here</a></p>
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
    </form>
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

 
 
