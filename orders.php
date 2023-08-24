<?php
ob_start();
session_start();
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
    <script src="https://kit.fontawesome.com/766b3aafc5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="./css/order.css">
    <link rel="icon" type="image/x-icon" href="./user/cat.png">  
    <title>Order Status</title>
</head>
<body>
    <section class="artist-info">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="table-container table-responsive table-striped" >
                <h1>Concept Shops Order Status</h1>
                <table style="margin-top: 2em;" id="table">
                    <thead>
                    <tr>
                      <th>Store Name</th>
                      <th>DR No.</th>
                      <th>Status</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Splash ATC</td>
                      <td>000001</td>
                      <td>Delivered  <span class="status teal"></span></td>
                      <td>569 pcs</td>    
                    </tr>
                    <tr>
                      <td>Splash BHS</td>
                      <td>000002</td>
                      <td>Delivered  <span class="status teal"></span></td>
                      <td>255 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Rockwell</td>
                      <td>000003</td>
                      <td>Delivered  <span class="status teal"></span></td>
                      <td>455 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Trinoma</td>
                      <td>000004</td>
                      <td>Delivered  <span class="status teal"></span></td>
                      <td>652 pcs</td>
                    </tr>    
                    <tr>
                      <td>Splash Megamall</td>
                      <td>000005</td>
                      <td>Delivered  <span class="status teal"></span></td>
                      <td>652 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Subic</td>
                      <td>000006</td>
                      <td>In Review  <span class="status purple"></span></td>
                      <td>1001 pcs</td>    
                    </tr>
                    <tr>
                      <td>Splash Circuit</td>
                      <td>000007</td>
                      <td>Pending  <span class="status orange"></span></td>
                      <td>455 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Cebu</td>
                      <td>000008</td>
                      <td>In Progress  <span class="status pink"></span></td>
                      <td>555 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash G4</td>
                      <td>000009</td>
                      <td>In Review   <span class="status purple"></span></td>
                      <td>214 pcs</td>
                    </tr>    
                    <tr>
                      <td>Splash MOA</td>
                      <td>000010</td>
                      <td>In Progress  <span class="status pink"></span></td>
                      <td>214 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Subic</td>
                      <td>000011</td>
                      <td>In Progress  <span class="status pink"></span></td>
                      <td>214 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Palawan</td>
                      <td>000012</td>
                      <td>In Review  <span class="status purple"></span></td>
                      <td>214 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Cebu</td>
                      <td>000013</td>
                      <td>In Review  <span class="status purple"></span></td>
                      <td>275 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash Boracay</td>
                      <td>000014</td>
                      <td>In Review  <span class="status purple"></span></td>
                      <td>274 pcs</td>
                    </tr>
                    <tr>
                      <td>Splash RPE</td>
                      <td>000015</td>
                      <td>In Progress  <span class="status pink"></span></td>
                      <td>214 pcs</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="./javascript/order.js"></script>
</body>
</html>