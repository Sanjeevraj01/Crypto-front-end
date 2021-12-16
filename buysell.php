<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="buy/signup-login.css">
</head>
<body>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    require 'vendor/autoload.php';
 
    if (isset($_POST["register"]))
    {
        // $name = $_POST["name"];
        // $email = $_POST["mail"];
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
 
            $mail->Username = 'crptotest7@gmail.com';
 
            $mail->Password = 'Sanjeevraj01';
 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            $mail->Port = 587;  
 
            $mail->setFrom('Cryptowallet01@gmail.com', 'your otp is');
 
            $mail->addAddress("sanjuofficial01@gmail.com", $name);
 
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
            $conn = mysqli_connect("localhost:3306", "root", "", "crypto");
 
            $sql = "INSERT INTO users(name, email) VALUES ('" . $name . "', '" . $email . "',)";
            mysqli_query($conn, $sql);
 
            header("Location: email-verification.php?email=" . $email);
            exit(); 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

    <div class="row-fluid">
        <div class="col-md-4  col-sm-6  col-xs-12 login-box">
              <ul  class="list-inline tabs">
                  <li class="active text-center"><a  href="#sign-in" data-toggle="tab">BUY</a></li>
                  <li class="text-center"><a href="#log-in" data-toggle="tab">Sell</a></li>
              </ul>
			  
			  
			  

              <div class="tab-content clearfix">
                  <div class="tab-pane active" id="sign-in">
                      <div class="row">
                          <div class="col-md-12 col-sm-12 box-title text-center">
                              <h2>Buy your crypto</h2>
                          </div>
                          <form class="form sign-in-form" method="post" action="payment-form.html">
                              <div class="col-md-6 col-sm-6">
                                  <div class="form-group">
                                      <input type="text"  class="form-control" placeholder="Crypto Value">
                                  </div>  
                              </div>
                              <div class="col-md-6 col-sm-6">
                                  <div class="form-group">
                                      <input type="text"  class="form-control" placeholder="Usd/INR">
                                  </div>  
                              </div>
                              <div class="col-md-12 col-sm-12">
                                  <div class="form-group">
                                      <input type="email"  class="form-control" placeholder="Username">
                                  </div>  
                              </div>
                              <div class="col-md-12 col-sm-12">
                                  <div class="form-group">
                                      <input type="password"  class="form-control" placeholder="Crypto Id">
                                  </div>  
                              </div>
                              <div class="col-md-12 col-sm-12">
                                  <button type="submit" class="btn btn-block submit-btn">BUY</button>
                              </div>
                              
                          </form>
                      </div>
                  </div>

                  <div class="tab-pane" id="log-in">
                      <div class="row">
                          <div class="col-md-12 col-sm-12 box-title text-center">
                              <h2>To</h2>
                          </div>
                          <form class="form login-form" method="post">
                              <div class="col-md-12 col-sm-12">
                                  <div class="form-group">
                                      <input type="email"  class="form-control" placeholder="Crypto Address">
                                  </div>  
                              </div>
                              <div class="col-md-12 col-sm-12">
                                  <div class="form-group">
                                      <input type="password"  class="form-control" placeholder="Crypto Money">
                                  </div>  
                              </div>
                              <div class="col-md-12 col-sm-12">
                                  <button name="register" value="Register" type="submit" class="btn btn-block submit-btn">Send</button> 
                                  <!-- <input type="submit" name="register" value="Register"> -->
                              </div>
                          </form>
                      </div>
                  </div>
              </div> 
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</style>

<div id="perspective">
  <div id="container"></div>
</div>




</body>
</html>        