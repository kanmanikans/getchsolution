<?php
session_start();
	ini_set('display_errors','on');

    		require "Mail.php";
        
            $name = $_POST["name"];
            $email = $_POST["email"];
            $number = $_POST["number"];
            $service = $_POST["service"];
            $comments = $_POST["comments"];       
            $pagename = $_POST["pagename"];       
         

            $from = "G Tech Solutions <dev@gtechwebsolutions.com>";
			$subject = "GTS Enquiry";
			$host = "ssl://smtp.gmail.com";
			$port = "465";
			$username = "dev@gtechwebsolutions.com";
			$password = "fmnarxugvyprsyrh";
			$smtp = Mail::factory('smtp',
			array ('host' => $host,
				'port' => $port,
				'auth' => true,
				'username' => $username,
				'password' => $password));
		
			$cont = "Inquiry Details<br><br>Name: $name<br>Email: $email<br>Phone: $number<br>Service: $service<br>Comments: $comments<br><br>Page: $pagename";
		
			$email = "dev@gtechwebsolutions.com,shalini@gtechwebsolutions.com,siddiq@gtechwebsolutions.com,ranjithkannan.gts@gmail.com";
			$headers = array ('From' => $from,
			'To' => $email,
			'Subject' => $subject,
			'MIME-Version' => "1.0",
			'Content-type' => "text/html; charset=iso-8859-1"
		);
	
           if($mail = $smtp->send($email, $headers, $cont))
            {
                header("Location: https://gtechwebsolutions.com/thank-you/");
            }
 ?>