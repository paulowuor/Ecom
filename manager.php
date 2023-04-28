 <?php
 require('db.php');

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['nationalID'])) {
        // removes backslashes
        $nationalID = stripslashes($_REQUEST['nationalID']);
        //escapes special characters in a string
        $nationalID = mysqli_real_escape_string($con, $nationalID);
        $employNo    = stripslashes($_REQUEST['employNo']);
        $employNo   = mysqli_real_escape_string($con, $employNo);
        $fName = stripslashes($_REQUEST['fName']);
        $fName = mysqli_real_escape_string($con, $fName);
        $middlename = stripslashes($_REQUEST['middlename']);
        $middlename = mysqli_real_escape_string($con, $middlename);
        $lname = stripslashes($_REQUEST['lname']);
        $lname = mysqli_real_escape_string($con, $lname);
        $managerID = stripslashes($_REQUEST['managerID']);
        $managerID = mysqli_real_escape_string($con, $managerID);
        $companyID = stripslashes($_REQUEST['companyID']);
        $companyID = mysqli_real_escape_string($con, $companyID);
        
        $query    = "INSERT into `manager` (nationalID, EmployNo, fName,middlename,lname,managerID,companyID)
                     VALUES ('$nationalID','$employNo', '$fName','$middlename','$lname','$managerID','$companyID')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            
                  header("Location: admin.php");
                  
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='manager.php'>registration</a> again.</p>
                  </div>";
        }
        } else {
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="manager.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manager</title>
<style>
    body{
        background-image: url(image/farmer1.JPG);
    }
</style>
</script>
</head>
<body>
	<h1>Mumias Farmers Tech <br> Mumias is Located in Kakamega County</h1>
<div class="loginbox">
	<img src="avatar.PNG" class="avatar">
	<h2>Register Manager</h2>
	<form action="" method="POST">
		<p>Enter National ID</p>
		<input type="text" name="nationalID" placeholder="Enter National ID" required>
		<p>Enter Employee No.</p>
		<input type="text" name="employNo" placeholder="Enter Employee No." required>
		<p>Enter First Name</p>
		<input type="text" name="fName" placeholder="Enter First Name" required>
		<p>Enter Middle Name</p>
		<input type="text" name="middlename" placeholder="Enter Middle Name" required>

		<p>Enter Last Name</p>
		<input type="text" name="lname" placeholder="Enter Last Name" required>
		<p>Enter Manager ID</p>
		<input type="text" name="managerID" placeholder="Enter Manager ID" required>
		<p>Enter Company ID</p>
		<input type="text" name="companyID" placeholder="Enter Company ID" required>
	
		<input type="submit" name="" value="Register">
		<input type="Reset" name="" value="Reset">
	</form>
	
</div>
<div class="generate">
<?php
 include('db.php');
$sql = "SELECT * FROM 'manager'";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>nationalID</th>";
                echo "<th>EmployNo</th>";
                echo "<th>fName</th>";
                echo "<th>middlename</th>";
                      echo "<th>lname</th>";
                            echo "<th>managerID</th>";
                                  echo "<th>companyID</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nationalID'] . "</td>";
                echo "<td>" . $row['employNO'] . "</td>";
                echo "<td>" . $row['fName'] . "</td>";
                echo "<td>" . $row['middlename'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['managerID'] . "</td>";
                      echo "<td>" . $row['companyID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>


</div>
<footer>
	&copy;<em id="date"></em>Mumias Alright preserved
</footer>
</body>
<?php
    }
?>
</html>