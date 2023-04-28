<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="account.css">
    <link rel="stylesheet" type="text/css" href="company.css">
</head>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['nationalID'])) {
        $nationalID = stripslashes($_REQUEST['nationalID']);    // removes backslashes
        $nationalID = mysqli_real_escape_string($con, $nationalID);
        $employNO = stripslashes($_REQUEST['employNO']);
        $employNO = mysqli_real_escape_string($con, $employNo);
        // Check user is exist in the database
        $query    = "SELECT * FROM `manager` WHERE nationalID='$nationalID'
                     AND employNo='employNO'" .  "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['nationalID'] = $nationalID;
            // Redirect to user dashboard page
            header("Location: admin.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect nationalID/Employee Number.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Manager Log In</h1>
        <input type="text" class="login-input" name="username" placeholder="nationalID" autofocus="true"/>
        <input type="text" class="login-input" name="password" placeholder="Employee Number"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p>Don't have an account </p>
        <p class="link"><a href="registration.php">Register Here</a></p>
    </form>
    <?php
    }
?>
<footer>
    &copy;<em id="date"></em>Mumias Alright preserved
</footer>
</body>

</html>