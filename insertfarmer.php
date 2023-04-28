<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 <style>
     body{
        background: powderblue;
     }
 </style>
<body>
    <center>
        <?php
 
        $conn = mysqli_connect("localhost", "root", "", "farmer");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        
        // Taking all 5 values from the form data(input)
        $nationalID =  $_REQUEST['nationalID'];
        $farmerID = $_REQUEST['farmerID'];
        $companyID =  $_REQUEST['companyID'];
        $fname= $_REQUEST['fname'];
        $middlename = $_REQUEST['middlename'];
        $lname= $_REQUEST['lname'];
        $phonenumber= $_REQUEST['phonenumber'];

         $check="SELECT * FROM farmer WHERE nationalID='$nationalID' LIMIT 1";
        
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO farmer VALUES ('$nationalID',
            '$farmerID','$companyID','$fname','$middlename','$lname','$phonenumber')";
         
        if(mysqli_query($conn, $sql)){
             echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='admin.php'>return to dashboard</a></p>
                    <p class='link'>Click here to <a href='farmerreport.php'>generate report</a></p>
                  </div>";
               } else{
              echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>