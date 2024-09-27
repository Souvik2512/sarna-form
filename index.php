<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div class="container my-4">
      <a class="btn btn-primary m-3 add-button" href="./Add-csp.php">Add</a>
      <div class="card p-4 data-Table">
        <table id="myTable" class="display" style="width:100%">
          <thead>
            <tr>
              <th>Application Id</th>
              <th>Emp Code</th>
              <th>Bank</th>
              <th>Name</th>
              <th>Father Name</th>
              <th>Whatsapp Number</th>
              <th>Caste</th>
              <th>Aadhar No</th>
              <th>District</th>
              <th>State</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script>
      $(document).ready(function () {
        $('#myTable').DataTable({
          "ajax": {
            "url": "data.json", 
            "dataSrc": function (json) {
              let data = [];
              json.forEach(record => {
                const aadharNo = record.kycDetails.aadharNo;
                const maskedAadharNo = `${aadharNo.substring(0, 2)}XXXXXXXX${aadharNo.substring(aadharNo.length - 4)}`;
                data.push({
                  applicationId: record.application.id,
                  applicationNo: record.application.applicationNo,
                  bank: record.application.bankName, 
                  name: record.personalDetails.Name,
                  fatherName: record.personalDetails.fatherName,
                  whatsappNumber: record.personalDetails.whatsAppNo,
                  caste: record.personalDetails.caste,
                  aadharNo: maskedAadharNo,
                  district: record.addressDetails.district,
                  state: record.addressDetails.state,
                  date: record.enrollmentDetails.enrolDate,
                  actions: record.application.id
                });
              });
              return data;
            }
          },
          "columns": [
            { "data": "applicationId" },
            { "data": "applicationNo" },
            { "data": "bank" },
            { "data": "name" },
            { "data": "fatherName" },
            { "data": "whatsappNumber" },
            { "data": "caste" },
            { "data": "aadharNo" },
            { "data": "district" },
            { "data": "state" },
            { "data": "date" },
            {
        "data": "actions",
        "render": function(data, type, row) {
          return `
      <div class="btn-group" role="group">
        <button class="btn btn-info btn-sm me-1" onclick="viewEntry('${row.actions}')"><i class="fa-solid fa-eye"></i></button>
        <button class="btn btn-warning btn-sm me-1" onclick="editEntry('${row.actions}')"><i class="fa-regular fa-pen-to-square"></i></button>
        <button class="btn btn-danger btn-sm" onclick="deleteEntry('${row.actions}', this)"><i class="fa-solid fa-trash"></i></button>
      </div>
    `;
        }
      }
          ]
        });
      });
      function viewEntry(id) {
        window.location.href = `view-details.php?id=${id}`;
      }
    </script>
  </body>
</html>
