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
    <link rel="stylesheet" href="./css/customer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./user/cat.png">  
    <title>Customers</title>
</head>
<body>
    <div class="container mb-3" id="back">
        <a href="dashboard.php" style="text-decoration:none; color:white; font-size:20px;"><< back to dashboard</a>
    </div>
            
    <div class="modal" id="clients" style="display:block;">
        <div class="modal-dialog modal-lg">
          <div class="modal-content rounded-top" >
            <div class="modal-header" style="background-color: #087b81;">
              <h4 class="modal-title" style="color: white;" >Customers List</h4>
            </div>
            <div class="table-wrapper">
                <div class="table-title">
                  <div class="modal-body">
                  <button type="button" id="bnt" class="btn add-new">
                 Add New</button>
                </div>
                <br>
                <br>

                <div>     
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Store Name</th>
                      <th>In Charge</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="csrs_table" runat="csr" ClientIDMode="static" data-delete="">
                    <tr id="csr_0">
                      <td>Splash ATC</td>
                      <td>Hazel Errazo</td>
                      <td>Alabang Town Center</td>
                      <td>02-807-8861</td>
                      <td class="crud"><a class="add" title="Add" data-toggle="tooltip"><i class="fa fa-check"></i></a><a class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a><a class="delete" title="Delete" data-toggle=
                          "tooltip"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr id="csr_0">
                        <td>Splash BHS</td>
                        <td>Charlie Abuloc</td>
                        <td>Bonifacio High Street</td>
                        <td>02-807-8862</td>
                        <td class="crud"><a class="add" title="Add" data-toggle="tooltip"><i class="fa fa-check"></i></a><a class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a><a class="delete" title="Delete" data-toggle=
                            "tooltip"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      <tr id="csr_0">
                        <td>Splash G4</td>
                        <td>Ninio Querol</td>
                        <td>Makati City</td>
                        <td>02-807-8863</td>
                        <td class="crud"><a class="add" title="Add" data-toggle="tooltip"><i class="fa fa-check"></i></a><a class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a><a class="delete" title="Delete" data-toggle=
                            "tooltip"><i class="fa fa-trash"></i></a></td>
                      </tr>  
                      <tr id="csr_0">
                        <td>Splash Trinoma</td>
                        <td>Zia Marasigan</td>
                        <td>North Ave. QC</td>
                        <td>02-807-8864</td>
                        <td class="crud"><a class="add" title="Add" data-toggle="tooltip"><i class="fa fa-check"></i></a><a class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a><a class="delete" title="Delete" data-toggle=
                            "tooltip"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      <tr id="csr_0">
                        <td>Splash Circuit</td>
                        <td>Rafael Sy</td>
                        <td>Makati City</td>
                        <td>02-807-8865</td>
                        <td class="crud"><a class="add" title="Add" data-toggle="tooltip"><i class="fa fa-check"></i></a><a class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a><a class="delete" title="Delete" data-toggle=
                            "tooltip"><i class="fa fa-trash"></i></a></td>
                      </tr>    
                      <tr id="csr_0">
                        <td>Splash LCT</td>
                        <td>Inigo Luis</td>
                        <td>China Town</td>
                        <td>02-807-8866</td>
                        <td class="crud"><a class="add" title="Add" data-toggle="tooltip"><i class="fa fa-check"></i></a><a class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a><a class="delete" title="Delete" data-toggle=
                            "tooltip"><i class="fa fa-trash"></i></a></td>
                      </tr>    
                  </tbody>
                </table>
                
                </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" id="sa" onclick="SaveCsrList();">Save</button>
              <button type="button" class="btn" id="co" data-dismiss="modal">Close</button></div>
          </div>
        </div>
      </div>
      <script src="./javascript/customer.js"></script>
</body>
</html>
