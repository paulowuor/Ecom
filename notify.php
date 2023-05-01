<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'farmer');

// Check for errors
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Get the order ID and status from the AJAX request
$nationalID = $_POST['nationalID'];
$status = $_POST['status'];
 
//send email notification
//send_email_notification_to_farmer($email_address,$message="We have successfully approved your order");

// Update the order status in the database
$query = "UPDATE `farmers` SET `status` ='$status' WHERE `farmers`.`nationalID` = $nationalID";
$result = mysqli_query($conn, $query);


 //fetch username given order_id
if($result){
 $query="SELECT `email` FROM `farmers` WHERE `farmers`.`nationalID` = $nationalID";
 $result = mysqli_query($conn, $query);

 if($result){
  $row = mysqli_fetch_assoc($result);

  $email=$row["email"];

 $query="SELECT `email` FROM `farmers` WHERE `farmers`.`email` = '$email'";
 $result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$email_address=$row["email"];

//send email

  Send_email($email_address);
 
 }
}

// Check for errors
else {
  die('Error updating order status: ' . mysqli_error($conn));
}


function send_email($email_address=''){


  //  initialize post fields
                  $post_fieds = json_encode(array(
                      
                          "From"=> "oowuor20@student.kibu.ac.ke",
                          "To"=> $email_address,
                          "Subject"=> "Order Approval",
                          "HtmlBody"=> " Dear Farmers,
                          <br>

We hope this message finds you well. We are writing to notify you about two important updates regarding our company, Paul De Developer Company.

First, as you know, our mission is to provide innovative solutions to help farmers improve their productivity and livelihoods. We are proud to have you as our valued customers and partners in achieving this mission. We wanted to inform you that we have recently implemented new technology and tools to enhance our services and streamline our operations. These changes will allow us to better serve you and meet your evolving needs as farmers.

Secondly, we want to remind you that it is currently planting season. We encourage you to take advantage of this time to prepare your land and start planting your crops. Our team is here to support you every step of the way, from providing high-quality seeds and fertilizers to offering expert advice on crop management.

We are committed to continuing to provide the highest level of service and support to all of our customers, and we believe these updates will help us achieve this goal.

Thank you for your continued trust in Paul De Developer Company. We look forward to working with you to achieve our shared vision for a sustainable and thriving agricultural sector.

Best regards,
Owuor Paul
Paul De Developer Company",
                          "MessageStream"=> "notifications"
                      
                  ));
  
                  // if get token
                      $url = "https://api.postmarkapp.com/email";
                      $curl = curl_init();
                      curl_setopt_array($curl, array(
                      CURLOPT_URL => $url,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS =>$post_fieds,
                      CURLOPT_HTTPHEADER => array(
                          
                          "Content-Type: application/json",
                          "Accept: application/json",
                          "X-Postmark-Server-Token: b1371069-335f-431b-8f45-88c22d7f1c47"
                      ),
                      ));
                      $response = curl_exec($curl);
                      $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                      $err = curl_error($curl);
                      curl_close($curl);
                      if ($err) {
                          
                          return FALSE;
                      } else {                    
                          if($response){
                              if($file = json_decode($response)){ 
  
                                  //store data in db
                                  
                                  print_r($file);
                                 
                              }else{
                                  return FALSE;
                              }
                              //print_r($file);die;
                          }else{
                              $error = $err?:'';
                              $code = $httpcode?:'';
                              return FALSE;
                          }
                      }
                    }
  
// // Close the database connection
mysqli_close($conn);
?>