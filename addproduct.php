

 
<!DOCTYPE html>
<html>
<head>
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
            <li><a href="approved_farmers.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px;"><span>Approve Carts</a></span></li>
             </li>
              <li><a href="home.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>Home Page</a></span></li>
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
        <p><a href="logout.php">Logout</a></p>
      </div>
    </div>

  </div>
</div>
<div class="cover"></div>
 <h1>Farmer Lending Platform</h1>
<center><p style="margin-top:10px; text-align: center; margin-top: 5%;">Welcome Admin</p><center>
   <?php
    require('db2.php');

    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) {
        $product_count = count($_POST['name']);
        for ($i = 0; $i < $product_count; $i++) {
            $name = mysqli_real_escape_string($con, $_POST['name'][$i]);
            $code = mysqli_real_escape_string($con, $_POST['code'][$i]);
            $price = mysqli_real_escape_string($con, $_POST['price'][$i]);
            
$image= $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];

$upload_dir = 'item_images/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$itempic = rand(1000,1000000).".".$imgExt;


                
    
            if(in_array($imgExt, $valid_extensions)){           
        
                if($imgSize < 5000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$itempic);
                    $saveitem="insert into products (name,price,,code,image) VALUE ('$name','$price','$code','$image')";
                    mysqli_query($con,$saveitem);
                     echo "<script>alert('Data successfully saved!')</script>";             
                     echo "<script>window.open('addproduct.php','_self')</script>";
                }
                else{
                    
                     echo "<script>alert('Sorry, your file is too large.')</script>";               
                     echo "<script>window.open('addproduct.php','_self')</script>";
                }
            }
            else{
                
                 echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";              
                     echo "<script>window.open('addproduct.php','_self')</script>";
                
            }
        
    
        

}}
   
?>

<form class="form" action="" method="post" enctype="multipart/form-data">
    <h1 class="login-title">Add Products</h1>

    <div id="products-container">
        <div class="product">
            <input type="text" class="login-input" name="name" placeholder="name" required />
            <br>
            <input type="text" class="login-input" name="code" placeholder="code">
            <br>
            <input type="text" class="login-input" name="price" placeholder="price">
            <br>
            <label for="myfile">Select an image:</label>
            <input type="file" class="login-input" name="image">
            <br>
        </div>
    </div>

    

    <input type="submit" name="submit" value="Add " class="login-button">
    <p class="link"><p>Do you want to go back</p><a href="admin.php">Click Here  To Return </a></p>
</form>



<?php
  
?>
</body>
 <footer>
    <p>&copy; De Developer <span id="current-year"></span></p>
<script>const currentYear = new Date().getFullYear();
const currentYearElement = document.getElementById("current-year");
currentYearElement.textContent = currentYear;
</footer>
</html>

 
 
