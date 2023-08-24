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

        if($_POST['firstname'] == '') {
            throw new Exception("First name can not be empty");
        }

        if($_POST['lastname'] == '') {
            throw new Exception("Last name can not be empty");
        }

        if($_POST['email'] == '') {
            throw new Exception("Email can not be empty");
        }

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is invalid");
        }

        $statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $statement->execute([$_POST['email']]);
        $total = $statement->rowCount();
        if($total) {
            throw new Exception("Email already exists");
        }

        if($_POST['phone'] == '') {
            throw new Exception("Phone can not be empty");
        }

        if($_POST['password'] == '' || $_POST['retype_password'] == '') {
            throw new Exception("Password can not be empty");
        }

        if($_POST['password'] != $_POST['retype_password']) {
            throw new Exception("Passwords must match");
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $token = time();

        $statement = $pdo->prepare("INSERT INTO users (firstname,lastname,email,phone,password,token,status) VALUES (?,?,?,?,?,?,?)");
        $statement->execute([$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phone'],$password,$token,0]);

        
        $link = BASE_URL.'registration-verify.php?email='.$_POST['email'].'&token='.$token;
        $email_message = 'Please click on this link to verify registration: <br>';
        $email_message .= '<a href="'.$link.'">';
        $email_message .= 'Click Here';
        $email_message .= '</a>';

        $mail = new PHPMailer(true);
        try  {
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
            $mail->Subject = 'Registration Verification Email';
            $mail->Body = $email_message;
            $mail->send();

            $success_message = 'Registration is completed. An email is sent to your email address. Please check that and verify the registration.';

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
    <div  class="container border rounded " style="width: 40%; background-color: rgb(247, 238, 228);box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
     <div class="container mt-5 mb-2 pb-5">
       <div class="row justify-content-center">
         <div class="col-lg-6">
           <h3 class="text-center d-flex align-items-center justify-content-center text-nowrap" style="color: #087b81;">          
             Inventory Management System
           </h3>
         </div>
       </div>
     </div>    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">

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
                id="firstname"
                name="firstname"
                value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname']; } ?>"
                placeholder="First Name"
              />
              <label for="firstname">First Name</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="lastname"
                name="lastname"
                value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname']; } ?>"
                placeholder="Last Name"
              />
              <label for="lastname">Last Name</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                value="<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>"
                placeholder="email"
              />
              <label for="email">Email Address</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="phone"
                class="form-control"
                id="phone"
                name="phone"
                placeholder="Phone Number"
                value="<?php if(isset($_POST['phone'])) {echo $_POST['phone']; } ?>"
              />
              <label for="phone">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
              />
              <label for="password">Password</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control"
                id="retype_password"
                name="retype_password"
                placeholder="Confirm Password"
              />
              <label for="retype_password">Confirm Password</label>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-5">
                <a href="index.php" class="text-black me-2 text-decoration-none">Already Registered?</a>
                <input class="btn btn-dark" type="submit" value="Submit" name="form1">
              </div>
            </form>
        </div>
      </div>
    </div>
    <br>
    <br>
    <footer style="background-color: rgb(248, 243, 237); color: #087b81; text-align: center; padding: 20px; height: 60px;">
      <p>&copy; 2023 Inventory Management System. All rights reserved.</p>
    </footer>
    
  </body>
</html>
