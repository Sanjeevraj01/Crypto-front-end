<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    require 'vendor/autoload.php';
 
    if (isset($_POST["register"]))
    {
        
        // $name = $_POST["name"];
        // $email = $_POST["email"];
        // $password = $_POST["password"];
        $name = "vj";
        $email = "sanjuofficial01@gmail.com";
        $password = "123";
        
 
        $mail = new PHPMailer(true);
 
        try {
            $mail->SMTPDebug = 0;
 
            $mail->isSMTP();
 
            $mail->Host = 'smtp.gmail.com';
 
            $mail->SMTPAuth = true;
 
            $mail->Username = 'kbpicture123@gmail.com';
 
            $mail->Password = 'leenabiju';
 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            $mail->Port = 587;  
 
            $mail->setFrom('Unknown@gmail.com', 'Cryptomaker');
 
            $mail->addAddress($email, $name);
 
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
            $conn = mysqli_connect("localhost:3306", "root", "", "crypto");
 
            $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
            mysqli_query($conn, $sql);
 
            header("Location: email-verification.php?email=" . $email);
            exit(); 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

<!-- <form method="POST">
    <input type="text" name="name" placeholder="Enter name" required />
    <input type="email" name="email" placeholder="Enter email" required />
    <input type="password" name="password" placeholder="Enter password" required />
 
    <input type="submit" name="register" value="Register">
</form> -->