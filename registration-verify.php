<?php
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include 'config.php';

if(!isset($_REQUEST['email'])||!isset($_REQUEST['token'])) {
    header('location: '.BASE_URL);
}

$statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND token=?");
$statement->execute([$_REQUEST['email'],$_REQUEST['token']]);
$total = $statement->rowCount();
if($total) {
    $statement = $pdo->prepare("UPDATE users SET token=?, status=? WHERE email=? AND token=?");
    $statement->execute(['',1,$_REQUEST['email'],$_REQUEST['token']]);
    header('location: '.BASE_URL.'registration-success.php');
} else {
    header('location: '.BASE_URL);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="">
   </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>