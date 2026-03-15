<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'config.php';
require 'plugins/PHPMailer/src/Exception.php';
require 'plugins/PHPMailer/src/PHPMailer.php';
require 'plugins/PHPMailer/src/SMTP.php';

// //Load Composer's autoloader
// require 'vendor/autoload.php';

function  send_password_reset_email($get_name,$get_email){
    
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        $mail->SATPOptions = array( 
            'ssl' => array( 
                'verify_peer' =>false,
                 'verify_peer_ name' =>false,
                  'allow_self _signed' => true
            )
            );
    //               //Server settings / Smail→SMTPDebug = 2; ail→IsSNTP(); ail→Host • CONFIG['email'J['host']; ail-SHTPAuth - true; ail-Port - CONFIG[°email'][°port°]; 1/587, 465 ail-SATPSecure - CONFIG[°emai1° ]['SMTPSecure' ]; ail →Usernane = CONFIG['email"Jl'username']: Saail-Password - CONFIG[° email*]['password°];
    //     //Server settings
    //     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = CONFIG['email']['host'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;  
        $mail->Port       = CONFIG['email']['port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                         //Enable SMTP authentication
        $mail->SMTPSecure = CONFIG['email']['SMTPSecure'];          //Enable implicit TLS encryption

        $mail->Username   = CONFIG['email']['username'];                    //SMTP username
        $mail->Password   = CONFIG['email']['password'];                               //SMTP password
    
    //     //Recipients
        $mail->setFrom('brio.kapil@gmail.com',"NMIMS Admin");
        $mail->addAddress($get_email, $get_name);     //Add a recipient
       
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Set a new password';
        $mail->Body    = 'To set new passowrd <a href="http://localhost/nmis/new_password.php">Click here</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
    
        $mail->send();
        echo '<h2 style="color:green;text-align:center;">Message has been sent check email</h2>';
        echo "<center><a style='font-size:25px;' href='login.php'>Back to Login</a><center>";
        
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


 if($_SERVER["REQUEST_METHOD"] == "POST") {
    //  echo $_POST['email'];
     $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
     $email = mysqli_real_escape_string($con,$_POST['email']);
//     $token = md5(rand());
     $check_email = "select * from students where email = '$email' LIMIT 1";
     $check_email_run = mysqli_query($con,$check_email);
    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];
        // echo $get_name;
        //  echo "sitaram";
        $_SESSION['password_email'] = $get_email;

        send_password_reset_email($get_name,$get_email);
    } else {
        
        header("Location: reset_password.php");
        $_SESSION['err_msg'] = "No Email Found";

        // exit(0);
    }
    
 }       
?>