<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<title>Update famer</title>
</head>
<body>
<?php 
 $conn = mysqli_connect("localhost", "root", "", "farmer");
 $nationalID=$_POST['nationalID'];
 $query="SELECT * FROM farmers WHERE nationalID='$nationalID' ";
 $query_run=mysqli_query($conn,$query);
 if ($query_run) {
 while ($row=mysqli_fetch_array($query_run)) {
 	?>

<div class="container">
	<div class="jumbotron">
		<h2>Update data</h2>
		<hr>
    <input type="hidden" name="nationalID" value="<?php echo ['nationalID'] ?>">
		<form class="form" action="" method="post">
        <h1 class="login-title">Register Farmer Here</h1>
        <input type="text" class="form-control" name="username"   value=" <?php echo $row['username'] ?>">
        <br>
        <input type="text" class="login-input" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter Email Adress">
        
        <br>
        <input type="text" class="login-input" name="phonenumber" value="<?php echo $row['phonenumber'] ?>" placeholder="Enter Phonenumber">
        <br>
        <input type="text" class="login-input" name="nationalID" value="<?php echo $row['nationalID'] ?>" placeholder="Enter National ID">
        <br>
          <input type="text" class="login-input" name="companyID" value="<?php echo $row['companyID'] ?>" placeholder="Enter Company ID">
        <br>
        <input type="password" class="login-input" name="password" value="<?php echo $row['password'] ?>" placeholder="Create Password">
          
        
        <input type="submit" name="update" value="update" class="btn btn-primary">
       
    <a href="farmerreport.php" class="btn btn-danger"> CANCEL</a>
        
    </form>
      <?php
      if(isset($_POST['update'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        $nationalID=$_POST['nationalID'];
        $query="UPDATE farmers SET username='$username', email='$email', phonenumber='$phonenumber' nationalID='$nationalID' WHERE nationalID='$nationalID' ";
        $query_run=mysqli_query($conn,$query);
        if ($query_run) {
echo '<script> alert("Data Updated"); </script>';
header("location:farmerreport.php");
}
else{
echo '<script> alert("Data Not Updated"); </script>';
}
}
      ?>
	</div>
</div>

 	<?php
 }}
 else{
 	echo '<script> alert("No record found"); </script>';
 }
?>
</body>
</html>