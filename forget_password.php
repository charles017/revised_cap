<?php
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'config.php';
?>



<?php
if(isset($_POST['form1'])) {
    try {
        if($_POST['email'] == '') {
            throw new Exception("Email can not be empty");
        }

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is invalid");
        }

        $q = $pdo->prepare("SELECT * FROM users WHERE email=? AND status=?");
        $q->execute([$_POST['email'],1]);
        $total = $q->rowCount();
        if(!$total) {
            throw new Exception("Email is not found");
        }

        $token = time();

        $statement = $pdo->prepare("UPDATE users SET token=? WHERE email=?");
        $statement->execute([$token,$_POST['email']]);
        

        $link = BASE_URL.'reset-password.php?email='.$_POST['email'].'&token='.$token;
        $email_message = 'Please click on this link to reset your password: <br>';
        $email_message .= '<a href="'.$link.'">';
        $email_message .= 'Click Here';
        $email_message .= '</a>';

        $mail = new PHPMailer(true);
        try {
          $mail->isSMTP();
          $mail->Host = 'sandbox.smtp.mailtrap.io';
          $mail->SMTPAuth = true;
          $mail->Username = '18835184e69b51';
          $mail->Password = 'bd9602bcdf807c';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 2525;
        
            $mail->setFrom('contact@example.com');
            $mail->addAddress($_POST['email']);
            $mail->addReplyTo('contact@example.com');
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = $email_message;
            $mail->send();

            $success_message = 'Please check your email and follow the steps.';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } catch(Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IMS Registration</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-color: #087b81">
    <div  class="container border rounded mt-5" style="width: 40%; background-color: rgb(247, 238, 228);box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 mt-5 mb-5">
          <h3 class="text-center d-flex align-items-center justify-content-center text-nowrap" style="color: #087b81;">          
            Inventory Management System
          </h3>
        </div>
      </div>
    </div>
    <div class="container mt-5 mb-3">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h3 class="text-center" style="color: #087b81;">Password Recovery</h3>

          <?php
if(isset($error_message)) {
    echo '<div class="error">';
    echo $error_message;
    echo '</div>';
}
if(isset($success_message)) {
    echo '<div class="success">';
    echo $success_message;
    echo '</div>';
}
?>
          <form action="" method="post">

            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>"
                placeholder="email"
              />
              <label for="email"> Enter Email Address</label>
            </div>

            <div class="container">
              <div class="row d-grid justify-content-center">
                <input type="submit" value="Submit" name="form1" class="btn btn-primary" style="background-color: #087b81; border-color: #087b81;">
                <a class="mt-3" href="<?php echo BASE_URL; ?>index.php" style="color: #087b81;">Back to Login Page</a>

              </div>
            </div>            
        </form>
        </div>
      </div>
    </div>
  </body>
</html>

