<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'farmer');

// Check for errors
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Get the order ID and status from the AJAX request
$orderId = $_POST['order_id'];
$status = $_POST['status'];
 
//send email notification
//send_email_notification_to_farmer($email_address,$message="We have successfully approved your order");

// Update the order status in the database
$query = "UPDATE `order` SET `status` ='$status' WHERE `order`.`order_id` = $orderId";
$result = mysqli_query($conn, $query);


 //fetch username given order_id
if($result){
 $query="SELECT `username` FROM `order` WHERE `order`.`order_id` = $orderId";
 $result = mysqli_query($conn, $query);

 if($result){
  $row = mysqli_fetch_assoc($result);

  $username=$row["username"];

 $query="SELECT `email` FROM `farmers` WHERE `farmers`.`username` = '$username'";
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
                          "HtmlBody"=> "<strong>Dear Farmer,
<br>
We are pleased to inform you that your recent order with Paul De Developer Company has been approved and is now being processed. We appreciate your business and are grateful for the opportunity to serve you.

As you know, our company is committed to providing innovative solutions to help farmers like you improve their productivity and livelihoods. We take great pride in offering high-quality products and services to support your farming operations, and we believe that your recent order reflects this commitment.

If you have any questions or concerns about your order, please do not hesitate to contact us. Our team is always here to support you and ensure that your experience with Paul De Developer Company is a positive one.

Thank you for choosing us as your agricultural partner. We look forward to continuing to work with you and helping you achieve your farming goals.

Best regards,
Owuor Paul
Paul De Developer Company.",
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