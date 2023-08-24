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
if(!isset($_SESSION['user'])) {
    header('location: '.BASE_URL);
    exit;
}
?>

<?php
if(isset($_POST['form1'])) {

    try {

        if($_POST['firstname'] == '') {
            throw new Exception("First Name can not be empty");
        }

        if($_POST['lastname'] == '') {
            throw new Exception("Last Name can not be empty");
        }

        if($_POST['email'] == '') {
            throw new Exception("Email can not be empty");
        }

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is invalid");
        }
        
        if($_POST['phone'] == '') {
            throw new Exception("Phone can not be empty");
        }

        if($_POST['password'] != '' || $_POST['retype_password'] != '') {
            if($_POST['password'] != $_POST['retype_password']) {
                throw new Exception("Passwords must match");
            }
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $password = $_SESSION['user']['password'];
        }

        $path = $_FILES['photo']['name'];
        $path_tmp = $_FILES['photo']['tmp_name'];

        if($path) {

            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename = "user".".".$extension;

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $path_tmp);
            if($mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'image/gif') {
                throw new Exception("Photo extension is invalid");
            }
            unlink('./uploads/'.$_SESSION['user']['photo']);
            move_uploaded_file($path_tmp, './uploads/'.$filename);
        } else {
            $filename = $_SESSION['user']['photo'];
        }
        
        $statement = $pdo->prepare("UPDATE users SET 
                            firstname=?,
                            lastname=?,
                            email=?,
                            phone=?,
                            photo=?,
                            password=?
                            WHERE id=?
                            ");
        $statement->execute([
                            $_POST['firstname'],
                            $_POST['lastname'],
                            $_POST['email'],
                            $_POST['phone'],
                            $filename,
                            $password,
                            1
                        ]);

        $_SESSION['user']['firstname'] = $_POST['firstname'];
        $_SESSION['user']['lastname'] = $_POST['lastname'];
        $_SESSION['user']['email'] = $_POST['email'];
        $_SESSION['user']['phone'] = $_POST['phone'];
        $_SESSION['user']['photo'] = $filename;
        $_SESSION['user']['password'] = $password;
        
        $success_message = 'Data is updated successfully!';


    } catch(Exception $e) {
        $error_message = $e->getMessage();
    }    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c06e76d496.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>  
    <link rel="stylesheet" href="./css/style.css"> 
    <link rel="icon" type="image/x-icon" href="./user/cat.png">   
    <title>Dashboard IMS</title>
</head>
<body>
  <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
          <h1> <span class="bx bx-grid-alt"> </span> <span>IMS</span>
          </h1>
        </div>
        <div class="sidebar-menu" id="hov">
          <ul>
            <li>
              <a href="#" class="active">
                <span class="fas fa-tachometer-alt"></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="dr.html">
                <span class="fas fa-boxes"></span>
                <span>Delivery Receipt</span>
              </a>
            </li>
            <li>
              <a href="sr.html">
                <span class="fa-solid fa-cubes-stacked"></span>
                <span>Stock Receipt</span>
              </a>
            </li>
            <li>
              <a href="stockcard.html">
                <span class="fa-solid fa-table"></span>
                <span>Stock Card</span>
              </a>
            </li>
            <li>
              <a href="customer.html">
                <span class="fas fa-users" ></span>
                <span>Customers</span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class='bx bx-folder'></span>
              <span>Reports</span>
              </a>
            </li>
            <li>
              <a href="Orders.html">
                <span class="fas fa-shopping-cart"></span>
                <span>Orders</span>
              </a>
            </li>
            <li>
              <a href="messages.html">
                <span class="fas fa-user-circle"></span>
                <span>Accounts</span>
              </a>
            </li>
          </ul>
        </div>
    </div>

    <div class="main-content">
      <header class="mb-5">"
        <h2>
          <label for="nav-toggle">
            <span class="fas fa-bars"></span>
          </label>
          Dashboard
        </h2>

        <div class="search-wrapper">
          <span class="fas fa-search" id="searchIcon"></span>
          <input type="search" id="searchInput" placeholder="Search..." />
          </div>
              <div class="user-wrapper">
         <img src="./user/cat.png" width="40px" height="40px" alt="profile-img">
         <div class="">
            <h4><?php echo $_SESSION['user']['firstname']; ?></h4>
            <small>Warehouse Staff</small>
            <?php if(isset($_SESSION['user'])): ?>
                    <li><a  class="btn" href="<?php echo BASE_URL; ?>logout.php">Logout</a></li>
                    <?php endif; ?>
         </div>
        </div>
      </header>
      
      
      <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 pb-3">
      
  

        <h1 class="page-heading mt-5">Edit Profile</h1>
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
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row mt-5">
            <div class="col-md-3">
            <img src="<?php echo BASE_URL; ?>uploads/<?php echo $_SESSION['user']['photo']; ?>" class="img-thumbnail mb_10" alt="">
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $_SESSION['user']['firstname']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $_SESSION['user']['lastname']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo $_SESSION['user']['phone']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="retype_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="retype_password">
                    </div>
                    <div class="col-md-12 mb-3">
                    <input type="submit" value="Update" name="form1" class="btn btn-primary" style="background-color: #087b81; border-color: #087b81;" onclick="alert('You are making changes on your profile')">
                    </div>
                </div>
            </div>
        </div>
        </form>

        

    </main>
    </div>
  <script src="./javascript/ims.js"></script>    
<script src="./javascript/search.js"></script>
 <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "122104591820002148");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>
