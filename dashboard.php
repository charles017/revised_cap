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
    <link rel="stylesheet" href="./css/style1.css"> 
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
              <a class="active" href="<?php echo BASE_URL; ?>dashboard.php">
                <span class="fas fa-tachometer-alt"></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL; ?>dr.php">
                <span class="fas fa-boxes"></span>
                <span>Delivery Receipt</span>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL; ?>sr.php">
                <span class="fa-solid fa-cubes-stacked"></span>
                <span>Stock Receipt</span>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL; ?>stockcard.php">
                <span class="fa-solid fa-table"></span>
                <span>Stock Card</span>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL; ?>customer.php">
                <span class="fas fa-users" ></span>
                <span>Customers</span>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL; ?>reports.php">
                <span class='bx bx-folder'></span>
              <span>Reports</span>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL; ?>orders.php">
                <span class="fas fa-shopping-cart"></span>
                <span>Orders</span>
              </a>
            </li>
            <li>
              <a href="<?php echo BASE_URL; ?>profile.php">
                <span class="fas fa-user-circle"></span>
                <span>Accounts</span>
              </a>
            </li>
          </ul>
          
        </div>
    </div>    

    <div class="main-content">
      <header>
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

      <main>
        <div class="cards">
          <div class="card-single">
            <div><a href="./IMS/customer.php" class="btn" style="outline: none;">
              <h1>9</h1>
              <span>Stores</span>
            </div>
            <div>
              <span class="fa-solid fa-store"></span></a>
            </div>
          </div>
          <div class="card-single">
            <div><a href="./IMS/stockcard.php" class="btn" style="outline: none;">
              <h1>10</h1>
              <span>Low Stock Items</span>
            </div>
            <div>
              <span class="fas fa-clipboard-list"></span></a>
            </div>
          </div>
          <div class="card-single">
            <div><a href="./IMS/orders.php" class="btn" style="outline: none;">
              <h1>11</h1>
              <span>Orders</span></a>
            </div>
            <div>
              <span class="fas fa-shopping-cart"></span>
            </div>
          </div>
          <div class="card-single">
            <div><a href="./IMS/orders.php" class="btn" style="outline: none;">
              <h1>5</h1>
              <span>Orders Fulfilled</span>
            </div>
            <div>
              <span class="fa-regular fa-circle-check"></span></a>
            </div>
          </div>

        </div>

        <div class="recent-grid">
          <div class="projects">
            <div class="card">
              <div class="card-header">
                <h2>Recent Orders</h2>
                <a href="./IMS/orders.php">
                <button>See all <span class="fas fa-arrow-right"></span> </button></a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table width="100%">
                  <thead>
                    <tr>
                      <td>Store Name</td>
                      <td>Delivery Receipts</td>
                      <td>Status</td>
                      <td>Quantity</td>   
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Splash Atc</td>
                      <td> DR - 000001</td>
                      <td>
                        <span class="status purple"></span>
                        Review
                      </td>
                      <td> 569 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash BHS</td>
                      <td>DR - 000002</td>
                      <td>
                        <span class="status orange"></span>
                        Pending
                      </td>
                    <td> 255 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Rockwell</td>
                      <td>DR - 000003</td>
                      <td>
                        <span class="status pink"></span>
                        In Progress
                      </td>
                    <td> 455 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Trinoma</td>
                      <td>DR - 000004</td>
                      <td>
                        <span class="status purple"></span>
                        Review
                      </td>
                      <td> 652 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Megamall</td>
                      <td>DR - 000005</td>
                      <td>
                        <span class="status pink"></span>
                        In Progress
                      </td>
                    <td> 325 pcs</td>
                    </tr>
                  </tbody>

                </table>
                </div>
              </div>

            </div>

          </div>
          <div class="customers">
            <div class="card">
              <div class="card-header">
                  <h2>New Orders</h2>
                  <a href="./IMS/orders.php">
                  <button>See all <span class="fas fa-arrow-right"></span> </button></a>
              </div>
              <div class="card-body">
                <div class="customer">
                  <div class="info">
                    <img src="./user/a.png" height="40px" width="40px" alt="customer">
                    <div>
                      <h4>Splash BHS</h4>
                      <small>Charlie Abuloc</small>
                    </div>
                  </div>
                  <div class="contact">
                      <span class="fas fa-user-circle"></span>
                      <span class="fas fa-comment"></span>
                      <span class="fas fa-phone-alt"></span>
                    </div>
                </div>
                <div class="customer">
                  <div class="info">
                    <img src="./user/a.png" height="40px" width="40px" alt="customer">
                    <div>
                      <h4>Splash G4</h4>
                      <small>Ninio Querol</small>
                    </div>
                  </div>
                  <div class="contact">
                      <span class="fas fa-user-circle"></span>
                      <span class="fas fa-comment"></span>
                      <span class="fas fa-phone-alt"></span>
                    </div>
                </div>
                <div class="customer">
                  <div class="info">
                    <img src="./user/a.png" height="40px" width="40px" alt="customer">
                    <div>
                      <h4>Splash Trinoma</h4>
                      <small>Zia Marasigan</small>
                    </div>
                  </div>
                  <div class="contact">
                      <span class="fas fa-user-circle"></span>
                      <span class="fas fa-comment"></span>
                      <span class="fas fa-phone-alt"></span>
                    </div>
                </div>
                <div class="customer">
                  <div class="info">
                    <img src="./user/a.png" height="40px" width="40px" alt="customer">
                    <div>
                      <h4>Splash  Circuit</h4>
                      <small>Rafael Sy</small>
                    </div>
                  </div>
                  <div class="contact">
                      <span class="fas fa-user-circle"></span>
                      <span class="fas fa-comment"></span>
                      <span class="fas fa-phone-alt"></span>
                    </div>
                </div>
                <div class="customer">
                  <div class="info">
                    <img src="./user/a.png" height="40px" width="40px" alt="customer">
                    <div>
                      <h4>Splash LCT</h4>
                      <small>Inigo Luis</small>
                    </div>
                  </div>
                  <div class="contact">
                      <span class="fas fa-user-circle"></span>
                      <span class="fas fa-comment"></span>
                      <span class="fas fa-phone-alt"></span>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
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
