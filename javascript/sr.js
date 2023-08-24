let itemCounter = 1;
    let srCounter = 1; // SR Number counter

    function addItem() {
      const itemList = document.getElementById('itemList');
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td>
          <input type="text" class="form-control" name="productCode[]" oninput="restrictToNumbers(this)">
          <div class="invalid-feedback">Enter a valid number.</div>
        </td>
        <td><input type="text" class="form-control" name="description[]"></td>
        <td>
          <input type="text" class="form-control" name="quantity[]" oninput="restrictToNumbers(this)">
          <div class="invalid-feedback">Enter a valid number.</div>
        </td>
        <td>
          <input type="text" class="form-control" name="price[]" oninput="restrictToNumbers(this)">
          <div class="invalid-feedback">Enter a valid number.</div>
        </td>
        <td>0.00</td>
        <td class="action-table">
  <div class="d-flex align-items-center">
    <button class="btn btn-sm mr-1" onclick="removeItem(this)" style="background-color: #087b81; color: white;">
  <i class="fas fa-trash"></i>
</button>

  </div>
</td>

      `;
      itemList.appendChild(newRow);
    }

    function restrictToNumbers(input) {
      const value = input.value;
      if (!/^\d*\.?\d*$/.test(value)) {
        input.classList.add('is-invalid');
      } else {
        updateTotal(input.closest('tr'));
        input.classList.remove('is-invalid');
      }
    }
    <!-- ... (previous code) ... -->


  // ... (other functions)
  function editItem(button) {
  console.log("Edit button clicked!"); // Add this line
  const row = button.closest('tr');
  const productCodeInput = row.cells[0].querySelector('input');
  const descriptionInput = row.cells[1].querySelector('input');
  const quantityInput = row.cells[2].querySelector('input');
  const priceInput = row.cells[3].querySelector('input');

  // Enable editing
  productCodeInput.disabled = false;
  descriptionInput.disabled = false;
  quantityInput.disabled = false;
  priceInput.disabled = false;

  // Attach event listeners for input fields
  quantityInput.addEventListener('input', () => updateTotal(row));
  priceInput.addEventListener('input', () => updateTotal(row));
}

document.addEventListener('DOMContentLoaded', () => {
  console.log("DOM content loaded!"); // Add this line
  
  // ... (other event listener setups)
});


  // Attach event listeners after the document is loaded
  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('addBtn').addEventListener('click', addItem);
    document.getElementById('saveBtn').addEventListener('click', () => {
    document.addEventListener('DOMContentLoaded', () => {  
      // ... (save functionality)
    });


// Attach event listeners for editing
const editButtons = document.querySelectorAll('.action-button-edit');
  editButtons.forEach(button => {
    button.addEventListener('click', () => editItem(button));
  });
});

    // Attach event listeners for deleting
    const deleteButtons = document.querySelectorAll('.action-button-delete');
    deleteButtons.forEach(button => {
      button.addEventListener('click', () => removeItem(button));
    });
  });
  
    function saveItem(button) {
      const row = button.parentNode.parentNode;
      const productCodeInput = row.cells[0].querySelector('input');
      const descriptionInput = row.cells[1].querySelector('input');
      const quantityInput = row.cells[2].querySelector('input');
      const priceInput = row.cells[3].querySelector('input');

      productCodeInput.disabled = true;
      descriptionInput.disabled = true;
      quantityInput.disabled = true;
      priceInput.disabled = true;

      productCodeInput.classList.remove('is-invalid');
      descriptionInput.classList.remove('is-invalid');
      quantityInput.classList.remove('is-invalid');
      priceInput.classList.remove('is-invalid');

      updateTotal(row);
      updateGrandTotal();
    }

function updateTotal(row) {
  const quantityInput = row.cells[2].querySelector('input');
  const priceInput = row.cells[3].querySelector('input');
  const totalCell = row.cells[4];
  
  const quantity = parseFloat(quantityInput.value);
  const price = parseFloat(priceInput.value);
  
  // Check if the values are valid numbers
  if (isNaN(quantity) || isNaN(price)) {
    totalCell.textContent = '0.00';
  } else {
    const total = quantity * price;
    totalCell.textContent = formatNumber(total, 2);
  }
  
  updateGrandTotal();
}

    function removeItem(button) {
  const row = button.closest('tr');
  if (row) {
    row.remove(); 
    updateGrandTotal();
  }
}
    function updateGrandTotal() {
      const rows = document.querySelectorAll('#itemList tr');
      let grandTotal = 0;
      rows.forEach(row => {
        const total = parseFloat(row.cells[4].innerText.replace(/,/g, ''));
        grandTotal += isNaN(total) ? 0 : total;
      });
      document.getElementById('grandTotal').innerText = formatNumber(grandTotal, 2);
    }

    // Function to format numbers 
    function formatNumber(number, maximumFractionDigits = 2) {
      return parseFloat(number).toLocaleString(undefined, {
        maximumFractionDigits: maximumFractionDigits,
        minimumFractionDigits: maximumFractionDigits,
      });
    }

    document.getElementById('addBtn').addEventListener('click', addItem);

    document.getElementById('saveBtn').addEventListener('click', () => {
      const savedDataTableBody = document.getElementById('savedDataTableBody');
      const savedDataQuantity = document.getElementById('savedDataQuantity');
      const savedDataGrandTotal = document.getElementById('savedDataGrandTotal');
      const savedDataSRNumber = document.getElementById('savedDataSRNumber');

      let quantityOfItems = 0;
      let grandTotal = 0;

      const rows = document.querySelectorAll('#itemList tr');
      rows.forEach(row => {
        const productCode = row.cells[0].querySelector('input').value;
        const description = row.cells[1].querySelector('input').value;
        const quantity = parseFloat(row.cells[2].querySelector('input').value);
        const price = parseFloat(row.cells[3].querySelector('input').value);
        const total = parseFloat(row.cells[4].innerText.replace(/,/g, ''));

        quantityOfItems += isNaN(quantity) ? 0 : quantity;
        grandTotal += isNaN(total) ? 0 : total;

        const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>${productCode}</td>
      <td>${description}</td>
      <td>${isNaN(quantity) ? '' : formatNumber(quantity, 0)}</td>
      <td>${isNaN(price) ? '' : formatNumber(price, 2)}</td>
      <td>${isNaN(total) ? '' : formatNumber(total, 2)}</td>
    `;

    savedDataTableBody.appendChild(newRow);
  });
      savedDataQuantity.textContent = `Quantity of Items: ${formatNumber(quantityOfItems, 0)}`;
      savedDataGrandTotal.textContent = `Grand Total: ${formatNumber(grandTotal, 2)}`;

      // Generate SR number
      const paddedCounter = String(srCounter).padStart(5, '0'); // Padded with leading zeros
      savedDataSRNumber.textContent = `SR Number: ${paddedCounter}`;
      srCounter++; // Increment counter for the next SR

        
  // Get the current date and time
  const currentDate = new Date();
  const formattedDate = currentDate.toLocaleDateString('en-US');
  const formattedTime = currentDate.toLocaleTimeString('en-US');
  
  // Update the elements in the modal header
  savedDataModalLabel.textContent = 'Saved Data';
  savedDataSRNumber.textContent = `SR Number: ${paddedCounter}`;
  currentDateTime.textContent = `Date: ${formattedDate} Time: ${formattedTime}`;
  
  // Open the modal
  $('#savedDataModal').modal('show');
});

    // Function to generate a stock receipt (SR) number
    function generateSRNumber() {
      const srPrefix = 'SR';
      const paddedCounter = String(srCounter).padStart(5, '0'); // Padded with leading zeros
      srCounter++; // Increment counter for the next SR
      return `${srPrefix}-${paddedCounter}`;
    }

  // Updated Print button functionality
  document.getElementById('printBtn').addEventListener('click', () => {
    const modalContent = document.getElementById('savedDataModal').querySelector('.modal-content');

    // Remove the print button before converting to an image
    const printBtn = modalContent.querySelector('#printBtn');
    if (printBtn) {
      printBtn.style.display = 'none';
    }

    
    domtoimage.toPng(modalContent)
      .then(function (dataUrl) {
        const pdfContent = document.createElement('div');
        const img = new Image();
        img.src = dataUrl;
        pdfContent.appendChild(img);

        // Generate the PDF
        html2pdf().from(pdfContent).save('stock_receipt.pdf');

        // Restore the print button's display style
        if (printBtn) {
          printBtn.style.display = '';
        }
      })
      .catch(function (error) {
        console.error('Error generating PDF:', error);

        // Restore the print button's display style
        if (printBtn) {
          printBtn.style.display = '';
        }
      });
  });
