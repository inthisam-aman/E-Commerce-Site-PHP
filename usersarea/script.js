function printTable() {
  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  
  var tableContent = document.getElementById('myTable').outerHTML;
  var printContent = `
    <!DOCTYPE html>
    <html>
    <head>
      <style>
      .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
      }
      
      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
      }
      
      th, td {
        border: 1px solid #4CAF50;
        padding: 10px;
      }
      
      button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
      }
      
      button:hover {
        background-color: #45a049;
      }
      
      @media print {
        .container {
          display: none;
        }
        
        table {
          font-size: 12px;
          margin-bottom: 0;
        }
      }
      </style>
    </head>
    <body>
      ${tableContent}
    </body>
    </html>
  `;
  
  printWindow.document.write(printContent);
  printWindow.document.close();
  printWindow.print();
}
