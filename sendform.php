<?php
    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $sender_message = $_POST['sender_message'];
    $from = $sender_email; 
    $to = 'matthewglassman78@gmail.com'; 
    $subject = 'From your contact form';
    // $human = $_POST['human'];
      
    $body = "From: $sender_name\n E-Mail: $sender_email\n Message:\n $sender_message";
        
    if ($_POST['submit']) {         
        if (mail ($to, $subject, $body, $from)) { 
      echo '<p>Your message has been sent!</p>';
  } else { 
      echo '<p>Something went wrong, go back and try again!</p>'; 
  } 
    } else if ($_POST['submit']) {
  echo '<p>You answered the anti-spam question incorrectly!</p>';
    }
?>