<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Updation</title>
</head>
<body>
<center><h1>Update of data from database using php</h1>
	<form action="" method="POST">
		<input type="text" name="id" placeholder="Enter empId">
		<input type="text" name="id" placeholder="Enter empId">
		<input type="text" name="id" placeholder="Enter empId">
		<input type="text" name="id" placeholder="Enter empId">
		<input type="text" name="id" placeholder="Enter empId">
		<input type="submit" name="Update" value="update data">
	</form>

</center>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","farmer");

if (isset($_POST['update'])) {
	$id=$_POST('id');
	$query="UPDATE 'farmer' SET lname='$_POST[lname]',lname='$_POST[lname]',lname='$_POST[lname]' WHERE id=$_POST['id']";
	$query_run=mysqli_query($conn,$query);
	if ($query_run) {
		echo '<script type="text/javascript">alert("Data update")</script>';
	}
	else{echo '<script type="text/javascript">alert("Data update")</script>';
} 
}
	?>