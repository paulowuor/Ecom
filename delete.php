<?php 

$conn = mysqli_connect("localhost", "root", "", "farmer");
if (isset($_POST['delete'])) {

$nationalID=$_POST['nationalID'];
$query="DELETE FROM farmers WHERE nationalID='$nationalID'";
$query_run=mysqli_query($conn,$query);
if ($query_run) {
echo '<script> alert("Data Deleted"); </script>';
header("location:farmerreport.php");
}
else{
echo '<script> alert("Data Not Deleted"); </script>';
}
}


 ?>
