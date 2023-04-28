<!DOCTYPE html>
<html>
<head>
     <?php
include("auth_session.php");

?>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <script src="min.js"></script>

</head>
<style type="text/css">


footer{
    margin-top: 80%;
background: gold;
position: sticky;
width: 100%;
}
body{
     background-image: url(image/farmer1.JPG);
     background-repeat: no-repeat;
     background-size: cover;
     background-attachment: fixed;
}
.container{
     background-image: url(image/farmer1.JPG);
     background-repeat: no-repeat;
     background-size: cover;
     background-attachment: fixed;
    }
    h1{
        text-align: center;
        margin-top: 5%;

    }
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
}
body{
    min-height: 100vh;
}
a{
    text-decoration: none;
}
li{
    list-style: none;
}

h2{
    color: #444;
}
.btn{
    background: teal ;
    color: white;
    padding: 5px 10px;
    text-align: center;
}
.btn:hover{
    color: blue;
    background: gold;
    border: 2px solid;
}
.side-menu{
    position: fixed;
    background: green;
    width: 20vw;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    margin-top: 5%;
    width: 10%;
}
.side-menu .brand-name{
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.side-menu li a{
    font-size: 12px;
    padding: 20px 40px;
    color: white;
    display: flex;
    align-items: center;
    width: 7%;
}
.side-menu li a:hover {
background: powderblue;
color: #f05462;
}
.container{
    position: absolute;
    right: 0;
    width: 80vw;
    height: 100vh;
}
.container .header{
    position: fixed;
    top: 0;
    right: 0;
    width: 80vw;
    height: 10vh;
    background: green;
    display: flex;
    align-items: center;
    width: 100%;
    box-shadow: 0 4px 8px 0 rgb(0, 0, 0);

}
.container .header .nav{
    width: 90%;
    display: flex;
    align-items: center;

}
.container .header .nav .search{
    flex: 3;
    display: flex;
    justify-content: center;
}
.container .header .nav .search input[type=text]{
    border: none;
}
.container .header .nav .user{
    flex: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.container .header .nav .search button{
    width: 40px;
    height: 40px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
}
.container .header .nav .img-case{
    position: relative;
    width: 40px;
    height: 40px;
}
.container .header .nav .img-case img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
@media screen and (max-width: 1050px){
    .side-menu li{
        font-size: 18px;
    }
}
@media screen and (max-width: 1050px){
    .side-menu li span{
        display: none;
    }
}
.container .content{
    position: relative;
    margin-top: 10vh;
    min-height: 900vm;

}
.container .content .cards{
    padding: 20px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
.container .content .cards .card{
    width: 50px;
    height: 380px;
    background: white;
    
    display: flex;
    align-items: center;
    justify-content: space-around; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) 0 6px 20px rgba(0, 0, 0, 0.9);
}
.submenu{
    display: inline;
    display: block;
    cursor: pointer;
}

    h1{
        text-align: center;
        background: seagreen;
    }
    h2{
        text-align: center;
    }
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #0077be;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

button {
  background-color: #0077be;
  color: white;
  border: none;
  padding: 8px 16px;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}
.approve-btn {
    background-color: green;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.reject-btn {
    background-color: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}


</style>
    <body>
   
    <div class="form2">
        
        </div>
        <div class="side-menu">
          <div class="brand-name">
          </div>
          <ul>
            
            
             <li><a href="registration1.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px;"><span>Add Farmer</a></span></li>
             </li>
             <li><a href="admin_approve.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px;"><span>Approve Carts</a></span></li>
             </li>
            <li><a href="addproduct.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>Add Product</a></span></li>
              <li><a href="admin.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>Home</a></span></li>
          </ul>
        </div>
<div class="container">
    
<header>Farmer Tech lending platform</header>
  <div class="header">
    <li><a href="admin.php" style="text-decoration: none;"><img src="image/logo.JPG" style="width: 30px; height: 30px; margin: 2px;"><span style="color: gold;">Admin Dashboard</a></span></li>
    <div class="nav">
    <div class="search">
         <?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; ?>
    </div>

    <div class="user">
        
      <a href="farmerreport.php" class="btn">Generate Report</a>
       <img src="avatar.PNG" style="display: flex; width: 30px; height: 30px;">
      <div class="img-case">
        <p style="margin-left:45px;0px;"><strong style="margin-top: 100px;"><p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p><a href="admin_login.php">Logout</a></p>
      </div>
    </div>

  </div>
</div>
<div class="cover"></div>
 <h1>Farmer Lending Platform</h1>
<center><p style="margin-top:10px; text-align: center; margin-top: 5%;">Approve Orders</p><center>
   <button type="print" ><a href="pdf.php"> download</a></button>
   <?php
require('db.php');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve all the pending orders
$sql = "SELECT * FROM `order`";
$result = $con->query($sql) or die(mysqli_error($con));

if ($result->num_rows > 0) {
        echo "<table border='1'>";
    echo "<tr><th>Order ID</th><th>User ID</th><th>Product ID</th><th>Total Cost(Ksh.)</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
              <td>" . $row["order_id"] . "</td>
              <td>" . $row["username"] . "</td>
              <td>" . $row["id"] . "</td>
              <td>" . $row["price"] . "</td>
              <td>
                  <button class='approve-btn' id='approve-btn-" . $row["order_id"] . "' onclick='approveOrder(" . $row["order_id"]. ")'>Approve</button>
                  <button class='reject-btn' onclick='rejectOrder(". $row["order_id"] .")'>Reject</button>
              </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No pending orders.";
}

$con->close();
?>



<script>
function approveOrder(order_id) {
  // Send an AJAX request to the server to update the order status
  $.ajax({
    url: 'Approved.php',
    type: 'POST',
    data: {order_id: order_id, status: 'approved'},
    success: function(response) {
      // Display a success message to the user
      alert('Do you want to approve this order!');
      // Update the UI to reflect the new status of the order
      $('#approve-btn-' + order_id).replaceWith('<span class="approved-text">Approved</span>');
    },
    error: function() {
      // Display an error message to the user
      alert('There was an error approving the order. Please try again later.');
    }
  });
}


</script>
<script>

function rejectOrder(order_id) {
  // Send an AJAX request to the server to update the order status
  $.ajax({
    url: 'reject.php',
    type: 'POST',
    data: {order_id: order_id, status: 'rejected'},
    success: function(response) {
      // Display a success message to the user
      alert('Do you want to reject this order!');
      // Update the UI to reflect the new status of the order
      $('#reject-btn-' + order_id).prop('disabled', true);
      $('#reject-btn-' + order_id).text('rejected');
    },
    error: function() {
      // Display an error message to the user
      alert('There was an error approving the order. Please try again later.');
    }
  });
}
</script>