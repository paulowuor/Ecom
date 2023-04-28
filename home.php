<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="style2.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
	footer{
		text-align: center;
		background: gold;
	}
	#footer{
	background: gold;
}
#side-bar{
	height: 780px;
}
#side-bar{
	border: 1px solid #fff;
	width: 150px;
	margin-left: px;
	background: green;
}
</style>
<body>
<div class="main-container">
<div class="header">
	<div class="logo">
		<img src="images/ej.jpg">
		</div>
		<h3>FARMER LENDING <span>SYSTEM WITH USSD SERVICE</span></h3>
	<div class="search-box">
		<input type="search" placeholder="search">
	</div>
	</div>
	<nav>
		 <?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; ?>
		<!-=========First link=====---->
		<span onclick="document.getElementById('side-bar').style.display = 'block'">
		<i  class="fa-solid fa-bars"></i></span>
		<ul>

			<li><a href="#"><i class="fa-solid fa-house"></i>Home</a></li>
			<li><a href="#"><i class="fa-solid fa-eject"></i>About</a></li>
			<li><a href="contact.php"><i class="fa-regular fa-envelope"></i>Contact</a></li>
			<li><a href="#"><i class="fa-solid fa-bolt"></i>Login</a></li>
			

		</ul>
	</nav>
	<div id="side-bar">
		<!-=========second link=====---->
		<span onclick="document.getElementById('side-bar').style.display = 'none'">Close &times</span>
	<ul>
	
		<li><a href="#"><i class="fa-solid fa-guage"></i>Dashboard</a></li>
		<label style="color: white; text-align:center;">User</label>
  <select name="User" onchange="location = this.value;">
 <option value="admin_login.php">Admin</option>
 <option value="farmer_login.php">Farmer</option>
</select>
		<li><a href="#"> <i class="fa-sharp fa-solid fa-cart-shopping-fast"></i>Inputs</a></li>
		<li><a href="#">Feedback</a></li>
		<li><a href="#"><i class="fa-duotone fa-gear"></i>Settting</a></li>
		<li><a href="#">Help</a></li>
		
	</ul>
	
	</div>

</div>
</body>
 <footer>
    &copy;<em id="date"></em>Paul Owuor De Developer
</footer>
</body>
</html>