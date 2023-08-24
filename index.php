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

        if($_POST['password'] == '') {
            throw new Exception("Password can not be empty");
        }

        $q = $pdo->prepare("SELECT * FROM users WHERE email=? AND status=?");
        $q->execute([$_POST['email'],1]);
        $total = $q->rowCount();
        if(!$total) {
            throw new Exception("Email is not found");
        } else {
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $password = $row['password'];
                if(!password_verify($_POST['password'], $password)) {
                    throw new Exception("Password does not match");
                }
            }
        }

        $_SESSION['user'] = $row;

        header('location: '.BASE_URL.'dashboard.php');        

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
    <div class="container border rounded mt-5" style="width: 40%; background-color: rgb(247, 238, 228); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6 mt-5 mb-5">
            <h3 class="text-center d-flex align-items-center justify-content-center text-nowrap" style="color: #087b81;">Inventory Management System</h3>          
        </div>
      </div>
    </div>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-lg-6">
        <?php
if(isset($error_message)) {
    echo '<div class="error">';
    echo $error_message;
    echo '</div>';
}
?>

          <form action=""  method="post">

            <div class="form-floating mb-3">
              <input
                type="text"
                name="email"
                class="form-control"
                id="floatingInput"
                placeholder="name@example.com"
                autofocus
              />

              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                name="password"
                class="form-control"
                id="floatingPassword"
                placeholder="Password"
              />
              <label for="floatingPassword">Password</label>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="register.php" class="btn btn-primary mb-2" tabindex="-1" role="button" style="background-color: #087b81; border-color: #087b81;">Register</a>
                <div class="mx-2"></div> 
                <input class="btn btn-primary mb-2" type="submit" value="Login" name="form1" style="background-color: #087b81; border-color: #087b81;">
              </div>                  
          <div class="d-flex justify-content-center mt-3">
            <a href="forget_password.php" class="text text-center" style="color: #087b81;">Forgot Password?</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>


