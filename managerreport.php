


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manager Report</title>
</head>
<body>
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
</body>
</html>