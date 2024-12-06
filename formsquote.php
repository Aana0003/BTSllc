<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/vendor/phpmailer/Exception.php';
require 'assets/vendor/phpmailer/PHPMailer.php';
require 'assets/vendor/phpmailer/SMTP.php';




$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['full_phone'];
$pickUpDate = $_POST['pickUpDate'];
$pickUpTime = $_POST['pickUpTime'];
$pickUpLocation = $_POST['pickUpLocation'];
$dropOffLocation = $_POST['dropOffLocation'];
$flightNumber = $_POST['flightNumber'];
$arrivalTime = $_POST['arrivalTime'];
$passengerCount = $_POST['passengerCount'];
$luggageCount = $_POST['luggageCount'];
$childSeats = $_POST['childSeats'];
$childAge = $_POST['childAge'];
$credit = $_POST['credit'];


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

  try
    {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'bernard@ridewithbernards.com';                     //SMTP username
      $mail->Password   = 'Paseorio5204$';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('bernard@ridewithbernards.com', 'btsllc');
      $mail->addAddress('bernard@ridewithbernards.com', 'btsllc');     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'New enquiry - from btsllc contact form';
      $bodyContent = '<div>Hello, you got a new enquiry</div>
                      <div>Name : '.$name.'</div>
                      <div>Email : '.$email.'</div>
                      <div>Phone : '.$phone.'</div>
                      <div>Pick Up Date : '.$pickUpDate.'</div>
                      <div>Pick Up Time : '.$pickUpTime.'</div>
                      <div>Pick Up Location : '.$pickUpLocation.'</div>
                      <div>Drop Off Location : '.$dropOffLocation.'</div>
                      <div>Flight Number : '.$flightNumber.'</div>
                      <div>Arrival Time : '.$arrivalTime.'</div>
                      <div>Passenger Count : '.$passengerCount.'</div>
                      <div>Luggage Count : '.$luggageCount.'</div>
                      <div>Child Seats : '.$childSeats.'</div>
                      <div>Child Age : '.$childAge.'</div>';
                      

      $mail->Body = $bodyContent;

      if ($credit) {
        $mail->addAttachment($credit, 'credit_form.pdf');
    }

      if ($mail->send() === TRUE) 
      {
          header("Location: thankyou.html");
          exit();
      }
      else 
      {
          // Display error message
          echo "Error: " . $mail->ErrorInfo;
      }        
 
    }   
    
  catch (Exception $e) 
      {
        {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      }

?>