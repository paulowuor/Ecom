 <?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
}   
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
    background: #4CAF50;
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
   background: #4CAF50;
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
.form {
    margin: 50px auto;
    width: 300px;
    padding: 30px 25px;
    background:powderblue;
}
h1.login-title {
    color: blue;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;

}
.login-input {
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.login-button {
    color: #fff;
    background: #55a1ff;
    border: 0;
    outline: 0;
    width: 100%;
    height: 50px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
}
.link {
    color: blue;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
}
.link a {
    color: #666;
}
h2 {
    font-weight: normal;
    text-align: center;
    font-weight: bold;
  
}

}
.logout{
    color: white;
    background: green;
}
footer{
    text-align: center;
    background: gold;
    margin-top: 30%;
}
h1{
    text-align: center;
}
.product_wrapper {
    float:left;
    padding: 10px;
    text-align: center;
    }
.product_wrapper:hover {
    box-shadow: 0 0 0 2px #e5e5e5;
    cursor:pointer;
    }
.product_wrapper .name {
    font-weight:bold;
    }
.product_wrapper .buy {
    text-transform: uppercase;
    background: green;
    border: 1px solid #F68B1E;
    cursor: pointer;
    color: #fff;
    padding: 8px 40px;
    margin-top: 10px;
}
.product_wrapper .buy:hover {
    background: teal;
    border-color: #f17e0a;
}
.message_box .box{
    margin: 10px 0px;
    border: 1px solid #2b772e;
    text-align: center;
    font-weight: bold;
    color: #2b772e;
    }
.table td {
    border-bottom: #F0F0F0 1px solid;
    padding: 10px;
    }
.cart_div {
    float:right;
    font-weight:bold;
    position:relative;
    }
.cart_div a {
    color:#000;
    }   
.cart_div span {
    font-size: 12px;
    line-height: 14px;
    background: #F68B1E;
    padding: 2px;
    border: 2px solid #fff;
    border-radius: 50%;
    position: absolute;
    top: -1px;
    left: 13px;
    color: #fff;
    width: 20px;
    height: 20px;
    text-align: center;
    }
.cart .remove {
    background: none;
    border: none;
    color: #0067ab;
    cursor: pointer;
    padding: 0px;
    }
.cart .remove:hover {
    text-decoration:underline;
}


.table_header{
font-weight: bold;
color:green ;

}
footer{
    margin-top: 80%;
background: gold;
position: sticky;
width: 100%;
}

.remove{
  background: gold;
}
.cart{
  background: teal;
}
.table_header{
  background-color: white;
}
/* Style for the submit cart button */
.submit-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.submit-btn:hover {
  background-color: #3e8e41;
}

/* Style for the Go Back link */

</style>

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
            <li><a href="#" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px"><span>About Us</a></span></li>
             <li><a href="contact.php" style="text-decoration: none;"><img src="avatar.PNG" style="width: 30px; height: 30px; margin: 2px;"><span>Contact Us</a></span></li>
            
             </li>
            
          </ul>
        </div>
<div class="container">
    

  <div class="header">
    <li><a href="#" style="text-decoration: none;"><img src="image/logo.JPG" style="width: 30px; height: 30px; margin: 2px;"><span style="color: gold;">Admin Dashboard</a></span></li>
    <div class="nav">
    <div class="search">
 <?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; ?>
    </div>
    <div class="user">
       <img src="person.PNG" style="display: flex; width: 30px; height: 30px;">
      <div class="img-case">
        <p style="margin-left:45px;0px;"><strong style="margin-top: 100px;"><p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p><a href="farmer/farmer_login.php">Logout</a></p>
      </div>
    </div>

  </div>
</div>
<div class="cover"></div>
<h1>Farmer Lending Platform</h1>
<center><p style="margin-top:10px; text-align: center; margin-top: 5%;">Welcome Farmer</p><center>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
  h1{
    background-color: green;
  }
</style>
<body>
  
  <h3 style="background-color: gold;">Place Order Now</h3>
  <hr>
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price =0;
   
?>  
<table class="table">
<tbody>
<tr class="table_header">
<td>PRODUCT IMAGE</td>
<td>PRODUCT NAME</td>
<td>PRODUCT QUANTITY</td>
<td>UNIT PRICE</td>
<td>TOTAL MONEY</td>
</tr> 
<?php   
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr class="order">
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
    
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class="remove" style="background-color: skyblue;" >Remove this item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "Ksh.".$product["price"]; ?></td>
<td><?php echo "Ksh.".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);

}
$interest= $total_price*1.09;
?>
<tr>
<td colspan="5" align="right">
<strong class="price">TOTAL WITHOUT INTEREST: <?php echo "Ksh.".$total_price; ?></strong>

</td>
</tr>
<tr>
<td colspan="5" align="right">
  <strong class="price">TOTAL WITH INTEREST: <?php echo "Ksh.".$interest; ?></strong></td>
</tr>
</tbody>
</table>    
  <?php
}else{
  echo "<h3>Your cart is empty!</h3>";
  }
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

<form method="post" action="submit_cart.php">

     <input type="hidden" name="order_id" value="your_order_id_here">
     <input type="hidden" name="username" value="<?php$_REQUEST['username'] ?>" >
    <input type="hidden" name="id" value="your_product_id_here">
    <input type="hidden" name="price" value="your_total_price_here">

  <button type="submit" class="submit-btn">Submit order</button>
</form>
<br>
<h3 style="background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  text-align: center;
  width: 200px;
  height: 60px;
  cursor: pointer"><a href="index.php">Back To Add More</a></h3>

    
<footer>
    &copy;<em id="date"></em>Paul Owuor De Developer
</footer>
</body>
</html>
