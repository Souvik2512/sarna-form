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
      <div class="row">
            <div class="col-md-2">
                <input type="text" id="searchApplicationId" placeholder="Search Application ID" class="form-control" />
            </div>
            <div class="col-md-2">
                <input type="text" id="searchEmpCode" placeholder="Search Emp Code" class="form-control" />
            </div>
            <div class="col-md-2">
                <input type="text" id="searchBank" placeholder="Search Bank" class="form-control" />
            </div>
            <div class="col-md-2">
                <input type="text" id="searchName" placeholder="Search Name" class="form-control" />
            </div>
            <div class="col-md-2">
                <input type="text" id="searchFatherName" placeholder="Search Father's Name" class="form-control" />
            </div>
            <div class="col-md-2">
                <input type="text" id="searchWhatsapp" placeholder="Search Whatsapp" class="form-control" />
            </div>
        </div>
        <table id="myTable" class="display" style="width:100%">
          <thead>
            <tr>
              <th>Application Id</th>
              <!-- <th>Emp Code</th> -->
              <th>Bank</th>
              <th>Name</th>
              <th>Father Name</th>
              <th>Whatsapp Number</th>
              <!-- <th>Caste</th> -->
              <th>Aadhar No</th>
              <th>District</th>
              <th>State</th>
              <!-- <th>Date</th>
              <th>Actions</th> -->
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
    const table = $('#myTable').DataTable({
        "ajax": {
            "url": "data.json", 
            "dataSrc": function (json) {
                let data = [];
                json.forEach(record => {
                    const aadharNo = record.kycDetails.aadharNo;
                    const maskedAadharNo = `${aadharNo.substring(0, 2)}XXXXXXXX${aadharNo.substring(aadharNo.length - 4)}`;
                    data.push({
                        applicationId: record.application.id,
                        // applicationNo: record.application.applicationNo,
                        bank: record.application.bankName, 
                        name: record.personalDetails.Name,
                        fatherName: record.personalDetails.fatherName,
                        whatsappNumber: record.personalDetails.whatsAppNo,
                        // caste: record.personalDetails.caste,
                        aadharNo: maskedAadharNo,
                        district: record.addressDetails.district,
                        state: record.addressDetails.state,
                        // date: record.enrollmentDetails.enrolDate,
                        extraDetails: record
                    });
                });
                return data;
            }
        },
        "columns": [
            { "data": "applicationId" },
            // { "data": "applicationNo" },
            { "data": "bank" },
            { "data": "name" },
            { "data": "fatherName" },
            { "data": "whatsappNumber" },
            // { "data": "caste" },
            { "data": "aadharNo" },
            { "data": "district" },
            { "data": "state" }
        ]
    });

    $('#searchApplicationId').on('keyup change', function () {
        table.column(0).search(this.value).draw();
    });

    $('#searchEmpCode').on('keyup change', function () {
        table.column(1).search(this.value).draw();
    });

    $('#searchBank').on('keyup change', function () {
        table.column(2).search(this.value).draw();
    });

    $('#searchName').on('keyup change', function () {
        table.column(3).search(this.value).draw();
    });

    $('#searchFatherName').on('keyup change', function () {
        table.column(4).search(this.value).draw();
    });

    $('#searchWhatsapp').on('keyup change', function () {
        table.column(5).search(this.value).draw();
    });

    $('#myTable tbody').on('click', 'tr', function () {
        var tr = $(this);
        var row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(formatChildRow(row.data())).show();
            tr.addClass('shown');
        }
    });
});

function formatChildRow(data) {
    return `
        <div class="child-details">
            <h2>${data.extraDetails.personalDetails.title} ${data.extraDetails.personalDetails.Name}</h2>
            <p><strong>Email Id:</strong> ${data.extraDetails.kycDetails.aadharEmail}</p>
            <p><strong>Mobile:</strong> ${data.extraDetails.kycDetails.aadharMobile}</p>
            <p><strong>Gender:</strong> ${data.extraDetails.personalDetails.Gender}</p>
            
            <p><strong>Bank Account No. : </strong> ${data.extraDetails.bankAndOtherDetails.bankAccountNo}</p>
            <p><strong>Bank Name : </strong>${data.extraDetails.bankAndOtherDetails.bankName}</p>
            <p><strong>IFSC Code: </strong>${data.extraDetails.bankAndOtherDetails.bankIFSCCode}</p>
            <p><strong>Actions: </strong>
                <span class="btn-group mx-3" role="group">
                    <button class="btn btn-info mx-2 btn-sm me-1 " onclick="viewEntry('${data.applicationId}')"><i class="fa-solid fa-eye"></i></button>
                    <button class="btn btn-warning mx-2 btn-sm me-1" onclick="editEntry('${data.applicationId}')"><i class="fa-regular fa-pen-to-square"></i></button>
                    <button class="btn btn-danger mx-2 btn-sm" onclick="deleteEntry('${data.applicationId}', this)"><i class="fa-solid fa-trash"></i></button>
                </span>
            </p>
        </div>
    `;
}


      function viewEntry(id) {
        window.location.href = `view-details.php?id=${id}`;
      }

    </script>
  </body>
</html>
