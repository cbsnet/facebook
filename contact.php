<?php

if(!$_POST) exit;
 
		$name     			= $_POST['name'];
        $email    			= $_POST['email'];
        $message 			= $_POST['message'];
		$phone				= $_POST['phone'];
		$website			= $_POST['website'];
        $verification_code  = $_POST['verification'];
		
        if($error == '') {
        
			if(get_magic_quotes_gpc()) {
            	$message = stripslashes($message);
            }


         //Add here the email address where you want to recive the emails from this contact form
         $address = "a.sale@cbsnet.it";
		          
		 //Email Body Configuration
         $email_subject = 'Nuovo messaggio da ' . $name . '.';
					
		 $email_body = "Hai ricevuto un nuovo messaggio da Facebook! Ti scrive $name :\r\n\n";
		 $email_content = "\"$message\"\r\n\n";
		 $email_reply = "e-mail di $name : $email\r\nCellulare: $phone\r\nSito web: $website\r\nCodice di verifica: $verification_code";
					
         $msg = $email_body . $email_content . $email_reply;

         if(mail($address, $email_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n")) {


		 // Load a success page if the message was sent.		
		 header("Location: success.html");
		 		 
		 } else {
		 
		 // Load a error page if the message wasn't sent.
		 header("Location: error.html");
		 
		 }
                      
	}

?>