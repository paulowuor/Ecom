<?php
$conn = mysqli_connect("localhost", "root", "", "farmer");
    if (!$conn) {
    	echo "Not connected";

    	// code...
    }
    else{
    	echo"succesfully connected";
    }

$name =$_REQUEST['name'];
$location =$_REQUEST['location'];
$email =$_REQUEST['email'];
$companyID =$_REQUEST['companyID'];
$sql="INSERT INTO company VALUES('$name','$location','$email','$companyID ')";
if (mysqli_query($conn,$sql)) {
echo"Data stored";

}
else{
echo "Error:" .mysqli_error($conn);
 }
 ?>