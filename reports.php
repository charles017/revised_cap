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
/*reports.php*/

<?php 

/*require_once('config/db.php');
$query = "select * from deliveryreport";
$result = mysqli_query($con, $query);*/


require_once 'config/db.php';
require_once 'config/functions.php';

$result=display_data();
$result2=display_data2();
$result3=display_data3();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reports.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Reports</title>
</head>
<body style="background-color: #087b81;">
    <div class="container " style="margin-top:80px;">
        <button class="tablink" onclick="openPage('Home', this, 'white')"id="defaultOpen">Delivery Receipt</button>
        <button class="tablink" onclick="openPage('News', this, 'white')" >Stock Receipt</button>
        <button class="tablink" onclick="openPage('Contact', this, 'white')">Customers</button>
        <button class="tablink" onclick="openPage('About', this, 'white')">Orders</button>
        
        <div id="Home" class="tabcontent">
        <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Delivery Reports</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td>DR No.</td>
                                <td>Product Code</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Quantity</td> 
                                <td>Total</td>
                                <td>Delete</td>
                            </tr>
                                <?php 


                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <td><?php echo $row['DRNo.']; ?></td>
                                    <td><?php echo $row['productCode']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td><?php echo $row['Price']; ?></td>
                                    <td><?php echo $row['Quantity']; ?></td>
                                    <td><?php echo $row['Total']; ?></td>
                                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                                </tr>        
                                <?php
                                    }


                                ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        
        <div id="News" class="tabcontent">
        <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Stock Receipt</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td>Product Code</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Quantity</td> 
                                <td>Total</td>
                                <td>Delete</td>
                            </tr>
                                <?php


                                    while($row = mysqli_fetch_assoc($result2)){
                                ?>
                                    <td><?php echo $row['productCode']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td><?php echo $row['Price']; ?></td>
                                    <td><?php echo $row['Quantity']; ?></td>
                                    <td><?php echo $row['Total']; ?></td>
                                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                                </tr>        
                                <?php
                                    }


                                ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        
        <div id="Contact" class="tabcontent">
        <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Customer List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td>Store Code</td>
                                <td>Store Name</td>
                                <td>Customer Name</td>
                                <td>Address</td>
                                <td>Contact No.</td> 
                                <td>Delete</td>
                            </tr>
                                <?php

                                    while($row = mysqli_fetch_assoc($result3)){
                                ?>
                                    <td><?php echo $row['storeCode']; ?></td>
                                    <td><?php echo $row['storeName']; ?></td>
                                    <td><?php echo $row['customerName']; ?></td>
                                    <td><?php echo $row['Address']; ?></td>
                                    <td><?php echo $row['contactNumber']; ?></td>
                                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                                </tr>        
                                <?php
                                    }


                                ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        
        <div id="About" class="tabcontent">
          <h3 class="text-center">Orders</h3>
        </div>

        <script src="javascript/reports.js"></script>    


    
    <script src="javascript/reports.js"></script>    
</body>
</html>