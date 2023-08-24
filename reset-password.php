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
$statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND token=?");
$statement->execute([$_REQUEST['email'],$_REQUEST['token']]);
$total = $statement->rowCount();
if(!$total) {
    header('location: '.BASE_URL);
    exit;
}
?>

<?php
if(isset($_POST['form1'])) {
    try {
        if($_POST['password'] == '' || $_POST['retype_password'] == '') {
            throw new Exception("Password can not be empty");
        }

        if($_POST['password'] != $_POST['retype_password']) {
            throw new Exception("Passwords must match");
        }
        
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $statement = $pdo->prepare("UPDATE users SET token=?, password=? WHERE email=? AND token=?");
        $statement->execute(['',$password,$_REQUEST['email'],$_REQUEST['token']]);

        header('location: '.BASE_URL.'index.php');
        exit;

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
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h3 class="text-center-flex align-items-center justify-content-center text-nowrap" style="color: #087b81;">Create New Password</h3>

          <?php
if(isset($error_message)) {
    echo '<div class="error">';
    echo $error_message;
    echo '</div>';
}
?>

 
          <form action="" method="post">

            <div class="form-floating mb-3 mt-5">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Create Password"
              />
              <label for="password">Create Password</label>
            </div>

            <div class="form-floating mb-5">
              <input
                type="password"
                class="form-control"
                id="retype_password"
                name="retype_password"
                placeholder="Confirm Password"
              />
              <label for="retype_password">Confirm Password</label>
            </div>

            <div class="container mb-5">
                <div class="row d-grid justify-content-center">
                  <input type="submit" value="Submit" name="form1" class="btn rounded" style="background-color: #087b81; color: white;">
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
