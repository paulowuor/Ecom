<?php
$conn = mysqli_connect("localhost", "root", "", "farmer");
    if (!$conn) {
    	echo "Not connected";

    	// code...
    }
    else{
    	echo"succesfully connected";
    }
     
   
$nationalID =$_REQUEST['nationalID'];
$employNo =$_REQUEST['employNo'];
$fName =$_REQUEST['fName'];
$middlename =$_REQUEST['middlename'];
$lname =$_REQUEST['lname'];
    $managerID =$_REQUEST['managerID'];
    $companyID =$_REQUEST['companyID'];



$insert="INSERT INTO manager VALUES('$nationalID','$employNo','$fName','$middlename','$lname','$managerID','$companyID')";
if (mysqli_query($conn,$insert)) {
echo"Data stored";

}
else{
echo "Error:" .mysqli_error($conn);
 }
 


 ?>