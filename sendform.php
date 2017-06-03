<?php
if(isset($_POST['sender_email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "matthewglassman78@gmail.com";
    $email_subject = "From Your Repsonsive Portfolio Form";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['sender_name']) ||
        !isset($_POST['sender_email']) ||
        !isset($_POST['sender_message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $sender_name = $_POST['sender_name']; // required
    $sender_email = $_POST['sender_email']; // required
    $sender_message = $_POST['sender_message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$sender_email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$sender_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  
  if(strlen($sender_message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($sender_name)."\n";
    $email_message .= "Email: ".clean_string($sender_email)."\n";
    $email_message .= "Message: ".clean_string($sender_message)."\n";
 
// create email headers
$headers = 'From: '.$sender_email."\r\n".
'Reply-To: '.$sender_email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $sender_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>