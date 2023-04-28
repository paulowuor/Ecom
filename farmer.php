


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="farmer.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmer</title>
	<style>
		
		.loginbox input[type="reset"]{
	border: none;
	outline: none;
	height: 40px;
	background: #fb2525;
	color: #fff;
	font-size: 18px;
	border-radius: 40px;
}
.loginbox input[type="reset"]:hover{
	cursor: pointer;
	background: #ffc107;
	color: #000;
	}
	body{
		background-image: url(image/farmer1.JPG);
	}
	</style>
</head>
<body>
	
	<h1>Farmer Lending <br> Platform .</h1>
<div class="loginbox">
	<img src="avatar.PNG" class="avatar">
	<h2>Register Farmer</h2>
	<form action="registerfarmer_a.php" method="POST">
		<p>Enter Email</p>
		<input type="email" name="email" placeholder="Enter Email" required>
		<p>Enter Farmer ID</p>
		<input type="text" name="farmerID" placeholder="Enter Farmer ID" required>
		
		<p>Enter Company ID</p>
		<input type="text" name="companyID" placeholder="Enter Company ID" required>
		
		<p>Enter Fullname</p>
		<input type="text" name="fullname" placeholder="Enter Fullname" required>
	
		<p>Enter Phone Number</p>
		<input type="text" name="phonenumber" placeholder="Enter Phone Number" required>
		

	
		<input type="submit" name="save" value="Register">
		<input type="reset" name="" value="Clear">
	</form>
</div>
<center>

        </center>
<footer>
	  &copy;<em id="date"></em>Eng. Paul Owuor De Developer
	<br>

</footer>

</body>

</html>