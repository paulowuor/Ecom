
 
<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        footer{
    margin-top: 100%;
background: gold;
position: sticky;
width: 100%;
}

    </style>
    <?php
include("auth_session.php");

?>
<link rel="stylesheet" type="text/css" href="login.css">
    <meta charset="utf-8">
    <title>Welcome Admin</title>
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
<input type="text" placehold="search">
<button type="submit"> <img src="avatar.PNG" style="width: 30px; height: 30px;"></button>
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
 $conn = mysqli_connect("localhost", "root", "", "farmer");
   $sql = "SELECT * FROM farmers";

   $query_run=mysqli_query($conn,$sql);
   ?>
   <?php
// check if the form is submitted
if(isset($_GET['search'])){
  // sanitize the search query to prevent SQL injection
  $search_query = mysqli_real_escape_string($conn, $_GET['search']);

  // construct the SQL query to search for users
  $sql = "SELECT * FROM farmers WHERE username LIKE '%{$search_query}%' OR email LIKE '%{$search_query}%' OR phonenumber LIKE '%{$search_query}%' OR nationalID LIKE '%{$search_query}%' OR companyID LIKE '%{$search_query}%'";

  // execute the query
  $query_run = mysqli_query($conn, $sql);
}
else{
  // display all users if the search form is not submitted
  $sql = "SELECT * FROM farmers";
  $query_run = mysqli_query($conn, $sql);
}
?>

<!-- display the search form and the table of users -->
<form action="" method="GET">
  <label for="search-input">Search:</label>
  <input type="text" id="search-input" name="search">
  <button type="submit">Search</button>
</form>

<table border="1" class="table table-bordered" style="background-color: white;">
  <thead class="table-dark">
    <tr>
      <th>username</th>
      <th>email</th>
      <th>phonenumber</th>
      <th>nationalID</th>
      <th>companyID</th>
      <th>EDIT</th>
      <th>DELETE</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (mysqli_num_rows($query_run) > 0) {
      while ($row = mysqli_fetch_array($query_run)) {
    ?>
        <tr>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phonenumber']; ?></td>
          <td><?php echo $row['nationalID']; ?></td>
          <td><?php echo $row['companyID']; ?></td>
          <td>
            <form action="updatefarmer.php" method="POST">
              <input type="hidden" name="nationalID" value="<?php echo $row['nationalID'] ?>">
              <input type="submit" name="update" class="btn btn-success" value="EDIT">
            </form>
          </td>
          <td>
            <form action="delete.php" method="POST">
              <input type="hidden" name="nationalID" value="<?php echo $row['nationalID'] ?>">
              <input type="submit" name="delete" class="btn btn-danger" value="DELETE">
            </form>
          </td>
        </tr>
    <?php
      }
    }
    else {
      // display a message if no records found
      echo "<tr><td colspan='7'>No record found</td></tr>";
    }
    ?>
  </tbody>
</table>


</body>
 <footer>
    &copy;<em id="date"></em>Paul Owuor De Developer
</footer>
</html>

 
 
