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
    <script src="https://kit.fontawesome.com/c06e76d496.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/stockreceipt.css">
    <link rel="icon" type="image/x-icon" href="./user/cat.png">  
    <title>Stock Receipt</title>
</head>
<body>
  <div class="container mt-5 stock-receipt-container">
    <h2>Stock Receipt</h2>
    <div class="row mt-3">
      <div class="col">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product Code</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="itemList">
            <!-- Items will be added here -->
          </tbody>
          <tfoot>
            <tr id="totalRow">
              <td colspan="4">Grand Total:</td>
              <td id="grandTotal" colspan="2">0.00</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-start">
          <button id="addBtn" class="btn btn-dark btn-border dark-button">Add Item</button>
          <button id="saveBtn" class="btn btn-success btn-border ml-2 save-button">Save</button>

        </div>
      </div>
      <div class="col text-right">
  <!-- Modal -->
  <div class="modal fade" id="savedDataModal" tabindex="-1" aria-labelledby="savedDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="savedDataModalLabel"></h5>
          <span id="savedDataSRNumber" class="float-left modal-left"></span>
          <span id="currentDateTime" class="float-right modal-right"></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                <th>Product Code</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="savedDataTableBody">
              <!-- Saved data rows will be added here -->
            </tbody>
          </table>
          <div id="savedDataQuantity" class="modal-lower-left"></div>
          <div id="savedDataGrandTotal" class="modal-lower-left"></div>
        </div>
        <div class="modal-footer">
            <button id="printBtn" type="button" class="btn btn-secondary"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
    <script src="./javascript/sr.js"></script>
</body>
</html