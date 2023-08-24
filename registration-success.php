<?php
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Your Inventory Management System</title>
</head>
<body style="background-color: #087b81; display: flex; justify-content: center; align-items: center; min-height: 100vh;">
  <div class="container border rounded" style="width: 40%; background-color: rgb(247, 238, 228); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h2 class="mb-10 text-center" style="color: #087b81;">Inventory Management System</h2>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <p class="text-center" style="color: #087b81;">Registration is successful.</p>
          <p class="text-center">
            <a href="<?php echo BASE_URL; ?>index.php" style="color: #087b81;">Go to Login Page</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
