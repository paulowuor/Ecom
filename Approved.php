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

//get email address
//$email_address=get_farmer_email_address($orderId);

//send email notification
//send_email_notification_to_farmer($email_address,$message="We have successfully approved your order");

// Update the order status in the database
$query = "UPDATE `order` SET `status` ='$status' WHERE `order`.`order_id` = $orderId";
$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
  die('Error updating order status: ' . mysqli_error($conn));
}


// function get_farmer_email_address($order_id=){

//   //fetch username given order_id

//   $query="SELECT username FROM order WHERE order_id=$orderId";
//   $result = mysqli_query($conn, $query);

//   if($result){

//     $row = mysqli_fetch_assoc($result);

//     $username=$row["username"];

//     //fetch email address from farmers table using username


//     $email_query="SELECT email FROM farmers WHERE username=$username";
//     $email_result = mysqli_query($conn, $email_query);
  
//     if($email_result){
  
//       $row = mysqli_fetch_assoc($email_result);
  
//       $email_address=$row["email"];
  
//       //fetch email address from farmers table using username
//     }


//   }

//   return $email_address;


// }

// function send_email($email_address='',$message=''){


//   //  initialize post fields
//                   $post_fieds = json_encode(array(
                      
//                           "From"=> "geofrey.ongidi@digitalvision.co.ke",
//                           "To"=> $email_address,
//                           "Subject"=> "Hello from Postmark",
//                           "HtmlBody"=> $message,
//                           "MessageStream"=> "notifications"
                      
//                   ));
  
//                   // if get token
//                   if($token = get_authorization_token()){
//                       $url = "https://api.postmarkapp.com/email";
//                       $curl = curl_init();
//                       curl_setopt_array($curl, array(
//                       CURLOPT_URL => $url,
//                       CURLOPT_RETURNTRANSFER => true,
//                       CURLOPT_ENCODING => "",
//                       CURLOPT_MAXREDIRS => 10,
//                       CURLOPT_TIMEOUT => 0,
//                       CURLOPT_FOLLOWLOCATION => true,
//                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                       CURLOPT_CUSTOMREQUEST => "POST",
//                       CURLOPT_POSTFIELDS =>$post_fieds,
//                       CURLOPT_HTTPHEADER => array(
//                           "Authorization: Bearer".$token,
//                           "Content-Type: application/json",
//                           "Accept: application/json",
//                           "X-Postmark-Server-Token: b1371069-335f-431b-8f45-88c22d7f1c47"
//                       ),
//                       ));
//                       $response = curl_exec($curl);
//                       $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//                       $err = curl_error($curl);
//                       curl_close($curl);
//                       if ($err) {
                          
//                           return FALSE;
//                       } else {                    
//                           if($response){
//                               if($file = json_decode($response)){ 
  
//                                   //store data in db
                                  
//                                   print_r($file);
                                 
//                               }else{
//                                   return FALSE;
//                               }
//                               //print_r($file);die;
//                           }else{
//                               $error = $err?:'';
//                               $code = $httpcode?:'';
//                               return FALSE;
//                           }
//                       }
//                   }else{
//                       return FALSE;
//                   }      
//   }
  
// // Close the database connection
mysqli_close($conn);
?>
