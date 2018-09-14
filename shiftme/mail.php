<?php


         $subject='Subject here';
          $to = "kumar01anish@gmail.com";
        // $header = "From:team@shiftme.in \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
          $message = '<html><body>';
$message .= '<img src="http://inncrotech.com/migration/wp-content/uploads/2017/01/LGD4.png" alt="Website Change Request" />';

$message .= "</body></html>";
         
         $retval = mail ($to,$subject,$message,$header);

       
		 
         if( $retval == true ) {
            echo "Message sent successfully...";

         }else {
            echo "Message could not be sent...";
         }



      ?>
