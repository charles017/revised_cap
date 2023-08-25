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
    <link rel="stylesheet" href="./css/stockcard.css">
    <title>Stock Card</title>
</head>
<body>
    <div class="container mb-3" id="back">
        <a href="dashboard.php" style="text-decoration:none; color:white; font-size:20px;"><< back to dashboard</a>
    </div>
    <section class="artist-info">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="table-container table-responsive table-striped" >
                <h1>Stock Card</h1>
                <table style="margin-top: 2em;" id="table">
                    <thead>
                    <tr>
                      <th>Product Code</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Total Price</th>
                      <th>Beginning Balance</th>
                      <th>Stock On Hand</th>
                      <th>Ending Balance</th>
                      <th>Stock Receipt</th>
                      <th>Delivery Receipt</th>
                      <th>Variance</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>101-0001</td>
                      <td>Training Fins (S)</td>
                      <td>1,500.00</td>
                      <td>15,000.00</td>    
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0002</td>
                      <td>Training Fins (M)</td>
                      <td>1,500.00</td>
                      <td>15,000.00</td>    
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0003</td>
                      <td>Training Fins (L)</td>
                      <td>1,500.00</td>
                      <td>15,000.00</td>    
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0004</td>
                      <td>Training Fins (XL)</td>
                      <td>1,500.00</td>
                      <td>15,000.00</td>    
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0005</td>
                      <td>Training Fins (2XL)</td>
                      <td>1,500.00</td>
                      <td>15,000.00</td>    
                      <td>10</td>
                      <td>10</td>
                      <td>10</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0006</td>
                      <td>Tech Paddle (S)</td>
                      <td>1,000.00</td>
                      <td>20,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0007</td>
                      <td>Tech Paddle (M)</td>
                      <td>1,000.00</td>
                      <td>20,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0008</td>
                      <td>Tech Paddle (L)</td>
                      <td>1,000.00</td>
                      <td>20,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0009</td>
                      <td>Power Paddle (S)</td>
                      <td>800.00</td>
                      <td>16,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0010</td>
                      <td>Power Paddle (M)</td>
                      <td>800.00</td>
                      <td>16,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0011</td>
                      <td>Power Paddle (L)</td>
                      <td>800.00</td>
                      <td>16,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0012</td>
                      <td>Pull Buoy (Fs)</td>
                      <td>800.00</td>
                      <td>16,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0013</td>
                      <td>Kick Board (Fs)</td>
                      <td>800.00</td>
                      <td>16,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0014</td>
                      <td>Swimcap Red (Fs)</td>
                      <td>500.00</td>
                      <td>10,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0015</td>
                      <td>Swimcap Black (Fs)</td>
                      <td>500.00</td>
                      <td>10,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0016</td>
                      <td>Swimcap Blue (Fs)</td>
                      <td>500.00</td>
                      <td>10,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0017</td>
                      <td>Swimcap Green (Fs)</td>
                      <td>500.00</td>
                      <td>10,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0018</td>
                      <td>Swimcap Yellow (Fs)</td>
                      <td>500.00</td>
                      <td>10,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0019</td>
                      <td>Swimcap Purple (Fs)</td>
                      <td>500.00</td>
                      <td>10,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>101-0020</td>
                      <td>Swimcap White (Fs)</td>
                      <td>500.00</td>
                      <td>10,000.00</td>    
                      <td>20</td>
                      <td>20</td>
                      <td>20</td>
                      <td>0</td>    
                      <td>0</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="./javascript/stockcard.js"></script>
</body>
</html>
